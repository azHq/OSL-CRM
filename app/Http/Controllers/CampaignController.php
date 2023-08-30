<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\MetaCredential;
use App\Models\MetaLeadgenForm;
use App\Services\FacebookGraphService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class CampaignController extends Controller
{
    public function index()
    {
        abort_if(!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin'), 403);

        if (\request()->ajax()) {
            return view('meta.index');
        }

        return view('layout.mainlayout');
    }

    public function getCampaigns(FacebookGraphService $fbGraphService)
    {
        $campaigns = $fbGraphService->getCampaigns();
        $page = $this->getPage($campaigns['id'], $fbGraphService);
        $response = [];

        $response["leadgen_forms"] =  [];
        foreach ($campaigns['leadgen_forms'] as $leadgen) {
            $foundLead = MetaLeadgenForm::where('lead_id', $leadgen['id'])->get();
            $leadgen['mapped'] = false;
            if (count($foundLead) > 0) {
                $leadgen['mapped'] = true;
            }
            array_push($response["leadgen_forms"], $leadgen);
        }
        $response["page"] =  $page;
        return $response;
    }


    public function getLeads($lead_id, FacebookGraphService $fbGraphService)
    {
        $leads = $fbGraphService->getLimitedLeads($lead_id, 1);
        $lead = new Lead;
        $table_columns = $lead->getTableColumns();
        $newColumns = [];
        foreach ($table_columns as $table_column) {
            if (
                $table_column != 'id' && $table_column != 'owner_id' && $table_column != 'creator_id' && $table_column != 'created_at' && $table_column != 'updated_at'
                && $table_column != 'subcategory_id' && $table_column != 'documents_pending' && $table_column != 'tag' && $table_column != 'status'  && $table_column != 'insert_type'
            ) {
                array_push($newColumns, $table_column);
            }
        }
        $response["leads"] =  $leads;
        $response["table_columns"] =  $newColumns;
        return $response;
    }

    public function getPage($id, FacebookGraphService $fbGraphService)
    {
        $page = $fbGraphService->getPageOrLeadInfo($id);
        return $page;
    }
    public function syncLeads(Request $request, FacebookGraphService $fbGraphService)
    {
        $leads = $fbGraphService->getLeads($request['lead_id']);
        $metaLead = MetaLeadgenForm::where("lead_id", $request['lead_id'])->first();
        $duplicateLeads = [];
        $mapped_fields = json_decode($metaLead->mapped_fields);
        foreach ($leads as $lead) {
            $lead_data = [];
            $lead_data['insert_type'] = "Meta";
            foreach ($lead["field_data"] as $field) {
                foreach ($mapped_fields as $map_field) {
                    foreach ($map_field as $key => $value) {
                        if ($key == 'Purpose') {
                            $lead_data['status'] = $value;
                        } else if ($field['name'] == $value) {
                            $lead_data[$key] = $field['values'][0];
                        }
                    }
                }
            }

            $foundLead = Lead::where('mobile', $lead_data['mobile'])->orWhere('email', $lead_data['email'])->first();
                if ($foundLead) {
                    foreach ($foundLead->toArray() as $key => $value) {
                        if (isset($foundLead[$key]) && isset($lead_data[$key])) {
                            $lead_data[$key] = str_replace("'", "", $lead_data[$key]);
                            if ($foundLead[$key]  !== $lead_data[$key]) {
                                array_push($duplicateLeads, $lead_data);
                                break;
                            }
                        }
                    }
                } else {
                    $lead_data['creator_id'] = Auth::id();
                    Lead::create($lead_data);
                }
        }
        return $duplicateLeads;

    }

    public function mapFields(Request $request, FacebookGraphService $fbGraphService)
    {
        try {

            $leads = $fbGraphService->getLeads($request['lead_id']);
            $duplicateLeads = [];
            foreach ($leads as $lead) {
                $lead_data = [];
                $lead_data['insert_type'] = "Meta";
                $lead_data['status'] = $request['status'];
                $map_fields = [];
                foreach ($lead["field_data"] as $field) {
                    if ($request[$field['name']] && $request[$field['name']] != 'none') {
                        array_push($map_fields, [$request[$field['name']] => $field['name']]);
                        $lead_data[$request[$field['name']]] = $field['values'][0];
                    }
                }
                array_push($map_fields, ['Purpose' => $lead_data['status']]);

                $foundLead = Lead::where('mobile', $lead_data['mobile'])->orWhere('email', $lead_data['email'])->first();
                if ($foundLead) {
                    foreach ($foundLead->toArray() as $key => $value) {
                        if (isset($foundLead[$key]) && isset($lead_data[$key])) {
                            $lead_data[$key] = str_replace("'", "", $lead_data[$key]);
                            if ($foundLead[$key]  !== $lead_data[$key]) {
                                array_push($duplicateLeads, $lead_data);
                                break;
                            }
                        }
                    }
                } else {
                    $lead_data['creator_id'] = Auth::id();
                    Lead::create($lead_data);
                }
            }
            $lead_info = $fbGraphService->getPageOrLeadInfo($request['lead_id']);
            $metaLead = MetaLeadgenForm::where("lead_id", $lead_info['id'])->first();
            if (!$metaLead) {
                $metadata = [];
                $metadata['lead_id'] = $lead_info['id'];
                $metadata['name'] = $lead_info['name'];
                $metadata['mapped'] = 1;
                $metadata['mapped_by'] = Auth::id();
                $metadata['mapped_fields'] = json_encode($map_fields);
                MetaLeadgenForm::create($metadata);
            }
            return $duplicateLeads;
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function metaCredentialUpdate(Request $request)
    {
        try {
            $meta = MetaCredential::find($request->id);
            if ($meta->app_id) {
                MetaCredential::find($meta->id)->update($request->except('_token'));
            } else {
                MetaCredential::create($request->except('_token'));
            }
            return Redirect::back()->with('success', 'Meta Credential Updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function getCredential()
    {
        $meta = MetaCredential::first();
        return $meta;
    }

    public function getDuplicateLeads(Request $request, FacebookGraphService $fbGraphService)
    {
        $leads = $fbGraphService->getLeads($request['lead_id']);
        $duplicateLeads = [];
        foreach ($leads as $lead) {
            $lead_data = [];
            foreach ($lead["field_data"] as $field) {
                $lead_data[$field['name']] = $field['values'][0];
            }
            $foundLead = Lead::where('mobile', $lead_data['mobile'])->orWhere('email', $lead_data['email'])->first();
            if ($foundLead) {
                if (
                    $foundLead['english'] !== $lead_data['english_proficiency?'] ||
                    $foundLead['name'] !== $lead_data['full_name'] ||
                    $foundLead['last_education'] !== $lead_data['last_education?'] ||
                    $foundLead['email'] !== $lead_data['email'] ||
                    $foundLead['mobile'] !== $lead_data['phone_number']

                ) {
                    array_push($duplicateLeads, $lead_data);
                }
            }
        }
        return $duplicateLeads;
    }

    public function getLeadsValues(Request $request)
    {
        $data = [];
        $lead = Lead::where('mobile', $request['valueFromLead']['mobile'])->orWhere('email', $request['valueFromLead']['email'])->first();
        if ($lead) {
            $data['id'] = $lead->id;
            $data['values'] = [];
            foreach ($lead->toArray() as $key => $value) {
                if ($key != 'id' && $key != 'created_at' && $key != 'updated_at' && $key != 'owner_id' && $key != 'subcategory_id' && $key != 'creator_id') {
                    $lead_data = [];
                    $lead_data['name'] = $key;
                    $lead_data['value'] = $key;
                    $lead_data['previous'] = $lead[$key];
                    $lead_data['newest'] = $lead[$key];
                    if (isset($request['valueFromLead'][$key])) {
                        $lead_data['newest'] = $request['valueFromLead'][$key];
                    }
                    array_push($data['values'], $lead_data);
                }
            }
        }
        return response()->json($data);
    }

    public function updateLeadsById(Request $request)
    {
        try {
            $data = [];
            foreach ($request['valueFromLead']['values'] as $item) {
                $data[$item['value']] = $item['newest'];
            }
            Lead::find($request['valueFromLead']['id'])->update($data);
            return Redirect::back()->with('success', 'Lead Updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function updateAllLeads(Request $request)
    {
        try {
            foreach ($request['valueFromLead'] as $lead) {
                Lead::where('email', $lead['email'])->orWhere('mobile', $lead['mobile'])->update($lead);
            }
            return Redirect::back()->with('success', 'Lead Updated successfully.');
        } catch (\Exception $e) {
            dd($e);

            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}

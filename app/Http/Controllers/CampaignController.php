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
        abort_if(!Auth::user()->hasRole('super-admin'), 403);

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
        $T1 = Lead::first();
        $table_columns = array_keys(json_decode($T1, true));
        $newColumns = [];
        foreach ($table_columns as $table_column) {
            if (
                $table_column != 'id' && $table_column != 'owner_id' && $table_column != 'creator_id' && $table_column != 'created_at' && $table_column != 'updated_at'
                && $table_column != 'subcategory_id' && $table_column != 'documents_pending' && $table_column != 'tag' && $table_column != 'status'
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

    public function mapFields(Request $request, FacebookGraphService $fbGraphService)
    {
        try {

            $leads = $fbGraphService->getLeads($request['lead_id']);

            foreach ($leads as $lead) {
                $lead_data = [];
                $lead_data['creator_id'] = Auth::id();
                foreach ($lead["field_data"] as $field) {
                    if ($request[$field['name']] && $request[$field['name']] != 'none') {
                        $lead_data[$request[$field['name']]] = $field['values'][0];
                    }
                }
                Lead::create($lead_data);
            }
            $lead_info = $fbGraphService->getPageOrLeadInfo($request['lead_id']);
            $metadata = [];
            $metadata['lead_id'] = $lead_info['id'];
            $metadata['name'] = $lead_info['name'];
            $metadata['mapped'] = 1;
            $metadata['mapped_by'] = Auth::id();
            MetaLeadgenForm::create($metadata);
            return Redirect::back()->with('success', 'Lead created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function metaCredentialUpdate(Request $request)
    {
        try {
            MetaCredential::create($request->except('_token'));
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
}

<?php

namespace App\Http\Controllers;

use App\Events\LeadAssignedEvent;
use App\Exports\LeadsExport;
use App\Helper\NewLog;
use App\Imports\LeadsImport;
use App\Models\Lead;
use App\Models\Student;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class LeadController extends Controller
{
    public function index(Request $request)
    { 
        if (\request()->ajax()) {
            return view('leads.index');
        }
        return view('layout.mainlayout');
    }

    public function newLead(Request $request)
    {
        if (\request()->ajax()) {
            return view('leads.index-new');
        }
        return view('layout.mainlayout');
    }
//leads first contact
    public function firstContactLead(){
        if (\request()->ajax()) {
            return view('leads.index-first-contact');
        }
        return view('layout.mainlayout');
    }
    public function list()
    {
        if (\request()->ajax()) {
            $leads = Lead::pure()->orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $leads->where(function ($query) {
                    $query->where('name', 'like', '%' . \request('filter_search') . '%')
                        ->orWhere('email', 'like', '%' . \request('filter_search') . '%')
                        ->orWhere('mobile', 'like', '%' . \request('filter_search') . '%')
                        ->orWhereHas('owner', function ($query) {
                            $query->where('name', 'like', '%' . \request('filter_search') . '%');
                        });
                });
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $leads->where('status', \request('filter_status'));
            }
            if (\request('startDate') != '' && \request('endDate') != '') {
                $startDate = Carbon::parse(\request('startDate'))->format('Y-m-d');
                $endDate = Carbon::parse(\request('endDate'))->format('Y-m-d');
                $leads->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            }
            if (\request('filter_owner') != '') {
                $leads->where('owner_id', request()->filter_owner);
            }
            $leads = $leads->get();

            return datatables()->of($leads)
                ->addColumn('name', function ($row) {
                    $data = '<a data-id="' . $row->id . '" href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->id) . '\');">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->id) . '\');">' . $row->name . '</a>';
                    return $data;
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->owner ? $row->owner->name : 'Unassigned';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('created_by', function ($row) {
                    return $row->creator ? $row->creator->name : 'NA';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Potential') {
                        return '<label class="badge badge-success text-center">' . ucfirst($row->status) . '</label>';
                    } elseif ($row->status == 'Not Potential') {
                        return '<label class="badge badge-primary text-center">' . ucfirst($row->status) . '</label>';
                    } else {
                        return '<label class="badge badge-info text-center">' . ucfirst($row->status) . '</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" onclick="leadConvert(' . $row->id . ');" class="lkb-table-action-btn badge-success btn-convert"><i class="feather-navigation"></i></a>';
                    if (!$row->student && Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="leadDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    if ($row->student)
                        $action .= '<a href="' . route('students.view', $row->student->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'status', 'owner', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
    }

    public function listNewLeads()
    {
        if (\request()->ajax()) {
            $leads = Lead::pure()->orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $leads->where(function ($query) {
                    $query->where('name', 'like', '%' . \request('filter_search') . '%')
                        ->orWhere('email', 'like', '%' . \request('filter_search') . '%')
                        ->orWhere('mobile', 'like', '%' . \request('filter_search') . '%')
                        ->orWhereHas('owner', function ($query) {
                            $query->where('name', 'like', '%' . \request('filter_search') . '%');
                        });
                });
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $leads->where('status', \request('filter_status'));
            }
            if (\request('startDate') != '' && \request('endDate') != '') {
                $startDate = Carbon::parse(\request('startDate'))->format('Y-m-d');
                $endDate = Carbon::parse(\request('endDate'))->format('Y-m-d');
                $leads->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            }
            if (\request('filter_owner') != '') {
                $leads->where('owner_id', request()->filter_owner);
            }
            $leads = $leads->where('status','New Lead')->get();

            return datatables()->of($leads)
                ->addColumn('name', function ($row) {
                    $data = '<a data-id="' . $row->id . '" href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->id) . '\');">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->id) . '\');">' . $row->name . '</a>';
                    return $data;
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->owner ? $row->owner->name : 'Unassigned';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('created_by', function ($row) {
                    return $row->creator ? $row->creator->name : 'NA';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Potential') {
                        return '<label class="badge badge-success text-center">' . ucfirst($row->status) . '</label>';
                    } elseif ($row->status == 'Not Potential') {
                        return '<label class="badge badge-primary text-center">' . ucfirst($row->status) . '</label>';
                    } else {
                        return '<label class="badge badge-info text-center">' . ucfirst($row->status) . '</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" onclick="leadConvert(' . $row->id . ');" class="lkb-table-action-btn badge-success btn-convert"><i class="feather-navigation"></i></a>';
                    if (!$row->student && Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="leadDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    if ($row->student)
                        $action .= '<a href="' . route('students.view', $row->student->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'status', 'owner', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
    }
    public function listFirstContactLead()
    {
        if (\request()->ajax()) {
            $leads = Lead::pure()->orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $leads->where(function ($query) {
                    $query->where('name', 'like', '%' . \request('filter_search') . '%')
                        ->orWhere('email', 'like', '%' . \request('filter_search') . '%')
                        ->orWhere('mobile', 'like', '%' . \request('filter_search') . '%')
                        ->orWhereHas('owner', function ($query) {
                            $query->where('name', 'like', '%' . \request('filter_search') . '%');
                        });
                });
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $leads->where('status', \request('filter_status'));
            }
            if (\request('startDate') != '' && \request('endDate') != '') {
                $startDate = Carbon::parse(\request('startDate'))->format('Y-m-d');
                $endDate = Carbon::parse(\request('endDate'))->format('Y-m-d');
                $leads->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            }
            if (\request('filter_owner') != '') {
                $leads->where('owner_id', request()->filter_owner);
            }
            $leads = $leads->where('status','1st Contact')->get();

            return datatables()->of($leads)
                ->addColumn('name', function ($row) {
                    $data = '<a data-id="' . $row->id . '" href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->id) . '\');">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->id) . '\');">' . $row->name . '</a>';
                    return $data;
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->owner ? $row->owner->name : 'Unassigned';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('created_by', function ($row) {
                    return $row->creator ? $row->creator->name : 'NA';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Potential') {
                        return '<label class="badge badge-success text-center">' . ucfirst($row->status) . '</label>';
                    } elseif ($row->status == 'Not Potential') {
                        return '<label class="badge badge-primary text-center">' . ucfirst($row->status) . '</label>';
                    } else {
                        return '<label class="badge badge-info text-center">' . ucfirst($row->status) . '</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" onclick="leadConvert(' . $row->id . ');" class="lkb-table-action-btn badge-success btn-convert"><i class="feather-navigation"></i></a>';
                    if (!$row->student && Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="leadDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    if ($row->student)
                        $action .= '<a href="' . route('students.view', $row->student->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'status', 'owner', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
    }

    public function view($id, Request $request)
    {
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            return view('leads.view', compact('lead'));
        }

        return view('layout.mainlayout');
    }

    public function create()
    {
        $users = User::admins()->select('id', 'name', 'email')->get();
        $all_users = User::select('id', 'name')->get();
        $universities = University::select('id', 'name')->get();
        $me_and_sa = User::superAdmins()->orWhere('id', Auth::user()->id)->select('id', 'name')->get();
        return response()->json(['users' => $users, 'all_users' => $all_users, 'universities' => $universities, 'me_and_sa' => $me_and_sa]);
    }

    public function store(Request $request)
    {
        try {
            Lead::create($request->all());
            return Redirect::back()->with('success', 'Lead created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            return response()->json($lead);
        }

        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $users = User::admins()->select('id', 'name')->get();
            return view('leads.edit', compact('lead', 'users'));
        } catch (\Exception $e) {
            return Redirect::back()->with('info', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        try {
            $lead = Lead::find($id);
            $leadCounsellorIdOld = $lead->owner_id;
            abort_if((!Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $lead->update($request->except('_token', '_method'));
            $lead = Lead::find($id);
            if ($leadCounsellorIdOld != $lead->owner_id && $lead->owner_id) {
                LeadAssignedEvent::dispatch($lead);
                NewLog::create('Lead Assigned', 'Lead "' . $lead->name . '" has been assigned to ' . $lead->owner->name . '.');
            }
            return Redirect::route('leads.index')->with('success', 'Lead updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function convert($id, Request $request)
    {
        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $data = $lead->toArray();
            unset($data['id']);
            unset($data['created_at']);
            unset($data['updated_at']);
            unset($data['creator_id']);
            $data['lead_id'] = $lead->id;
            Student::create($data);
            NewLog::create('Lead Converted To Student', 'Lead "' . $lead->name . '" has been converted to student.');
            Session::flash('success', 'Lead converted successfully.');
            return response('Lead converted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('super-admin')), 403);
            $lead->delete();
            Session::flash('success', 'Lead deleted successfully.');
            return response('Lead deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function import()
    {
        Excel::import(new LeadsImport, request()->file('file'));
        NewLog::create('Leads Imported', 'Multiple leads have been imported.');
        Session::flash('success', 'Leads imported successfully.');
        return Redirect::back()->with('success', 'Lead Imported successfully.');
    }

    public function export()
    {
        NewLog::create('Leads Downloaded', 'Leads have been downloaded.');
        return Excel::download(new LeadsExport, 'leads.csv');
    }

    public function convertMultipleLeads(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array|min:1'
        ]);
        try {
            $leads = Lead::find($request->lead_ids);
            foreach ($leads as $lead) {
                $data = $lead->toArray();
                unset($data['id']);
                unset($data['created_at']);
                unset($data['updated_at']);
                unset($data['creator_id']);
                $data['lead_id'] = $lead->id;
                $student = Student::create($data);
                NewLog::create('Lead Converted To Student', 'Lead "' . $student->name . '" has been converted to student.');
            }
            NewLog::create('Multiple Leads Converted', 'Multiple Leads have been converted to students.');
            Session::flash('success', 'All Leads converted successfully.');
            return response('All Leads converted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function assignMultipleLeads(Request $request)
    {
        $request->validate([
            'lead_ids' => 'required|array|min:1',
            'counsellor_id' => 'required'
        ]);
        try {
            $leads = Lead::find($request->lead_ids);
            foreach ($leads as $lead) {
                $lead->update([
                    'owner_id' => $request->counsellor_id
                ]);
                $lead = Lead::find($lead->id);
                LeadAssignedEvent::dispatch($lead);
                NewLog::create('Lead Assigned', 'Lead "' . $lead->name . '" has been assigned to ' . $lead->owner->name . '.');
            }
            NewLog::create('Multiple Leads Assigned', 'Multiple Leads has been assigned to ' . $lead->owner->name . '.');
            Session::flash('success', 'All Leads assigned successfully.');
            return response('All Leads assigned successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }
}

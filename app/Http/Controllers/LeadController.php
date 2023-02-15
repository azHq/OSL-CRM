<?php

namespace App\Http\Controllers;

use App\Events\LeadAssignedEvent;
use App\Exports\LeadsExport;
use App\Helper\NewLog;
use App\Imports\LeadsImport;
use App\Models\Category;
use App\Models\Lead;
use App\Models\Student;
use App\Models\Subcategory;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
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

    public function indexByStatus($status, Request $request)
    {
        if (\request()->ajax()) {
            return view('leads.status.index', ['status' => $status]);
        }
        return view('layout.mainlayout');
    }


    public function list()
    {
        if (\request()->ajax()) {
            $leads = Lead::orderBy('created_at', 'desc');
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
                    return '<label class="badge badge-info text-center">' . ucfirst($row->subcategory->name) . '</label>';
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#mail_lead" class="mail-lead lkb-table-action-btn url badge-success btn-edit"><i class="feather-mail"></i></a>';
                    $action .= '<a href="' . route('leads.view', $row->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    if (Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="leadDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'status', 'owner', 'created_at', 'created_by', 'action'])
                ->make(true);
        }
    }

    public function lisByStatus()
    {
        if (\request()->ajax()) {
            $leads = Lead::orderBy('created_at', 'desc');
            $leads->whereHas('subcategory', function ($query) {
                $query->where('slug', \request('status'));
            });
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
                    return '<label class="badge badge-info text-center">' . ucfirst($row->subcategory->name) . '</label>';
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if (!$row->student)
                        $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_lead" class="edit-lead lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="javascript:;" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#mail_lead" class="mail-lead lkb-table-action-btn url badge-warning btn-edit"><i class="feather-mail"></i></a>';
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
            $lead = Lead::find($id)->load('report')->load("report.user");
            error_log($lead);
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

    public function subcategoriesList($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }

    public function store(Request $request)
    {
        try {
            Lead::create($request->except('_token', 'category_id'));
            return Redirect::back()->with('success', 'Lead created successfully.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            $categories = Category::all();
            $subcategories = Subcategory::where('category_id', $lead->subcategory->category_id)->get();
            return response()->json([
                'lead' => $lead,
                'subcategories' => $subcategories,
                'categories' => $categories,
                'category_id' => $lead->subcategory->category_id,
                'subcategory_id' => $lead->subcategory_id
            ]);
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

    public function mail($id)
    {
        if (\request()->ajax()) {
            $lead = Lead::find($id);
            $categories = Category::all();
            $subcategories = Subcategory::where('category_id', $lead->subcategory->category_id)->get();
            return response()->json([
                'lead' => $lead,
                'subcategories' => $subcategories,
                'categories' => $categories,
                'category_id' => $lead->subcategory->category_id,
                'subcategory_id' => $lead->subcategory_id
            ]);
        }

        try {
            $lead = Lead::find($id);
            abort_if((!Auth::user()->hasRole('super-admin') && $lead->owner_id != Auth::user()->id), 403);
            $users = User::admins()->select('id', 'name')->get();
            return view('leads.mail', compact('lead', 'users'));
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
            $lead->update($request->except('_token', '_method', 'category_id'));
            $lead = Lead::find($id);
            if ($leadCounsellorIdOld != $lead->owner_id && $lead->owner_id) {
                LeadAssignedEvent::dispatch($lead);
                NewLog::create('Lead Assigned', 'Lead "' . $lead->name . '" has been assigned to ' . $lead->owner->name . '.');
            }
            return Redirect::route('leads.index')->with('success', 'Lead updated successfully.');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
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

    public function sendMail(Request $request){
        try {
            $request->validate([
                'email' => 'required',
                'subject' => 'required',
                'email_body' => 'required',
            ]);
            $info=[
                'to'=>$request->input('email'),
                'subject' => $request->input('subject'),
                'text_message' => $request->input('email_body'),
            ];
            Mail::send('mail', $info, function ($messages) use ($info){
//                $messages->from('you@mail.com', 'OSL-CRM');
                $messages->to($info['to'], 'OSL_CRM');
                $messages->subject($info['subject']);
            });
            return Redirect::back()->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }
}

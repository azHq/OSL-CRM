<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Student;
use App\Models\University;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{

    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('applications.index');
        }
        return view('layout.mainlayout');
    }

    public function list(Request $request)
    {
        if (\request()->ajax()) {
            $applications = Application::orderBy('created_at', 'desc');
            if (\request('lead_id')) {
                $applications->where('lead_id', \request('lead_id'));
            }
            $applications = $applications->get();

            return datatables()->of($applications)
                ->addColumn('lead', function ($row) {
                    return $row->lead->name;
                })
                ->addColumn('counsellor', function ($row) {
                    return $row->lead->owner ? $row->lead->owner->name : 'Unassigned';
                })
                ->addColumn('course', function ($row) {
                    return $row->course;
                })
                ->editColumn('intake_year', function ($row) {
                    return $row->intake_year;
                })
                ->editColumn('intake_month', function ($row) {
                    if (!$row->intake_month) return '';
                    $monthNum  = $row->intake_month;
                    $dateObj = DateTime::createFromFormat('!m', $monthNum);
                    return $dateObj->format('F');
                })
                ->editColumn('university', function ($row) {
                    return $row->university->name;
                })
                ->editColumn('applied', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Applied') {
                        return '<label class="badge badge-success text-center">' . ucfirst($row->status) . '</label>';
                    } elseif ($row->status == 'Offer Received') {
                        return '<label class="badge badge-primary text-center">' . ucfirst($row->status) . '</label>';
                    } else {
                        return '<label class="badge badge-info text-center">' . ucfirst($row->status) . '</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '<a href="#" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_application" class="edit-application lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    if (Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="applicationDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['lead', 'counsellor', 'course', 'intake_month', 'intake_year', 'university', 'applied', 'status', 'action'])
                ->make(true);
        }
    }

    public function create(Request $request)
    {
        $universities = University::select('id', 'name')->get();
        $leads = Student::select('id', 'name')->get();
        return response()->json([
            'universities' => $universities,
            'leads' => $leads
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'lead_id' => 'required',
            'course' => 'required',
            'course_details' => 'required',
            'intake_year' => 'required',
            'intake_month' => 'required',
            'status' => 'required',
            'compliance' => 'required',
            'university_id' => 'required'
        ]);
        try {
            Application::create([
                'lead_id' => $request->lead_id,
                'course' => $request->course,
                'course_details' => $request->course_details,
                'intake_year' => $request->intake_year,
                'intake_month' => $request->intake_month,
                'status' => $request->status,
                'compliance' => $request->compliance,
                'university_id' => $request->university_id,
            ]);
            return Redirect::back()->with('success', 'Application created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (\request()->ajax()) {
            $application = Application::find($id);
            $application->load('lead');
            return response()->json($application);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $application = Application::find($id);
            $application->update($request->except('_token', '_method','name', 'email', 'mobile'));
//            return Redirect::back()->with('success', 'Application updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $application = Application::find($id);
            abort_if((!Auth::user()->hasRole('super-admin')), 403);
            $application->delete();
            Session::flash('success', 'Application deleted successfully.');
            return response('Application deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function listByLeadId($lead_id){
        $applications = Application::where('lead_id', $lead_id)->get();
        $applications = $applications->map(function ($item) {
            return [
                'id' => $item->id,
                'lead' => $item->lead->name,
                'course' => $item->course,
                'course_details' => $item->course_details,
                'intake_year' => $item->intake_year,
                'intake_month' => $item->intake_month,
                'status' => $item->status,
                'compliance' => $item->compliance,
                'university' => $item->university->name,
            ];
        })->toArray();
        return response()->json(['applications' => $applications]);
    }
}

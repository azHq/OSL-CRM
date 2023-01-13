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
            if (\request('student_id')) {
                $applications->where('student_id', \request('student_id'));
            }
            $applications = $applications->get();

            return datatables()->of($applications)
                ->addColumn('student', function ($row) {
                    return $row->student->name;
                })
                ->addColumn('counsellor', function ($row) {
                    return $row->student->owner ? $row->student->owner->name : 'Unassigned';
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
                    $action = '<a href="#" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_application" class="edit-application lkb-table-action-btn url badge-info btn-edit" data-student-id="' . $row->student->id . '" data-student-name="' . $row->student->name . '"><i class="feather-edit"></i></a>';
                    $action .= '<a href="#" data-id="' . $row->student_id . '" data-name="' . $row->student->name . '" data-bs-toggle="modal" data-bs-target="#add_application" class="add-application lkb-table-action-btn url badge-info btn-edit"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>';
                    if (Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="applicationDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['student', 'counsellor', 'course', 'intake_month', 'intake_year', 'university', 'applied', 'status', 'action'])
                ->make(true);
        }
    }

    public function create(Request $request)
    {
        $universities = University::select('id', 'name')->get();
        $students = Student::select('id', 'name')->get();
        return response()->json([
            'universities' => $universities,
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->except('_token');
            Application::create($data);
            return Redirect::back()->with('success', 'Application created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (\request()->ajax()) {
            $application = Application::find($id);
            return response()->json($application);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $application = Application::find($id);
            $application->update($request->except('_token', '_method'));
            return Redirect::route('applications.index')->with('success', 'Application updated successfully.');
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
}

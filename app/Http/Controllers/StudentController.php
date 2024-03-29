<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('students.index');
        }

        return view('layout.mainlayout');
    }

    public function list(Request $request)
    {
        if (\request()->ajax()) {
            $students = Student::orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $students->where('name', 'like', '%' . \request('filter_search') . '%')
                    ->orWhere('email', 'like', '%' . \request('filter_search') . '%')
                    ->orWhere('mobile', 'like', '%' . \request('filter_search') . '%');
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $students->where('status', \request('filter_status'));
            }
            if (\request('startDate') != '' && \request('endDate') != '') {
                $startDate = Carbon::parse(\request('startDate'))->format('Y-m-d');
                $endDate = Carbon::parse(\request('endDate'))->format('Y-m-d');
                $students->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            }
            if (\request('filter_owner') != '') {
                $students->where('owner_id', request()->filter_owner);
            }
            $students = $students->get();

            return datatables()->of($students)
                ->addColumn('name', function ($row) {
                    $data = '<a href="javascript:;" onclick="gotoRoute(\'' . route('students.view', $row->id) . '\'");">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="javascript:;" onclick="gotoRoute(\'' . route('students.view', $row->id) . '\');">' . $row->name . '</a>';
                    return $data;
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('owner', function ($row) {
                    return $row->lead->owner ? $row->lead->owner->name : 'Unassigned';
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
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
                    $action = '<a href="#" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_student" class="edit-student lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="javascript:;" onclick="gotoRoute(\'' . route('students.view', $row->id) . '\');" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'status', 'owner', 'created_at', 'action'])
                ->make(true);
        }
    }

    public function view($id, Request $request)
    {
        if (\request()->ajax()) {
            $student = Student::find($id);
            return view('students.view', compact('student'));
        }

        return view('layout.mainlayout');
    }

    public function create()
    {
        $users = User::admins()->select('id', 'name')->get();
        return response()->json(['users' => $users]);
    }

    public function store(Request $request)
    {
        try {
            Student::create($request->except('_token'));
            return Redirect::route('students.index')->with('success', 'Lead converted to Student successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        if (\request()->ajax()) {
            $student = Student::find($id);
            return response()->json($student);
        }
    }

    public function update($id, Request $request)
    {
        try {
            Student::where('id', $id)->update($request->except('_token', '_method'));
            return Redirect::route('students.index')->with('success', 'Student updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            Student::where('id', $id)->delete();
            return Redirect::back()->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}

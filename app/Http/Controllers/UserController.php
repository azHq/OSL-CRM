<?php

namespace App\Http\Controllers;

use App\Events\TaskAssignedEvent;
use App\Models\Lead;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function list()
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);
        if (\request()->ajax()) {
            $users = User::admins()->orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $users->where('name', 'like', '%' . \request('filter_search') . '%')
                    ->orWhere('email', 'like', '%' . \request('filter_search') . '%')
                    ->orWhere('mobile', 'like', '%' . \request('filter_search') . '%');
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $users->where('status', \request('filter_status'));
            }
            $users = $users->get();

            return datatables()->of($users)
                ->addColumn('name', function ($row) {
                    $data = '<a href="' . route('users.view', $row->id) . '">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="' . route('users.view', $row->id) . '">' . $row->name . '</a>';
                    return $data;
                })
                ->editColumn('mobile', function ($row) {
                    return $row->mobile;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->editColumn('add_task', function ($row) {
                    return '<a href="#" data-id="' . $row->id . '" data-name="' . $row->name . '" data-bs-toggle="modal" data-bs-target="#add_task" class="add-task lkb-table-action-btn url badge-info btn-edit"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Active') {
                        return '<label class="badge badge-success text-center">' . ucfirst($row->status) . '</label>';
                    } elseif ($row->status == 'Inactive') {
                        return '<label class="badge badge-warning text-center">' . ucfirst($row->status) . '</label>';
                    } else {
                        return '<label class="badge badge-danger text-center">' . ucfirst($row->status) . '</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="' . route('users.view', $row->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    $action .= '<a href="#" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_user" class="edit-user lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="#" onclick="userDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'email', 'mobile', 'status', 'created_at', 'add_task', 'action'])
                ->make(true);
        }
    }

    public function index(Request $request)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);

        if (\request()->ajax()) {
            return view('users.index');
        }

        return view('layout.mainlayout');
    }

    public function croIndex(Request $request)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);

        if (\request()->ajax()) {
            return view('cros.index');
        }

        return view('layout.mainlayout');
    }

    public function view($id, Request $request)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);
        if (\request()->ajax()) {
            $user = User::find($id);
            return view('users.view', compact('user'));
        }

        return view('layout.mainlayout');
    }

    public function store(Request $request)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);
        if ($request->password != $request->cpassword) {
            return response(['success' => false, 'message' => 'Password Not Matched!']);
        }
        try {
            $user = User::create($request->except('_token', 'cpassword'));
            $role = Role::findByName('admin');
            $user->assignRole($role);
            return Redirect::back()->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);

        if (\request()->ajax()) {
            $user = User::find($id);
            return response()->json($user);
        }

        try {
            $user = User::find($id);
            return view('users.edit', compact('user'));
        } catch (\Exception $e) {
            return Redirect::back()->with('info', $e->getMessage());
        }
    }

    public function update($id, Request $request)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);
        try {
            User::where('id', $id)->update($request->except('_token', '_method'));
            return Redirect::route('users.index')->with('success', 'Counsellor updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        abort_if(!Auth::user()->hasRole('super-admin'), 403);
        try {
            $user = User::find($id);
            abort_if((!Auth::user()->hasRole('super-admin')), 403);
            $user->delete();
            Session::flash('success', 'Counsellor deleted successfully.');
            return response('Counsellor deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }


    public function storeTask(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'details' => 'required',
            'assignee_id' => 'required'
        ]);
        try {
            $task = Task::create([
                'name' => $request->name,
                'start' => $request->start_date . ' ' . $request->start_time,
                'end' => $request->end_date . ' ' . $request->end_time,
                'details' => $request->details,
                'assignee_id' => $request->assignee_id,
            ]);
            if ($task->assignee_id) {
                TaskAssignedEvent::dispatch($task);
            }
            return Redirect::back()->with('success', 'Task assigned successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function tasks($id)
    {
        if (\request()->ajax()) {
            $tasks = Task::where('assignee_id', $id)->orderBy('created_at', 'desc');
            if (\request('filter_search') != '') {
                $tasks->where(function ($query) {
                    $query->where('name', 'like', '%' . \request('filter_search') . '%')
                        ->orWhereHas('assignee', function ($query) {
                            $query->where('name', 'like', '%' . \request('filter_search') . '%');
                        });
                });
            }
            if (\request('filter_status') != '' || \request('filter_status') != null) {
                $tasks->where('status', \request('filter_status'));
            }
            if (\request('startDate') != '' && \request('endDate') != '') {
                $startDate = Carbon::parse(\request('startDate'))->format('Y-m-d');
                $endDate = Carbon::parse(\request('endDate'))->format('Y-m-d');
                $tasks->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate);
            }
            if (\request('filter_assignee') != '') {
                $tasks->where('assignee_id', request()->filter_assignee);
            }
            $tasks = $tasks->get();

            return datatables()->of($tasks)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('start', function ($row) {
                    return $row->start;
                })
                ->editColumn('end', function ($row) {
                    return $row->end;
                })
                ->editColumn('status', function ($row) {
                    return $row->status;
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    if ($row->start > date('Y-m-d'))
                        $action .= '<a href="#" data-id="' . $row->id . '" data-assignee-id="' . $row->assignee->id . '" data-assignee-name="' . $row->assignee->name . '" data-bs-toggle="modal" data-bs-target="#edit_task_users" class="edit-task-users lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="#" onclick="taskDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'status', 'start', 'end', 'created_at', 'action'])
                ->make(true);
        }
    }

    public function appointments()
    {
        if (\request()->ajax()) {
            return view('appointments.index');
        }
        return view('layout.mainlayout');
    }

    public function appointmentsList()
    {
        $email = Auth::user()->email;
        $lead = Lead::where('email', '=', $email)->get()[0];
        $counselor = User::where('id', '=', $lead->owner_id)->get();
        return datatables()->of($counselor)
            ->addColumn('name', function ($row) {
                $data = '<a href="' . route('users.view', $row->id) . '">
                                <span class="person-circle-a person-circle">' . substr($row->name, 0, 1) . '</span>
                            </a>
                            <a href="' . route('users.view', $row->id) . '">' . $row->name . '</a>';
                return $data;
            })
            ->editColumn('mobile', function ($row) {
                return $row->mobile;
            })
            ->editColumn('email', function ($row) {
                return $row->email;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('action', function ($row) {
                $action = '';
                $action .= '<a href="' . route('users.view', $row->id) . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-edit">Message</i></a>';
                return $action;
            })
            ->addIndexColumn()
            ->rawColumns(['name', 'email', 'mobile', 'created_at', 'action'])
            ->make(true);
    }
}

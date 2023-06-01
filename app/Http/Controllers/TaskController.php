<?php

namespace App\Http\Controllers;

use App\Events\TaskAssignedEvent;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    public function calendarEventsPending(Request $request)
    {
        $data = Task::query();
        $data->where('status', 'Pending');
        if ($request->start && $request->end) {
            $data->whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end);
        }
        $data = $data->get();
        $data = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'start' => $item->start,
                'end' => $item->end,
                'allDay' => true,
                'counsellor_name' => $item->assignee ? $item->assignee->name : 'Unassigned',
                'start_time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $item->start)->format('h:i A'),
            ];
        });
        return response()->json($data);
    }

    public function calendarEventsResolved(Request $request)
    {
        $data = Task::query();
        $data->where('status', 'Resolved');
        if ($request->start && $request->end) {
            $data->whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end);
        }
        $data = $data->get();
        $data = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'start' => $item->start,
                'end' => $item->end,
                'allDay' => true,
                'counsellor_name' => $item->assignee ? $item->assignee->name : 'Unassigned',
                'start_time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $item->start)->format('h:i A'),
            ];
        });
        return response()->json($data);
    }

    public function calendarEventsCanceled(Request $request)
    {
        $data = Task::query();
        $data->where('status', 'Canceled');
        if ($request->start && $request->end) {
            $data->whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end);
        }
        $data = $data->get();
        $data = $data->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->name,
                'start' => $item->start,
                'end' => $item->end,
                'allDay' => true,
                'counsellor_name' => $item->assignee ? $item->assignee->name : 'Unassigned',
                'start_time' =>  Carbon::createFromFormat('Y-m-d H:i:s', $item->start)->format('h:i A'),
            ];
        });
        return response()->json($data);
    }

    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('tasks.index');
        }

        return view('layout.mainlayout');
    }

    public function calendarEvents(Request $request)
    {
        switch ($request->type) {
            case 'create':
                $event = Task::create([
                    'name' => $request->event_name,
                    'start' => $request->event_start,
                    'end' => $request->event_end,
                ]);
                return response()->json($event);
                break;

            case 'edit':
                $event = Task::find($request->id);
                $request->title ? $event->name = $request->title : null;
                $request->start ?  $event->start = Carbon::createFromFormat('d/m/Y, H:i:s', $request->start)->format('Y-m-d H:i:s') : null;
                $request->end ? $event->end = Carbon::createFromFormat('d/m/Y, H:i:s', $request->end)->format('Y-m-d H:i:s') : null;
                $event->save();
                return response()->json($event);
                break;
            case 'close':
                $event = Task::find($request->id);
                $request->status ? $event->status = $request->status : null;
                $request->details ? $event->details = $request->details : null;
                $event->save();
                return response()->json($event);
                break;

            case 'delete':
                $event = Task::find($request->id)->delete();
                return response()->json($event);
                break;

            default:
                return response()->json('ok');
                break;
        }
    }

    public function list()
    {
        if (\request()->ajax()) {
            $tasks = Task::query();
            $myQ = "assignee_id = 'auth_id' DESC";
            $myQ = str_replace('auth_id', Auth::user()->id, $myQ);
            $tasks->orderByRaw($myQ);
            $tasks->orderByRaw('case when `status` LIKE "%Pending%" then 2 when `status` LIKE "%Resolved%" then 3 else 4 end');
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
            $tasks = $tasks->orderBy('created_at', 'desc')->get();

            return datatables()->of($tasks)
                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('assignee', function ($row) {
                    return $row->assignee ? $row->assignee->name : 'Unassigned';
                })
                ->editColumn('start', function ($row) {
                    return date('d-m-Y h:i A', strtotime($row->start));
                })
                ->editColumn('end', function ($row) {
                    return date('d-m-Y h:i A', strtotime($row->end));
                })
                ->editColumn('details', function ($row) {
                    return $row->details ?? 'No Details';
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'Resolved') {
                        return '<label class="badge badge-success text-center">' . ucfirst($row->status) . '</label>';
                    } elseif ($row->status == 'Canceled') {
                        return '<label class="badge badge-danger text-center">' . ucfirst($row->status) . '</label>';
                    } else {
                        return '<label class="badge badge-info text-center">' . ucfirst($row->status) . '</label>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $action = '<div style="text-align:end;">';
                    if ($row->start > date('Y-m-d'))
                        $action .= '<a href="#" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_task" class="edit-task lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    if (Auth::user()->hasRole('super-admin'))
                        $action .= '<a href="javascript:;" onclick="taskDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action . '</div>';
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'status', 'details', 'assignee', 'start', 'end', 'created_at', 'action'])
                ->make(true);
        }
    }

    public function create()
    {
        //
    }

    public function view()
    {
        //
    }

    public function edit($id)
    {
        if (\request()->ajax()) {
            $task = Task::find($id);
            $task = [
                'id' => $task->id,
                'name' => $task->name,
                'details' => $task->details,
                'assignee_id' => $task->assignee_id,
                'start_date' =>  date('Y-m-d', strtotime($task->start)),
                'start_time' => date('H:i:s', strtotime($task->start)),
                'end_date' => date('Y-m-d', strtotime($task->end)),
                'end_time' => date('H:i:s', strtotime($task->end)),
                'status' => $task->status
            ];
            return response()->json($task);
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $task = Task::find($id);
            $taskCounsellorIdOld = $task->assignee_id;
            $task->update([
                'name' => $request->name,
                'start' => $request->start_date . ' ' . $request->start_time,
                'end' => $request->end_date . ' ' . $request->end_time,
                'details' => $request->details,
                'assignee_id' => $request->assignee_id,
                'status' => $request->status,
            ]);
            $task = Task::find($id);
            if ($taskCounsellorIdOld != $task->assignee_id) {
                TaskAssignedEvent::dispatch($task);
            }
            return Redirect::back()->with('success', 'Task updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function complete($id)
    {
        try {
            $task = Task::find($id);
            //            abort_if((!Auth::user()->hasRole('super-admin')), 403);
            $task->update([
                'status' => 'Resolved'
            ]);
            Session::flash('success', 'Task completed successfully.');
            return response('Task completed successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function cancel($id)
    {
        try {
            $task = Task::find($id);
            abort_if((!Auth::user()->hasRole('super-admin')), 403);
            $task->update([
                'status' => 'Canceled'
            ]);
            Session::flash('success', 'Task canceled successfully.');
            return response('Task canceled successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $task = Task::find($id);
            abort_if((!Auth::user()->hasRole('super-admin')), 403);
            $task->delete();
            Session::flash('success', 'Task deleted successfully.');
            return response('Task deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'details' => 'required',
            'assignee_id' => 'required',
            'task_type' => 'required'
        ]);
        try {
            $task = Task::create([
                'name' => $request->name,
                'task_type' => $request->task_type,
                'start' => $request->start_date,
                'end' => $request->end_date,
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



    public function todoList()
    {
        $todolist = Task::all();
        $todolist = $todolist->map(function ($item) {
            return [
                'id' => $item->id,
                'color' => $item->color,
                'name' => $item->name,
                'details' => $item->details,
                'start' => $item->start,
                'end' => $item->end,
                'status' => $item->status,
                'assignee_id' => $item->assignee_id,
                'assignee_name' => $item->assignee ? $item->assignee->name : '',
            ];
        })->toArray();
        return response()->json(['tasks' => $todolist]);
    }

    public function todoScheduledList()
    {
        $todolist = Task::where('task_type', 'Scheduled')
            ->where('status', '!=', 'Resolved')
            ->where('start', '<=', Carbon::now())->where('end', '>=', Carbon::now())
            ->skip(0)->take(5)->get();

        $todolist = $todolist->map(function ($item) {
            return [
                'id' => $item->id,
                'color' => $item->color,
                'name' => $item->name,
                'details' => $item->details,
                'start' => $item->start,
                'end' => $item->end,
                'status' => $item->status,
                'assignee_id' => $item->assignee_id,
                'assignee_name' => $item->assignee ? $item->assignee->name : '',
            ];
        })->toArray();
        return response()->json(['tasks' => $todolist]);
    }

    public function todoListByAssignee($id)
    {
        $todolist = Task::where('assignee_id', $id)->get();
        $todolist = $todolist->map(function ($item) {
            return [
                'id' => $item->id,
                'color' => $item->color,
                'name' => $item->name,
                'details' => $item->details,
                'start' => $item->start,
                'end' => $item->end,
                'status' => $item->status,
                'assignee_id' => $item->assignee_id,
                'assignee_name' => $item->assignee ? $item->assignee->name : '',
            ];
        })->toArray();
        return response()->json(['tasks' => $todolist]);
    }

    public function todoListByDateRange($type)
    {
        //        $type: 0 => weekly, 1=> monthly
        if ($type == 0)
            $date = Carbon::now()->subWeek();
        elseif ($type == 1)
            $date = Carbon::now()->subMonth();

        $todolist = Task::where('created_at', '>=', $date)->get();
        $todolist = $todolist->map(function ($item) {
            return [
                'id' => $item->id,
                'color' => $item->color,
                'name' => $item->name,
                'details' => $item->details,
                'start' => $item->start,
                'end' => $item->end,
                'status' => $item->status,
                'assignee_id' => $item->assignee_id,
                'assignee_name' => $item->assignee ? $item->assignee->name : '',
            ];
        })->toArray();
        return response()->json(['tasks' => $todolist]);
    }
}

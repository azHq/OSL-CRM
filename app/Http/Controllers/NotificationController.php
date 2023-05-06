<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('notifications.index');
        }
        return view('layout.mainlayout');
    }

    public function list()
    {
        if (\request()->ajax()) {
            $notifications = Notification::where('notifiable_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

            return datatables()->of($notifications)
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('description', function ($row) {
                    return $row->description;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="#" onclick="notificationDelete(\'' . $row->id . '\');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    $action .= '<a href="' . $row->url . '" class="lkb-table-action-btn badge-primary btn-view"><i class="feather-info"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['title', 'description', 'created_at', 'action'])
                ->make(true);
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $notification = Notification::find($id);
            $notification->delete();
            Session::flash('success', 'Notification deleted successfully.');
            return response('Notification deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }

    public function updateNotifications($id){
    $notifications = Notification::where('notifiable_id', $id)
        ->whereNull('read_at')
        ->get();
    foreach ($notifications as $notification){
        $notification->read_at = Carbon::now();
        $notification->save();
    }
        return response('Notifications updated successfully.');
    }
}

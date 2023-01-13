<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('activities.index');
        }
        return view('layout.mainlayout');
    }

    public function list()
    {
        if (\request()->ajax()) {
            $activities = Activity::orderBy('created_at', 'desc');
            $activities = $activities->get();

            return datatables()->of($activities)
                ->addColumn('user', function ($row) {
                    $data = '<a data-id="' . $row->user->id . '" href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->user->id) . '\');">
                                <span class="person-circle-a person-circle">' . substr($row->user->name, 0, 1) . '</span>
                            </a>
                            <a href="javascript:;" onclick="gotoRoute(\'' . route('leads.view', $row->user->id) . '\');">' . $row->user->name . '</a>';
                    return $data;
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('details', function ($row) {
                    return $row->details;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addIndexColumn()
                ->rawColumns(['user', 'name', 'details', 'created_at'])
                ->make(true);
        }
    }

}

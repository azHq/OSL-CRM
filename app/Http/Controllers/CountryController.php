<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('universities.index');
        }
        return view('layout.mainlayout');
    }

    public function list()
    {
        if (\request()->ajax()) {
            $universities = University::orderBy('name', 'asc');
            if (\request('filter_search') != '') {
                $universities->where(function ($query) {
                    $query->where('name', 'like', '%' . \request('filter_search') . '%');
                });
            }
            $universities = $universities->get();

            return datatables()->of($universities)
                ->addColumn('name', function ($row) {
                    return ucfirst($row->name);
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<a href="#" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_university" class="edit-university lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></a>';
                    $action .= '<a href="#" onclick="universityDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></a>';
                    return $action;
                })
                ->addIndexColumn()
                ->rawColumns(['name', 'created_at', 'action'])
                ->make(true);
        }
    }

    public function store(Request $request)
    {
        try {
            University::create($request->all());
            return Redirect::back()->with('success', 'University created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (\request()->ajax()) {
            $university = University::find($id);
            return response()->json($university);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $university = University::find($id);
            $university->update($request->except('_token', '_method'));
            return Redirect::route('universities.index')->with('success', 'University updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $university = University::find($id);
            $university->delete();
            Session::flash('success', 'University deleted successfully.');
            return response('University deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }
}

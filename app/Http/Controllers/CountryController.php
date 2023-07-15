<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('countries.index');
        }
        return view('layout.mainlayout');
    }

    public function getCountries(){
        $countries = Country::orderBy('name', 'asc')->get();
        return $countries;
    }

    public function list()
    {
        if (\request()->ajax()) {
            $countries = Country::orderBy('name', 'asc');
            if (\request('filter_search') != '') {
                $countries->where(function ($query) {
                    $query->where('name', 'like', '%' . \request('filter_search') . '%');
                });
            }
            $countries = $countries->get();

            return datatables()->of($countries)
                ->addColumn('name', function ($row) {
                    return ucfirst($row->name);
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('action', function ($row) {
                    $action = '';
                    $action .= '<button  data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#edit_university" class="edit-country lkb-table-action-btn url badge-info btn-edit"><i class="feather-edit"></i></button>';
                    $action .= '<button  onclick="countryDelete(' . $row->id . ');" class="lkb-table-action-btn badge-danger btn-delete"><i class="feather-trash-2"></i></button>';
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
            Country::create($request->all());
            return Redirect::back()->with('success', 'Country created successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        if (\request()->ajax()) {
            $country = Country::find($id);
            return response()->json($country);
        }
    }

    public function update($id, Request $request)
    {
        try {
            $country = Country::find($id);
            $country->update($request->except('_token', '_method'));
            return Redirect::route('countries.index')->with('success', 'Country updated successfully.');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }

    public function delete($id, Request $request)
    {
        try {
            $country = Country::find($id);
            $country->delete();
            Session::flash('success', 'Country deleted successfully.');
            return response('Country deleted successfully.');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return response($e->getMessage());
        }
    }
}

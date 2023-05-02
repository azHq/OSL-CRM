<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ParameterController extends Controller
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            return view('parameters.index');
        }
        return view('layout.mainlayout');
    }
    public function list()
    {
        if (\request()->ajax()) {
            $parameters = Parameter::orderBy('created_at', 'desc')->get();

            return datatables()->of($parameters)
                ->addColumn('key', function ($row) {
                    return $row->key;
                })
                ->editColumn('type', function ($row) {
                    return $row->type;
                })
                ->editColumn('value', function ($row) {
                    return $row->value;
                })
                ->editColumn('component', function ($row) {
                    return $row->component;
                })
                ->addIndexColumn()
                ->rawColumns(['key', 'type', 'value', 'component'])
                ->make(true);
        }
    }
    public function store(Request $request)
    {
        try {
            Parameter::create($request->except('_token'));
            return Redirect::back()->with('success', 'Parameter created successfully.');
        } catch (\Exception $e) {
            Parameter::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}

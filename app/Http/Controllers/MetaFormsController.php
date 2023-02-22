<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MetaFormsController extends Controller
{
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

<?php

namespace App\Http\Controllers;

use App\Models\MetaForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MetaFormsController extends Controller
{
    public function store(Request $request)
    {
        try {
            MetaForm::create($request->except('_token'));
            return Redirect::back()->with('success', 'Parameter created successfully.');
        } catch (\Exception $e) {
            MetaForm::info($e->getMessage());
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}

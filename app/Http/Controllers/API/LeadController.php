<?php

namespace App\Http\Controllers\API;
use App\Models\Lead;
use App\Models\Student;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LeadController extends Controller
{
    public function AddNewLead(Request $request)
    {
        
        $result=Lead::create($request->all());
        return json_encode($request->all());
    }

    
}

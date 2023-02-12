<?php

namespace App\Helper;

use App\Models\Activity;
use App\Models\Reports;
use Illuminate\Support\Facades\Auth;

class NewReportEntry
{
    public static function create()
    {
        Reports::create([
//            'title' => '$activityName',
//            'details' => '$activityDetails',
//            'l' => Auth::user()->id,
        ]);
    }
}

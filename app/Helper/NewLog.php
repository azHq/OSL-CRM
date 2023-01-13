<?php

namespace App\Helper;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class NewLog
{
    public static function create($activityName, $activityDetails = '')
    {
        Activity::create([
            'name' => $activityName,
            'details' => $activityDetails,
            'user_id' => Auth::user()->id,
        ]);
    }
}

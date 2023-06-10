<?php

namespace App\Helper;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NewLog
{
    public static function create($activityName, $activityDetails = '')
    {
        $user_id=0;
        if(Auth::user()==null)
        {
            $user_id=User::get()->first()->id;
        }
        Activity::create([
            'name' => $activityName,
            'details' => $activityDetails,
            'user_id' => Auth::user()?Auth::user()->id:$user_id,
        ]);
    }
}

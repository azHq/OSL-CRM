<?php

namespace App\Helper;

use App\Models\Report;

class NewReportEntry
{
    public static function create($title,$details,$type,$lead_id,$counselor_id)
    {
        error_log($type.' '.$lead_id.' '.$counselor_id);
        try{
            Report::create([
                'title' => $title,
                'description' => $details,
                'type' => $type,
                'leads_id' => $lead_id,
                'counselor_id' => $counselor_id,
                'mechanism' => 'automatic',
                'time' => date('d-m-y h:i:s')
            ]);
        } catch (\Exception $err){
            dd($err->getMessage());
        }
    }
}

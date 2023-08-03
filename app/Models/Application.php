<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin'))
            //     $query->whereHas('student', function ($query) {
            //         $query->where('owner_id', Auth::user()->id);
            //     });
        });

        self::created(function ($application) {
            NewLog::create('New Application', 'Applied on behalf of student "' . $application->lead->name . '" for course-"' . $application->course . '" & university-"' . $application->university->name . '".');
        });

        self::updated(function ($application) {
            $updatedFields = '';
            foreach ($application->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key.',');
            }
            NewLog::create('Application Updated', 'Application updated for student "' . $application->lead->name . '". Changed fields are' . $updatedFields . '.');
        });

        self::deleted(function ($application) {
            NewLog::create('Application Deleted', 'Application deleted on behalf of student "' . $application->lead->name . '" for course-"' . $application->course . '" & university-"' . $application->university->name . '".');
        });
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}

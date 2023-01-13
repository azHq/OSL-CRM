<?php

namespace App\Models;

use App\Helper\NewLog;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            if (!Auth::user()->hasRole('super-admin'))
                $query->where('owner_id', Auth::user()->id);
        });

        self::updated(function ($student) {
            $updatedFields = '';
            foreach ($student->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key.',');
            }
            NewLog::create('Student Updated', 'Student "' . $student->name . '" has been updated. Changed fields are' . $updatedFields . '.');
        });

        self::deleted(function ($student) {
            NewLog::create('Student Deleted', 'Student "' . $student->name . '" has been deleted.');
        });
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function document()
    {
        return $this->hasOne(Document::class, 'student_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function getIntakeMonthYearAttribute()
    {
        if (!$this->intake_month || !$this->intake_year) return 'N/A';
        return DateTime::createFromFormat('!m', $this->intake_month)->format('F') . ' ' . $this->intake_year;
    }

    public function getUploadedDocumentsNoAttribute()
    {
        if (!$this->document) return 0;
        $uploaded = 0;
        foreach ($this->document->toArray() as $key => $value) {
            if ($key == 'id' || $key == 'student_id' || $key == 'created_at' || $key == 'updated_at') continue;
            if ($value && $value != '') $uploaded++;
        }
        return $uploaded;
    }
}

<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Lead extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            if (!Auth::user()->hasRole('super-admin'))
                $query->where('owner_id', Auth::user()->id);
        });

        self::creating(function ($lead) {
            $lead->creator_id = Auth::user()->id;
        });

        self::created(function ($lead) {
            NewLog::create('New Lead Added', 'A new lead "' . $lead->name . '" has been added.');
        });

        self::updated(function ($lead) {
            $updatedFields = '';
            foreach ($lead->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key.',');
            }
            NewLog::create('Lead Updated', 'Lead "' . $lead->name . '" has been updated. Changed fields are' . $updatedFields . '.');
        });

        self::deleted(function ($lead) {
            NewLog::create('Lead Deleted', 'Lead "' . $lead->name . '" has been deleted.');
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'lead_id');
    }

    public function scopePure($query)
    {
        return $query->doesntHave('student');
    }
}

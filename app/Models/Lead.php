<?php

namespace App\Models;

use App\Helper\NewLog;
use App\Helper\NewReportEntry;
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
            NewReportEntry::create('Lead Created','A new lead "' . $lead->name . '" has been created.', 'Lead_Creation', $lead->id, $lead->creator_id);
        });

        self::updated(function ($lead) {

            $updatedFields = '';
            foreach ($lead->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key . ',');
            }
            NewLog::create('Lead Updated', 'Lead "' . $lead->name . '" has been updated. Changed fields are' . $updatedFields . '.');
            NewReportEntry::create('Lead Created','Lead "' . $lead->name . '" has been updated. Changed fields are' . $updatedFields . '.', 'Lead_Update', $lead->id, $lead->creator_id);
        });

        self::deleted(function ($lead) {
            NewLog::create('Lead Deleted', 'Lead "' . $lead->name . '" has been deleted.');
            NewReportEntry::create('Lead Deleted', 'Lead "' . $lead->name . '" has been deleted.','Lead_Delete', $lead->id, $lead->creator_id);
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

    public function document()
    {
        return $this->hasOne(Document::class, 'lead_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
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

<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Document extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        parent::boot();

        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('super-admin')) {
            //     $query->whereHas('lead', function ($query) {
            //         $query->where('owner_id', Auth::user()->id);
            //     });
            // }
        });

        static::updated(function ($document) {
            if (
                $document->passport &&
                $document->academics &&
                $document->cv &&
                $document->moi &&
                $document->recommendation_2 &&
                $document->recommendation_1 &&
                $document->job_experience &&
                $document->sop &&
                $document->others
            ) {
                Lead::where('id', $document->lead_id)->update(['documents_pending' => false]);
            } else {
                Lead::where('id', $document->lead_id)->update(['documents_pending' => true]);
            }

            if (count($document->getDirty()) > 0) {
                $updatedFields = $document->getDirty()[0];
                NewLog::create('Document Uploaded', 'A New Document ' . $updatedFields . ' has been uploaded for lead "' . $document->lead->name . '".');
            }
        });
    }


    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}

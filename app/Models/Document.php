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
            if (!Auth::user()->hasRole('super-admin')) {
                $query->whereHas('student', function ($query) {
                    $query->where('owner_id', Auth::user()->id);
                });
            }
        });

        static::updated(function ($document) {
            if (
                $document->masters &&
                $document->bachelors &&
                $document->hsc &&
                $document->ssc &&
                $document->cv &&
                $document->passport &&
                $document->sop &&
                $document->recommendation_1 &&
                $document->recommendation_2
            ) {
                Student::where('id', $document->student_id)->update(['documents_pending' => false]);
            } else {
                Student::where('id', $document->student_id)->update(['documents_pending' => true]);
            }

            if (count($document->getDirty()) > 0) {
                $updatedFields = $document->getDirty()[0];
                NewLog::create('Document Uploaded', 'A New Document ' . $updatedFields . ' has been uploaded for student "' . $document->student->name . '".');
            }
        });
    }


    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}

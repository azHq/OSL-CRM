<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Remarks extends Model
{
    use HasFactory;
    protected $table = 'remarks';
    protected $fillable = [
        'value',
        'lead_id',
        'commented_by'
    ];
    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin'))
            // $query->where('owner_id', Auth::user()->id);
        });

        self::creating(function ($meta) {
            $meta->commented_by = Auth::user()->id;
        });
        self::created(function ($remark) {
            NewLog::create('Remarks Added', '"' . $remark->name . '" has been added.');
        });
        self::updated(function ($remark) {
            NewLog::create('Remarks Updated', '"' . $remark->name . '" has been updated.');
        });
        self::deleted(function ($remark) {
            NewLog::create('Remarks Deleted', 'Remarks "' . $remark->name . '" has been deleted.');
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'commented_by');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}

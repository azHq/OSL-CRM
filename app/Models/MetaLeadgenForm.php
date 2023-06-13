<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MetaLeadgenForm extends Model
{
    use HasFactory;
    protected $table = 'meta_leadgen_forms';
    protected $fillable = [
        'name',
        'lead_id',
        'mapped',
        'mapped_by'
    ];
    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('super-admin'))
                // $query->where('owner_id', Auth::user()->id);
        });

        self::creating(function ($meta) {
            $meta->mapped_by = Auth::user()->id;
        });
    }
}

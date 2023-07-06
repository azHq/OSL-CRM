<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Remarks extends Model
{
    use HasFactory;
    protected $table = 'remarks';
    protected $fillable = [
        'value',
        'commented_by'
    ];
    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('super-admin'))
                // $query->where('owner_id', Auth::user()->id);
        });

        self::creating(function ($meta) {
            $meta->commented_by = Auth::user()->id;
        });
    }
}

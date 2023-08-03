<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MetaCredential extends Model
{
    use HasFactory;
    protected $table = 'meta_credential';
    protected $fillable = [
        'app_id',
        'app_secret',
        'page_id',
        'page_token',
        'user_token',
        'updated_by'
    ];
    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin'))
                // $query->where('owner_id', Auth::user()->id);
        });

        self::creating(function ($meta) {
            $meta->updated_by = Auth::user()->id;
        });
    }
}

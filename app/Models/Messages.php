<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'message_by',
        'message_to',
        'type',
        'meta',
        'is_seen',
    ];
    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            // if (!Auth::user()->hasRole('main-super-admin') && !Auth::user()->hasRole('super-admin'))
                // $query->where('owner_id', Auth::user()->id);
        });

        self::creating(function ($message) {
            $message->message_by = Auth::user()->id;
        });
    }
}

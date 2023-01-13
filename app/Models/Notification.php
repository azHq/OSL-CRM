<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    use HasFactory;

    protected $appends = ['title', 'description', 'url'];

    public function user()
    {
        return $this->belongsTo(User::class, 'notifiable_id');
    }

    public function getTitleAttribute()
    {
        return $this->data['title'];
    }

    public function getDescriptionAttribute()
    {
        return $this->data['description'];
    }

    public function getUrlAttribute()
    {
        return $this->data['url'];
    }
}

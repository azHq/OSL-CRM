<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted()
    {
        self::creating(function ($model) {
            $model->slug = Str::slug($model->name, "-");
        });

        self::updating(function ($model) {
            $model->slug = Str::slug($model->name, "-");
        });
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

}

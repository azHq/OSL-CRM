<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::created(function ($university) {
            NewLog::create('New Univesity added', 'A university "' . $university->name . '" has been added.');
        });

        self::updated(function ($university) {
            $updatedFields = '';
            foreach ($university->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key . ',');
            }
            NewLog::create('Univesity Updated', 'Univesity "' . $university->name . '" has been updated. Changed fields are' . $updatedFields . '.');
        });

        self::deleted(function ($university) {
            NewLog::create('Univesity Deleted', 'Univesity "' . $university->name . '" has been deleted.');
        });
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}

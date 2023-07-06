<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        self::created(function ($country) {
            NewLog::create('New Univesity added', 'A university "' . $country->name . '" has been added.');
        });

        self::updated(function ($country) {
            $updatedFields = '';
            foreach ($country->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key . ',');
            }
            NewLog::create('Univesity Updated', 'Univesity "' . $country->name . '" has been updated. Changed fields are' . $updatedFields . '.');
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

<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'countries';

    public static function boot()
    {
        parent::boot();

        self::created(function ($country) {
            NewLog::create('New Country added', 'A university "' . $country->name . '" has been added.');
        });

        self::updated(function ($country) {
            $updatedFields = '';
            foreach ($country->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key . ',');
            }
            NewLog::create('Country Updated', 'Country "' . $country->name . '" has been updated. Changed fields are' . $updatedFields . '.');
        });

        self::deleted(function ($country) {
            NewLog::create('Country Deleted', 'Country "' . $country->name . '" has been deleted.');
        });
    }


}

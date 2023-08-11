<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class LeadsImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function model(array $row)
    {
        $country = Country::where('name', $row[11])->first();
        $owner = User::where('email', $row[10])->first();
        $passport = 0;
        if ($row[13] == 'yes' || $row[13] == 'Yes') {
            $passport = 1;
        }
        $ownerId = null;
        $countryId = null;
        if ($owner) {
            $ownerId = $owner->id;
        }
        if ($country) {
            $countryId = $country->id;
        }
        // if ((strlen($row[1]) < 3) || (!filter_var($row[2], FILTER_VALIDATE_EMAIL)) || (strlen($row[3]) < 7)) return null;
        return new Lead([
            'name' => $row[0],
            'email' => $row[2],
            'mobile' => $row[1],
            'insert_type' => $row[3],
            'status' => $row[4],
            'last_education' => $row[5],
            // 'completion_date' => $row[6],
            'english' => $row[7],
            'country' => $countryId,
            'owner_id' => $ownerId,
            'passport' => $passport,
            'address' => $row[12],
            'creator_id' => Auth::id()
        ]);

        // dd($row);

    }
}

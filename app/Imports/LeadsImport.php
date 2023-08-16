<?php

namespace App\Imports;

use App\Models\Country;
use App\Models\Lead;
use App\Models\Remarks;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    /**
     * @return int
     */
    public $headings = [];
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function data_stringify($data)
    {
        switch (gettype($data)) {
            case 'string':
                return '\'' . addcslashes($data, "'\\") . '\'';
            case 'boolean':
                return $data ? 'true' : 'false';
            case 'NULL':
                return 'null';
            case 'object':
            case 'array':
                $expressions = [];
                foreach ($data as $c_key => $c_value) {
                    $expressions[] = $this->data_stringify($c_value);
                }
                return gettype($data) === 'object' ?
                    '(object)[' . implode(', ', $expressions) . ']' :
                    implode(',', $expressions);
            default:
                return (string)$data;
        }
    }
    public function model(array $row)
    {
        if ($row[1] == 'phone_number') {
            $this->headings = $row;
            return null;
        }
        $findExistingLead = Lead::where('email', $row[2])->orWhere('mobile', $row[1])->first();
        if ($findExistingLead) {
            return null;
        }
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
        $temp_remarks_id = [];
        if (count($row) > 15) {
            foreach ($row as $index => $item) {
                if ($index > 14) {
                    $data = [
                        'value' => "'" . $this->headings[$index] . "'  '" .  $item . "'",
                        'commented_by' => Auth::id()
                    ];
                    $remarks = Remarks::create($data);
                    array_push($temp_remarks_id , $remarks->id);
                }
            }
        }
        // if ((strlen($row[1]) < 3) || (!filter_var($row[2], FILTER_VALIDATE_EMAIL)) || (strlen($row[3]) < 7)) return null;
        return new Lead([
            'name' => $row[0],
            'email' => $row[2],
            'mobile' => $row[1],
            'insert_type' => $row[3],
            'status' => $row[4],
            'last_education' => $row[5],
            'completion_date' => $row[6],
            'english' => $row[7],
            'country' => $countryId,
            'owner_id' => $ownerId,
            'passport' => $passport,
            'address' => $row[12],
            'desired_course' => $row[14],
            'temp_remarks_id' => $this->data_stringify($temp_remarks_id),
            'creator_id' => Auth::id()
        ]);

        // dd($row);

    }
}

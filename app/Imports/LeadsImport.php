<?php

namespace App\Imports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\ToModel;

class LeadsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ((strlen($row[1]) < 3) || (!filter_var($row[2], FILTER_VALIDATE_EMAIL)) || (strlen($row[3]) < 7)) return null;
        return new Lead([
            'name' => $row[1],
            'email' => $row[2],
            'mobile' => $row[3],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\CheckUser;
use Maatwebsite\Excel\Concerns\ToModel;

class CheckUserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CheckUser([
            'names'                 =>  $row[0],
            'registration_number'   =>  $row[1],
            'level'                 =>  $row[2],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Partner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PartnerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return Partner::updateOrCreate(
            ['name' => $row['nev']],
            [
                'tax'     => $row['adoszam'],
                'name'    => $row['nev'],
                'country' => $row['orszag'],
                'zip'     => $row['irsz'],
                'state'   => $row['varos'],
                'address' => $row['cim'],
            ]
        );
    }
}
<?php

namespace App\Imports;

use App\Models\BrandGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BrandGroupImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BrandGroup([
            //
            "name" => $row["name"],
        ]);
    }
}

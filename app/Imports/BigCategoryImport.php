<?php

namespace App\Imports;

use App\Models\BigCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BigCategoryImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!is_null($row["name"])) {
            return new BigCategory([
                "name" => $row["name"],
            ]);
        }
    }
}

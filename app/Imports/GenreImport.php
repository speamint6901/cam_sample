<?php

namespace App\Imports;

use App\Models\Genre;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GenreImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Genre([
            //
            "category_id" => $row["category_id"],
            "name" => $row["name"],
        ]);
    }
}

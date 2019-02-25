<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BigCategory extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    // gear has many
    public function categories() {
        return $this->hasMany('\App\Models\Category');
    }

    // セレクトボックス生成
    public function scopeSelectBox($query) {
        return $query->get()
                     ->pluck('name', 'id')
                     ->prepend("選択して下さい", "");
    }
}

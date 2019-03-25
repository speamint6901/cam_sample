<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrandGroup extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    // brand has many
    public function brands() {
        return $this->hasMany('\App\Models\Brand');
    }

    // セレクトボックス生成
    public function scopeSelectBox($query) {
        return $query->get()
                     ->pluck('name', 'id')
                     ->prepend("選択して下さい", "");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'big_category_id',
        'name',
    ];

    // big_category belongs to
    public function big_category() {
        return $this->belongsTo('\App\Models\BigCategory');
    }

    // genre has many
    public function genres() {
        return $this->hasMany('\App\Models\Genre');
    }

    // セレクトボックス生成
    public function scopeSelectBox($query) {
        return $query->get()
                     ->pluck('name', 'id')
                     ->prepend("選択して下さい", "");
    }
}

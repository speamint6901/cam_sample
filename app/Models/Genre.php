<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
    ];

    // category belongs to
    public function category() {
        return $this->belongsTo('\App\Models\Category');
    }

    // gear has many
    public function gears() {
        return $this->hasMany('\App\Models\Gear');
    }

    // セレクトボックス生成
    public function scopeSelectBox($query) {
        return $query->get()
                     ->pluck('name', 'id')
                     ->prepend("選択して下さい", "");
    }
}

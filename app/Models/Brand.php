<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'brand_group_id',
        'name_katakana',
    ];

    // brand_group belongs to
    public function brand() {
        return $this->belongsTo('\App\Models\BrandGroup');
    }

    // gear has many
    public function gears() {
        return $this->hasMany('\App\Models\Gear');
    }

    public static function alphaSelectbox() {
        return self::$alphbetGroup;
    }

    // セレクトボックス生成
    public function scopeSelectBox($query) {
        return $query->get()
                     ->pluck('name', 'id')
                     ->prepend("選択して下さい", "");
    }
}

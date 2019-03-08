<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gear extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'name',
        'brand_id',
        'genre_id',
        'discription',
        'gear_image',
        'site_url',
    ];

    // gear_profile has one
    public function profile() {
        return $this->hasOne('\App\Models\GearProfile');
    }

    // brand belongs to
    public function brand() {
        return $this->belongsTo('\App\Models\Brand');
    }

    // genre belongs to
    public function genre() {
        return $this->belongsTo('\App\Models\Genre');
    }

    // category belongs to many
    public function category() {
        return $this->belongsToMany('\App\Models\Category', 'category_has_gears');
    }

}

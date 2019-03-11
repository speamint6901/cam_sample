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


    /**
    * relations
    */

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


    /**
    * gear status relations
    */

    // have_user belongs to many
    public function have_user()
    {
        return $this->belongsToMany('App\Models\User')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                            'have_comment',
                        ])
                        ->wherePivot('type', 'have');
    }

    // want_user belongs to many
    public function want_user()
    {
        return $this->belongsToMany('App\Models\User')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                        ])
                        ->wherePivot('type', 'want');
    }

    // fav_user belongs to many
    public function fav_user()
    {
        return $this->belongsToMany('App\Models\User')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                        ])
                        ->wherePivot('type', 'fav');
    }

    // thander_user belongs to many
    public function thander_user()
    {
        return $this->belongsToMany('App\Models\User')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                            'point',
                        ])
                        ->wherePivot('type', 'thander');
    }

}

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
        'amazon_url',
        'yahoo_url',
        'rakuten_url',
        'amazon_img',
        'yahoo_img',
        'rakuten_img',
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
    public function have_users()
    {
        return $this->belongsToMany('App\Models\User', 'gear_users')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                            'have_comment',
                            'point',
                        ])
                        ->withTimestamps()
                        ->wherePivot('type', 'have');
    }

    // want_user belongs to many
    public function want_users()
    {
        return $this->belongsToMany('App\Models\User', 'gear_users')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                        ])
                        ->wherePivot('type', 'want');
    }

    // fav_user belongs to many
    public function fav_users()
    {
        return $this->belongsToMany('App\Models\User', 'gear_users')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                        ])
                        ->wherePivot('type', 'fav');
    }
}

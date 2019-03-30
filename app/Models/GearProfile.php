<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GearProfile extends Model 
{

    use SoftDeletes;

    protected $fillable = [
        'gear_id',
        'have_count',
        'want_count',
        'fav_count',
        'thander_avg',
    ];

    // gear belongs to
    public function gear() {
        return $this->belongsTo('\App\Models\Gear');
    }

    public function getAvgImageNameAttribute() {
        return str_replace('.', '-', $this->thander_avg);
    }
}

<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mail_verified_hash', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // gear belongs to many
    public function user_gears()
    {
        return $this->belongsToMany('App\Models\Gear', 'gear_users')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                            'have_comment',
                            'point',
                        ]);
    }

    // haves belongs to many
    public function have_gears()
    {
        return $this->belongsToMany('App\Models\Gear', 'gear_users')
                        ->using('App\Models\GearUser')
                        ->withPivot([
                            'type',
                            'have_comment',
                            'point',
                        ])
                        ->wherePivot('type', 'have');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }
}

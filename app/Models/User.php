<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
        'avatar',
        'role_id',
        'exp',
        'point',
        'status',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function socialAccounts(){
        return $this->hasMany('App\Models\SocialAccount');
    }

    public function devices(){
        return $this->hasMany('App\Models\Device');
    }

    public function follows(){
        return $this->hasMany('App\Models\Follow');
    }

    public function reports(){
        return $this->hasMany('App\Models\Report');
    }

    public function mangas()
    {
        return $this->belongsToMany('App\Models\Manga', 'follows');
    }
}

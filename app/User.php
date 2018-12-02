<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name','user_handle', 'l_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function Brands(){
    //     return $this->hasMany(Brand::class);
    // }
    // public function Claps(){
    //     return $this->hasMany(clap::class);
    // }
    // public function Claps(){
    //     return $this->hasMany(clap::class);
    // }
}

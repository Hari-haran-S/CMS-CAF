<?php

namespace App;

use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    // public function roles(){
    //     return $this->belongsToMany('App\Role');
    // }
    // public function hasAnyRoles($roles){
    //     return null !== $this->roles()->whereIn('name',$roles)->first();
    // }
    // public function hasAnyRole($role){
    //     return null !== $this->roles()->where('name',$role)->first();
    // }
}

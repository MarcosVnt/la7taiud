<?php

namespace App;

use App\Role;
use App\Publicidad;
use App\Establecimiento;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
//implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function publicidads() {

        return $this->hasMany(Publicidad::class);

    }

    public function establecimiento() {

        return $this->hasOne(Establecimiento::class);

    }


    public function role() {

        return $this->hasOne(Role::class);

    }


    
}

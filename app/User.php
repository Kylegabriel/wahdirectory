<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';

    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'birthdate', 'gender', 'role', 'is_admin', 
        'username', 'email', 'mobile_number', 'is_active',
        'designation'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function designations(){
      return $this->hasOne('App\UserRole','role_id','designation');
    }
}

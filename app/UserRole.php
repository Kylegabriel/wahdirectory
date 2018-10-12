<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table='user_role';

    public function user(){
    	$this->hasOne('App\User');
    }

    public function profile(){
    	$this->belongsTo('App\Profile');
    }
}

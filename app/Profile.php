<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    	protected $table = 'profiles';    

        protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'suffix_name',
        'gender',
        'role_id',
        'primary_contact',
        'secondary_contact',
        'email',
        'secondary_email',
        'username',
        'password',
        'birthdate',
        'datehired',
        'is_active',
        'sites',
        'philhealth',
        'tin',
        'sss',
        'pagibigmidno',
        'pagibigrtn',
        'mabuhaymilespal',
        'getgocebupac'
    ];

    public function designations(){
      return $this->hasOne('App\UserRole','id','role_id');
    }

    public function suffix(){
      return $this->hasOne('App\SuffixName','suffix_code','suffix_name');
    }
}

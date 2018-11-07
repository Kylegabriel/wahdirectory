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
        'dateendcontruct',
        'reasons',
        'is_active',
        'philhealth',
        'wahemployeenumber',
        'pgtemployeenumber',
        'metrobankaccount',
        'landbankaccount',
        'tin',
        'sss',
        'pagibigmidno',
        'pagibigrtn',
        'mabuhaymilespal',
        'getgocebupac',
        'user_id',
        'image',
        'mailing_address'
    ];

    public function user(){
      return $this->hasOne('App\User','id','user_id');
    } 

    public function designations(){
      return $this->hasOne('App\UserRole','id','role_id');
    }

    public function suffix(){
      return $this->hasOne('App\SuffixName','suffix_code','suffix_name');
    }

    public function reasondeactivation(){
      return $this->hasOne('App\ReasonDeactivation','id','reasons');
    }
}

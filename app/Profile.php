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
        'designation',
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
      return $this->belongsTo('App\UserRole','designation','role_id');
    }

    public function suffix(){
      return $this->belongsTo('App\SuffixName','suffix_name','suffix_code');
    }
}

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
        'getgocebupac',
        'region_code',
        'province_code',
        'muncity_code',
        'brgy_code',
        'user_id'
        // 'image_url'
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

    public function region(){
      return $this->hasOne('App\DemographicRegion','region_code','region_code');
    }

    public function province(){
      return $this->hasOne('App\DemographicProvince','province_code','province_code');
    }

    public function municipality(){
      return $this->hasOne('App\DemographicMunicipality','muncity_code','muncity_code');
    }

    public function barangay(){
      return $this->hasOne('App\DemographicBarangay','brgy_code','brgy_code');
    }
}

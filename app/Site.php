<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    protected $fillable = [
		'site_id',
		'region_code',
		'province_code',
		'muncity_code',
		'brgy_code',
		'last_name',
		'first_name',
		'middle_name',
		'suffix_name',
		'gender',
		'primary_contact',
		'secondary_contact',
		'email',
		'secondary_email',
		'birthdate',
		'is_active',
		'site',
		'status',
		'user_id'
    ];

      public function user(){
      return $this->hasOne('App\User','id','user_id');
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

	  public function designations(){
	    return $this->hasOne('App\SitesDesignation','id','site_id');
	  }

	  public function barangay(){
    	return $this->hasOne('App\DemographicBarangay','brgy_code','brgy_code');
      }

	  public function siteSuffix(){
      return $this->hasOne('App\SuffixName','suffix_name','suffix_code');
    }

}

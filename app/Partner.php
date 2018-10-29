<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
   	protected $table='partners';

	protected $fillable = [
		'org_id',
		'desig_id',
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
		'region_code',
    'province_code',
    'muncity_code',
    'brgy_code',
    'user_id'
	];


	  public function user(){
      return $this->hasOne('App\User','id','user_id');
    } 
    public function partnerOrganization(){
      return $this->hasOne('App\PartnerOrganization','id','org_id');
    }
    public function partnerSuffix(){
      return $this->hasOne('App\SuffixName','suffix_name','suffix_code');
    }
    public function region(){
      return $this->hasOne('App\DemographicRegion','region_code','region_code');
    }

    public function provinces(){
      return $this->hasOne('App\DemographicProvince','province_code','province_code');
    }

    public function municipality(){
      return $this->hasOne('App\DemographicMunicipality','muncity_code','muncity_code');
    }

    public function barangay(){
      return $this->hasOne('App\DemographicBarangay','brgy_code','brgy_code');
    }
    
}

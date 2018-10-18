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
		'province',
		'primary_contact',
		'secondary_contact',
		'email',
		'secondary_email',
		'birthdate',
		'is_active',
	];

	public function partnerDesignation(){
      return $this->hasOne('App\PartnerDesignation','id','desig_id');
    }
    public function partnerOrganization(){
      return $this->hasOne('App\PartnerOrganization','id','org_id');
    }
    public function partnerSuffix(){
      return $this->hasOne('App\SuffixName','suffix_name','suffix_code');
    }
        public function partnerProvince(){
      return $this->hasOne('App\DemographicProvince','province_code','province');
    }
    
}

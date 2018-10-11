<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'sites';

    protected $fillable = [
		'designation',
		'region_code',
		'province_code',
		'muncity_code',
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
		'status'
    ];

	  public function region(){
	    return $this->belongsTo('App\DemographicRegion','region_code','region_code');
	  }

	  public function province(){
	    return $this->belongsTo('App\DemographicProvince','province_code','province_code');
	  }

	  public function municipality(){
	    return $this->belongsTo('App\DemographicMunicipality','muncity_code','muncity_code');
	  }

	  public function designations(){
	    return $this->belongsTo('App\SitesDesignation','designation','sites_code');
	  }

	  public function siteSuffix(){
      return $this->belongsTo('App\SuffixName','suffix_name','suffix_code');
    }

}

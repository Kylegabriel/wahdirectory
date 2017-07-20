<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
   	protected $table='partners';

	protected $fillable = [
		'organization',
		'designation',
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
		'sites'
	];

	public function partnerDesignation(){
      return $this->belongsTo('App\PartnerDesignation','designation','designation_id');
    }
    public function partnerOrganization(){
      return $this->belongsTo('App\PartnerOrganization','organization','organization_id');
    }
    public function partnerSuffix(){
      return $this->belongsTo('App\SuffixName','suffix_name','suffix_code');
    }
}

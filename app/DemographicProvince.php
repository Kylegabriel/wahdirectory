<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemographicProvince extends Model
{
    
    protected $table='lib_province';

	protected $fillable = [
		'region_code',
		'province_code',
		'province_name'
	];

	public function site(){
	    return $this->hasOne('App\Site');
	}

	public function partner(){
        $this->hasOne('App\Partner');
    }
}

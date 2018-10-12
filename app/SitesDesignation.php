<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SitesDesignation extends Model
{
    protected $table = 'sites_designation';

    public function site(){
    	return $this->belongsTo('App\Site');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerDesignation extends Model
{
    protected $table = 'designations';

    public function partner(){
    	$this->belongsTo('App\Partner');
    }

    public function warmleads(){
    	$this->hasOne('App\WarmLeads');
    }
}

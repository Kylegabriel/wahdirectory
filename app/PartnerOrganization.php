<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerOrganization extends Model
{
    protected $table = 'organizations';

    public function partner(){
    	$this->hasOne('App\Partner');
    }

    public function warmleads(){
    	$this->hasOne('App\WarmLeads');
    }
}

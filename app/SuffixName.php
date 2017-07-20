<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuffixName extends Model
{
    protected $table = 'suffixes';

    public function partner(){
    	$this->hasOne('App\Partner');
    }

    public function user(){
    	$this->hasOne('App\User');
    }

    public function warmleads(){
    	$this->hasOne('App\WarmLeads');
    }
}

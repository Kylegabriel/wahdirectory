<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternSchool extends Model
{
    protected $table = 'school';

    protected $fillable = ['school'];

    public function interns(){
    	return $this->hasOne('App\Intern');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternCourse extends Model
{
    protected $table = 'course';

    protected $fillable = ['course'];

    public function interns(){
    	return $this->hasOne('App\Intern');
    }
}

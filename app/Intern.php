<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    protected $table = 'interns';

    protected $fillable = [
        'id',
        'last_name',
        'first_name',
        'middle_name',
        'course_id',
        'school_id',
        'primary_contact',
        'email',
        'date_start',
        'date_end'
    ];

    public function courses(){
    	return $this->belongsTo('App\InternCourse','course_id','id');
    }
    
    public function schools(){
    	return $this->belongsTo('App\InternSchool','school_id','id');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function internSuffix(){
      return $this->belongsTo('App\SuffixName','suffix_name','suffix_code');
    }
}

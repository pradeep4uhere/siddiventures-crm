<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $table ='jobs';


    public function Job() { 
         return $this->hasMany('App\Job', 'job_id', 'id'); 
    }


    public function JobSkill() { 
         return $this->hasMany('App\JobSkill', 'job_id', 'id')->with('Skill'); 
    }


    public function JobApplication() { 
         return $this->hasMany('App\JobApplication', 'job_id', 'id'); 
    }
    
}

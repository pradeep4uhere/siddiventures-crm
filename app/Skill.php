<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    protected $table ='skills';


    public function Job() { 
         return $this->hasMany('App\Job', 'job_id', 'id'); 
    }


    public function JobSkill() { 
         return $this->hasMany('App\JobSkill', 'skill_id', 'id'); 
    }
    
}

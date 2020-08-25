<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    //
    protected $table ='job_skills';


    public function Job() { 
       return $this->hasMany('App\Job', 'job_id', 'id')->with('Skill'); 
    }
    

    public function Skill() { 
         return $this->belongsTo('App\Skill', 'skill_id', 'id'); 
    }
}

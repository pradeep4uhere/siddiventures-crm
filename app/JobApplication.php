<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    //
    protected $table ='job_applications';

    public function Job(){  
         return $this->belongsTo('App\Job', 'job_id', 'id'); 
    }


    public function JobApplicationMessages() { 
         return $this->hasMany('App\JobApplicationMessages', 'job_application_id', 'id'); 
    }
}

<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class JobApplicationMessages extends Model
{
    //
    protected $table ='job_application_messages';

    public function Job() { 
         return $this->belongsTo('App\Job', 'job_id', 'id'); 
    }
}

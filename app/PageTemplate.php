<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTemplate extends Model
{
    //
    protected $table ='page_templates';


    public function Page() { 
        return $this->hasMany('App\Page', 'page_template_id', 'id'); 
    }
    
}

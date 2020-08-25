<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Page extends Model
{
    //
    protected $table ='pages';

    public function ParentMenu() { 
        return $this->hasOne('App\Menu', 'id', 'parent_menu_id'); 
    }

     public function PageTemplate() { 
        return $this->hasMany('App\PageTemplate', 'id', 'page_template_id'); 
    }

    public function ChildMenu() { 
        return $this->hasOne('App\Menu', 'id','menu_id'); 
    }
    public function PageContent() { 
        return $this->hasMany('App\PageContent', 'page_id','id')->with('PageContentImage')->orderBy('page_contents.order_no','asc'); 
    }

    public function PageContentLink() { 
        return $this->hasOne('App\PageContent', 'id','page_link_id'); 
    }
}

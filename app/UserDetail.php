<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class UserDetail extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address_line_1', 'user_id','state_id','city_id','country_id'
    ];



    public function User() {
         return $this->belongsTo('App\User', 'user_id', 'id' )->getCountry('Country');
    }



    public function Country() {
         return $this->belongsTo('App\Country', 'country_id', 'id' );
    }


   



}

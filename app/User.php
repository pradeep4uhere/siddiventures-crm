<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'first_name', 'last_name', 'email', 'password','mobile','role_id','per_mobile_monthly_limit'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function UserDetail() {
         return $this->hasOne('App\UserDetail', 'user_id', 'id' );
    }

    public function PaymentWallet() {
         return $this->hasOne('App\PaymentWallet', 'user_id', 'id' );
    }


    public function TransactionType() {
         return $this->belongsTo('App\TransactionType', 'transaction_type_id', 'id' );
    }


    public function AgentCommission() {
         return $this->hasOne('App\AgentCommission', 'user_id', 'id' )->with('TransactionType');
    }


    public function DS() {
         return $this->hasOne('App\User', 'id', 'parent_user_id' );
    }
}

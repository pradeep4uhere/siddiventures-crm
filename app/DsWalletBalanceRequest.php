<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;


class DsWalletBalanceRequest extends Model
{

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'requested_amount',
        'payment_date',
        'wallet_balance_in',
        'payment_mode_type_id',
        'depositer_name',
        'depositer_bank_name',
        'bank_location',
        'bank_branch_code',
        'company_bank_id',
        'sender_mobile_number',
        'sender_account_number',
        'neft_via_bank_id',
        'neft_transfer_date',
        'transaction_number',
        'remarks',
        'admin_remarks',
        'is_transfer_into_company_wallet',
        'transfer_transaction_no',
        'transfer_date_to_company',
        
    ];


    public function User() {
         return $this->hasOne('App\User', 'id', 'user_id' );
    }
}

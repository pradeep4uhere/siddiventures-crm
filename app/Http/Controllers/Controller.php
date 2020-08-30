<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getCreateDate(){
    	return date("Y-m-d H:i:s");
    }


    //Send Debit Message to Admin
    public function sendDebitMessageToAdmin($amount){

    }


    //Send Credit Message to Admin
    public function sendCreditMessageToDS($userId,$amount){

    }
}

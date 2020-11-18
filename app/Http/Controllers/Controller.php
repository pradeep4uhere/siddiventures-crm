<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\User;
use GuzzleHttp\Client;


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


    public function sendLoginDetails($userId){
        $userDetails = User::find($userId);
        $email = $userDetails['email'];
        $password_text  = $userDetails['password_text'];
        $mobile         = $userDetails['mobile'];
        $username       = "Siddhient";
        $key            = "2f67b0dccfXX";
        $mobileNumber   = $mobile;
        $message        = "You login credentials updated with new password. Email-".$email.' with Password-'.$password_text.'. Regards -'.env('APP_SIGN');
        $senderId       = "INFSIDDI";
        //return $randomid; 
        $url ="http://mobicomm.dove-sms.com//submitsms.jsp?user=".$username."&key=".$key."&mobile=+91".$mobileNumber."&message=".$message."&senderid=".$senderId."&accusage=1"; 
        if($this->sendSMS($url)){
            return true; 
        }
    }


    private function sendSMS($url){

        $client = new Client();
        $res = $client->request('GET', $url);
        $res->getStatusCode();
        $res->getHeader('content-type');
        $res->getBody();
        if($res->getStatusCode() == 200){
            return true;
        }
    }



}

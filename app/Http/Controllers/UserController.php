<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Config;
use App\Menu;
use Session;
use Storage;
use App\User;
use App\UserDetail;
use App\PaymentWallet;
class UserController extends Controller
{
    
    
    public function __construct() {
       $this->middleware('auth');
       
    }

    public function blank(Request $request){
        return view('blank');
    }



    public function allDSList(Request $request){
        $userDSList = User::with('PaymentWallet')->where('role_id','=',2)->Paginate(15);
        //dd($userDSList);
        return view('admin.User.userDSList',compact('userDSList'));

    }



    public function allROList(Request $request){
        $userROList = User::with('PaymentWallet')->where('role_id','=',3)->Paginate(15);
        //dd($userDSList);
        return view('admin.User.userROList',compact('userROList'));

    }





}

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
use App\DsWalletBalanceRequest;
class DsWalletBalanceRequestController extends Controller
{
    
    
    public function __construct() {
       $this->middleware('auth');
       
    }

    public function blank(Request $request){
        return view('blank');
    }



    public function allDSBalanceRequest(Request $request){
        $userDSList = DsWalletBalanceRequest::with('User')->orderBy('id','DESC')->Paginate(15);
        //dd($userDSList);
        return view('admin.BalanceRequest.DSList',compact('userDSList'));

    }



    public function allROBalanceRequest(Request $request){
         $userDSList = DsWalletBalanceRequest::with('User')->orderBy('id','DESC')->Paginate(15);
        //dd($userDSList);
        return view('admin.BalanceRequest.DSList',compact('userDSList'));

    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'mobile' => 'required|string|max:255|unique:users,id,'.$data['id'],
            'AgentCode' => 'required|string|max:255|unique:users',
        ]);
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorBalance(array $data)
    {
        return Validator::make($data, [
            'amount' => 'required|string|max:10',
        ]);
    }


    //Edit Distributor
    public function requestBalanceProcess(Request $request,$id){
        $DsWalletBalance =DsWalletBalanceRequest::with('User')->find($id);
        
        if ($request->isMethod('post')) {

            //dd($user);
            $validator = $this->validatorBalance($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
            }
            $id     = $request->get('id');
            $amount = $request->get('amount');
            $DsWalletBalance =DsWalletBalanceRequest::with('User')->find($id);
            //dd($request->all());
            if($amount<=$DsWalletBalance['requested_amount']){

            }else{
                $error = array("Amount should be less or equal to requested amount.");
                Session::flash('error', $error);
                return redirect()->route('requestprocess',['id'=>$id]);
            }

            $first_name     =   $request->get('first_name');
            $last_name      =   $request->get('last_name');
            $mobile         =   $request->get('mobile');
            $email          =   $request->get('email');
            $AgentCode      =   $request->get('AgentCode');
            $status         =   $request->get('status');
            

            $user['first_name']     =   $first_name;
            $user['last_name']      =   $last_name;
            $user['mobile']         =   $mobile;
            $user['email']          =   $email;
            $user['AgentCode']      =   $AgentCode;
            $user['status']         =   $status;
            try{
                $user->save();
                Session::flash('message', $first_name." updated successfully");
            }catch(Exception $e){
                Session::flash('message', 'User not Updated!');
            }
            return redirect()->route('requestprocess',['id'=>$id]);
        }

        
        return view('admin.BalanceRequest.pushBalance',array(
            'DsWalletBalance'=>$DsWalletBalance,
            'menuId'=>''
        ));

    }




    //Edit Distributor
    public function editRetailer(Request $request,$id){
        //All DS List
        $userDS =User::with('DS','UserDetail','PaymentWallet')->where('role_id','=',2)->where('status','=',1)->get();

        $user =User::with('DS','UserDetail','PaymentWallet')->find($id);

        if ($request->isMethod('post')) {

             //dd($user);
            $validator = $this->validator($request->all());

            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    //dd($error);
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
                    return redirect()->route('editro',['id'=>$id]);
            }

            $user =User::find($id);
            //dd($request->all());
            $first_name     =   $request->get('first_name');
            $last_name      =   $request->get('last_name');
            $mobile         =   $request->get('mobile');
            $email          =   $request->get('email');
            $AgentCode      =   $request->get('AgentCode');
            $status         =   $request->get('status');
            $parent_user_id =   $request->get('parent_user_id');
            

            $user['parent_user_id'] =   $parent_user_id;
            $user['first_name']     =   $first_name;
            $user['last_name']      =   $last_name;
            $user['mobile']         =   $mobile;
            $user['email']          =   $email;
            $user['AgentCode']      =   $AgentCode;
            $user['status']         =   $status;
            try{
                $user->save();
                Session::flash('message', $first_name." updated successfully");
            }catch(Exception $e){
                Session::flash('message', 'User not Updated!');
            }
            return redirect()->route('allrolist');
        }

        
        return view('admin.User.RO.edit',array(
            'user'=>$user,
            'DSList'=>$userDS,
            'menuId'=>"",

        ));

    }






}

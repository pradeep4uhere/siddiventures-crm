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
        $userDSList = DsWalletBalanceRequest::with('User')->Paginate(15);
        //dd($userDSList);
        return view('admin.BalanceRequest.DSList',compact('userDSList'));

    }



    public function allROBalanceRequest(Request $request){
        $userROList = User::with('DS','UserDetail','PaymentWallet')->where('role_id','=',3)->Paginate(15);
        //dd($userDSList);
        return view('admin.User.userROList',compact('userROList'));

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


    //Edit Distributor
    public function editDistributor(Request $request,$id){
        $user =User::with('UserDetail','PaymentWallet')->find($id);
        
        if ($request->isMethod('post')) {

            //dd($user);
            $validator = $this->validator($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
            }
            
            $user =User::find($id);
            //dd($request->all());
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
            return redirect()->route('alldslist');
        }

        
        return view('admin.User.DS.edit',array(
            'user'=>$user,
            'menuId'=>"",

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

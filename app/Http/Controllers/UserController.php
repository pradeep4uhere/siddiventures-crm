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
use App\City;
use App\DocumentType;
use Hash;
class UserController extends Controller
{
    
    
    public function __construct() {
       $this->middleware('auth');
       
    }

    public function blank(Request $request){
        return view('blank');
    }



    public function allDSList(Request $request){
        $userDSList = User::with('UserDetail','PaymentWallet')->where('role_id','=',2)->Paginate(15);
        //dd($userDSList);
        return view('admin.User.userDSList',compact('userDSList'));

    }



    public function allROList(Request $request){
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
            'mobile'                    => 'required|string|max:255|unique:users,id,'.$data['id'],
            'email'                     => 'required|string|max:255|unique:users,id,'.$data['id'],
            'AgentCode'                 => 'required',
            'per_mobile_monthly_limit'  => 'required',
        ]);
    }


    //Edit Distributor
    public function editDistributor(Request $request,$id){
        $user =User::with('UserDetail','PaymentWallet')->find($id);
        $document_types = DocumentType::where('status','=',1)->get();
       
       
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

            //check if this Agent Code is Present
            $agentCodeUser = User::where('AgentCode','=',$request->get('AgentCode'))->where('id','!=',$id)->get();
            if($agentCodeUser->count()>0){
                $error= "Agent Code Already Present.";
                Session::flash('error', $error);
                return redirect()->route('editds',['id'=>$id])->with('Agent Code Already Present.');
            }    
            $user =User::with('UserDetail','PaymentWallet')->find($id);
            
            //dd($request->all());
            $first_name     =   $request->get('first_name');
            $last_name      =   $request->get('last_name');
            $mobile         =   $request->get('mobile');
            $email          =   $request->get('email');
            $AgentCode      =   $request->get('AgentCode');
            $status         =   $request->get('status');
            $perMonthlyLimit=   $request->get('per_mobile_monthly_limit');
            $password       =   $request->get('password');
            $role_id        =   $request->get('role_id');
            $confirm_password=  $request->get('confirm_password');
            $DMT             =  $request->get('DMT');
            $notification    =  $request->get('notification');

            if($password!=''){
                if($password == $confirm_password){
                     $user['password']      =   Hash::make($password);
                     $user['password_text'] =   $password;

                }else{
                    Session::flash('message', 'Password did not matched!');
                }    
            }
            

            $user['first_name']                 =   $first_name;
            $user['last_name']                  =   $last_name;
            $user['mobile']                     =   $mobile;
            $user['email']                      =   $email;
            $user['AgentCode']                  =   $AgentCode;
            $user['per_mobile_monthly_limit']   =   $perMonthlyLimit;
            $user['role_id']                    =   $role_id;
            $user['status']                     =   $status;
            $user['DMT']                        =   $DMT;
            $user['notification']               =   $notification;
            //dd($user);
            try{
                $user->save();
                if($password!=''){
                    if($password == $confirm_password){
                        $this->sendLoginDetails($id);
                    }
                }
                $this->saveUserDetails($request, $user->id);
                Session::flash('message', $first_name." updated successfully");
            }catch(Exception $e){
                Session::flash('message', 'User not Updated!');
            }
            return redirect()->route('alldslist');
        }
        //dd($user);
        
        return view('admin.User.DS.edit',array(
            'user'          =>  $user,
            'menuId'        =>  "",
            'document_types'=>  $document_types

        ));

    }



    private function saveUserDetails(Request $request, $user_id){
        $userDetails = UserDetail::where('user_id','=',$user_id)->first();
        if(!empty($userDetails)){
            $userDetails['date_of_birth']    =   date('Y-m-d',strtotime($request->get('date_of_birth')));
            $userDetails['address_line_1']   =   $request->get('address_line_1');
            $userDetails['address_line_2']   =   $request->get('address_line_2');
            $userDetails['district']         =   $request->get('district');
            $userDetails['city_id']          =   $request->get('city_id');
            $userDetails['pincode']          =   $request->get('pincode');
            $userDetails['state_id']         =   $request->get('state_id');
            $userDetails['company_type']     =   $request->get('company_type');
            $userDetails['company_name']     =   $request->get('company_name');
            $userDetails['service_by']       =   $request->get('service_by');
            $userDetails['zone']             =   $request->get('zone');
            $userDetails['identification_type']=   $request->get('identification_type');
            $userDetails['is_name_on_pan_card']=   $request->get('is_name_on_pan_card');
            $userDetails['pan_card_number']=   $request->get('pan_card_number');
            if($userDetails->save()){
                return true;
            }
        }
    }


    //Edit Distributor
    public function editRetailer(Request $request,$id){
        //All DS List
        $userDS =User::with('DS','UserDetail','PaymentWallet')->where('role_id','=',2)->where('status','=',1)->get();

        $user =User::with('DS','UserDetail','PaymentWallet')->find($id);

        if ($request->isMethod('post')) {

             //dd($user);
            //dd($request->all());
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
            $perMonthlyLimit=   $request->get('per_mobile_monthly_limit');

            $password       =   $request->get('password');
            $role_id        =   $request->get('role_id');
            $confirm_password=  $request->get('confirm_password');
            $DMT             =  $request->get('DMT');
            $notification    =  $request->get('notification');
            if($password!=''){
                if($password == $confirm_password){
                     $user['password']      =   Hash::make($password);
                     $user['password_text'] =   $password;

                }else{
                    Session::flash('message', 'Password did not matched!');
                }    
            }
            

            $user['parent_user_id']         =   $parent_user_id;
            $user['first_name']             =   $first_name;
            $user['last_name']              =   $last_name;
            $user['mobile']                 =   $mobile;
            $user['email']                  =   $email;
            $user['role_id']                =   $role_id;
            $user['AgentCode']              =   $AgentCode;
            $user['per_mobile_monthly_limit']      =   $perMonthlyLimit;
            $user['status']                 =   $status;
            $user['DMT']                    =   $DMT;
            $user['notification']           =   $notification;
            try{
                $user->save();
                if($password!=''){
                    if($password == $confirm_password){
                        $this->sendLoginDetails($id);
                    }
                }
                $this->saveUserDetails($request, $user->id);
                Session::flash('message', "Retailer ".$first_name." updated successfully");
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

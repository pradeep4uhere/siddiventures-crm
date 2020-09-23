<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Config;
use App\Menu;
use Session;
use Storage;
use App\User;
use App\UserDetail;
use App\PaymentWallet;
use App\DsWalletBalanceRequest;
use App\PaymentWalletTransaction;
use DB;
use Auth;
class DsWalletBalanceRequestController extends Controller
{
    
    
    public function __construct() {
       $this->middleware('auth');
       
    }

    public function blank(Request $request){
        return view('blank');
    }



    public function allDSBalanceRequest(Request $request){
        $userDSList = DsWalletBalanceRequest::with('PaymentWalletTransaction','User')->orderBy('id','DESC')->Paginate(15);
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




 /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatorTransferBalanceAmount(array $data)
    {
        return Validator::make($data, [
            'amount' => 'required|string|max:10',
        ]);
    }


    //Edit Distributor
    public function requestBalanceProcess(Request $request,$id){
        $DsWalletBalance =DsWalletBalanceRequest::with('PaymentWalletTransaction','User')->find($id);
        $userId     = $DsWalletBalance['user_id'];
        $finalArr   = array();
        
        if ($request->isMethod('post')) {

            $validator = $this->validatorBalance($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
            }

            

            //IF Status if not Suucess
            $status  = $request->get('status');
            $id      = $request->get('id');
            $amount  = $request->get('amount');
            $remarks = $request->get('remarks');
            $DsWalletBalance =DsWalletBalanceRequest::where('status','!=','Success')
                                ->where('is_transfer_into_company_wallet','=',0)
                                ->where('payment_wallet_transaction_id','=',0)
                                ->with('User')
                                ->find($id);
            //dd($DsWalletBalance);
            if($status!='Success'){
                 $DsWalletBalance->status     = $status;
                 if($DsWalletBalance->save()){
                    $error = "Payment Request Status Update Successfully.";
                    Session::flash('success', $error);
                    return redirect()->route('requestprocess',['id'=>$id]);
                 }
            }
            //dd($DsWalletBalance);
            if(!empty($DsWalletBalance)){
                if($amount<=$DsWalletBalance['requested_amount']){

                //Transfer Amount Into Company Wallet
                $PaymentWalletTransaction = new PaymentWalletTransaction();
                $PaymentWalletTransaction['payment_wallet_id'] = 1;
                $PaymentWalletTransaction['debit_amount']      = '0.00';
                $PaymentWalletTransaction['credit_amount']     = $amount;
                $PaymentWalletTransaction['transaction_number']= time();
                $PaymentWalletTransaction['transaction_date']  = $this->getCreateDate();
                $PaymentWalletTransaction['user_id']           = $userId;
                $PaymentWalletTransaction['status']            = 'Success';
                $PaymentWalletTransaction['remarks']           = $remarks;
                $PaymentWalletTransaction['created_at']        = $this->getCreateDate();
                if($PaymentWalletTransaction->save()){
                    //Change the Status of the Requested Row
                    $DsWalletBalanceRequestObj =  DsWalletBalanceRequest::find($id);
                    $transactionNumber  = time().$PaymentWalletTransaction->id;

                    $DsWalletBalanceRequestObj->status          = 'Success';
                    $DsWalletBalanceRequestObj->admin_remarks   = $remarks;
                    $DsWalletBalanceRequestObj->is_transfer_into_company_wallet = '1';
                    $DsWalletBalanceRequestObj->transfer_transaction_no = $transactionNumber;
                    $DsWalletBalanceRequestObj->transfer_date_to_company    = $this->getCreateDate();
                    $DsWalletBalanceRequestObj->payment_wallet_transaction_id = $PaymentWalletTransaction->id;
                    if($DsWalletBalanceRequestObj->save()){
                            if($this->updateCreditWalletBalance($amount)){
                                $error = Helper::getAmount($amount)." Amount Credited Into Company wallet Successfully.";
                                Session::flash('success', $error);
                                $finalArr = array();
                                $finalArr['Amount'] = Helper::getAmount($amount);
                                $finalArr['TransactionNo'] = $transactionNumber;
                                $finalArr['Status']     = "Success";

                                return redirect()->route('requestprocess',['id'=>$id]);
                            }else{
                                $error = array("Wallet amount not updated, Please try again later.");
                                Session::flash('error', $error);
                                return redirect()->route('requestprocess',['id'=>$id]);
                            }
                    }else{
                        $error = array("Request Rows not Updated, Please try again later.");
                        Session::flash('error', $error);
                        return redirect()->route('requestprocess',['id'=>$id]);
                    }

                }else{
                    $error = array("Amount not transfer to company wallet, Please try again later.");
                    Session::flash('error', $error);
                    return redirect()->route('requestprocess',['id'=>$id]);
                }
                }else{
                    $error = array("Amount should be less or equal to requested amount.");
                    Session::flash('error', $error);
                    return redirect()->route('requestprocess',['id'=>$id]);
                }
                
            }else{
                Session::flash('message', 'Somthing Went Wrong, Please try after sometime!');
                return redirect()->route('requestprocess',['id'=>$id]);
            }
        }
        //$DsWalletBalance =DsWalletBalanceRequest::with('User')->find($id);
        //dd($DsWalletBalance);
        
        return view('admin.BalanceRequest.pushBalance',array(
            'DsWalletBalance'=>$DsWalletBalance,
            'menuId'=>'',
            //'finalArr'=>$finalArr
        ));

    }


    //Push Balacne to DS Wallet After approval Of Requested Balance
    public function PushBalanceTODS(Request $request, $id){
         $DsWalletBalance =DsWalletBalanceRequest::with('DSPaymentWalletTransaction','PaymentWalletTransaction','User')->find($id);
           //dd($DsWalletBalance);
           $dsUserId = $DsWalletBalance['user_id'];
           $userDSDetails = User::find($dsUserId);

           //dd($userDSDetails);
           if ($request->isMethod('post')) {
            $amount  = $request->get('amount');
            $remarks = $request->get('remarks');

            //Get the Balance Of the Wallet
            $walletBalance = Helper::getWalletBalance();
            if($walletBalance < $amount){
                $error = array("You don't have sufficent balacne.");
                Session::flash('error', $error);
                return redirect()->route('pushbalancetods',['id'=>$id]);
            }

            $validator = $this->validatorTransferBalanceAmount($request->all());
            if($validator->fails()) {
                    $error=$validator->errors()->all();
                    Session::flash('error', $error);
                    foreach($request->all() as $k=>$value){
                        Session::flash($k, $request->get($k));
                    }
                    return redirect()->route('pushbalancetods',['id'=>$id]);
            }

            $requestedAmount          = $DsWalletBalance['requested_amount'];
            $dsWalletBalanceRequestId = $DsWalletBalance['id'];
            if($amount<=$requestedAmount){
                DB::beginTransaction();
                try {
                        $payment_wallet_id = Helper::getPaymentWalletId();
                        $PaymentWalletTransactionObj            = new PaymentWalletTransaction();
                        $PaymentWalletTransactionObj['user_id']             = Auth::user()->id;
                        $PaymentWalletTransactionObj['payment_wallet_id']   = $payment_wallet_id;
                        $PaymentWalletTransactionObj['debit_amount']        = $amount;
                        $PaymentWalletTransactionObj['credit_amount']       = '0.00';
                        $PaymentWalletTransactionObj['transaction_number']  = time();
                        $PaymentWalletTransactionObj['transaction_date']    = $this->getCreateDate();
                        $PaymentWalletTransactionObj['status']              = 'Success';
                        $PaymentWalletTransactionObj['ds_wallet_balance_request_id']=$dsWalletBalanceRequestId;
                        $PaymentWalletTransactionObj['remarks']             = $remarks;
                        //dd($PaymentWalletTransactionObj);
                        if($PaymentWalletTransactionObj->save()){
                            //Update Wallet of the Admin
                            //Debit Amount From the wallet for Admin
                            $PaymentWalletObj = PaymentWallet::find($payment_wallet_id);
                            $PaymentWalletObj->total_balance = $PaymentWalletObj->total_balance - $amount;
                            if($PaymentWalletObj->save()){
                                //Send SMS To Admin Register Mobile Number
                                $this->sendDebitMessageToAdmin($amount); 
                            } 

                            //Save Credit Amount Into DS Wallet
                            $distributor_user_id = $userDSDetails['id']; 
                            $ds_payment_wallet_id   = Helper::getPaymentWalletIdOfUser($distributor_user_id);
                            $ds_wallet_balance_request_id = $DsWalletBalance['ds_wallet_balance_request_id'];

                            $PaymentWalletTransObj            = new PaymentWalletTransaction();
                            $PaymentWalletTransObj['user_id']             = Auth::user()->id;
                            $PaymentWalletTransObj['payment_wallet_id']   = $ds_payment_wallet_id;
                            $PaymentWalletTransObj['debit_amount']        = '0.00';
                            $PaymentWalletTransObj['credit_amount']       = $amount;
                            $PaymentWalletTransObj['transaction_number']  = time();
                            $PaymentWalletTransObj['transaction_date']    = $this->getCreateDate();
                            $PaymentWalletTransObj['status']              = 'Success';
                            $PaymentWalletTransObj['ds_wallet_balance_request_id']=$dsWalletBalanceRequestId;
                            $PaymentWalletTransObj['remarks']             = $remarks;
                            $PaymentWalletTransObj['created_at']          = $this->getCreateDate();
                            //dd($PaymentWalletTransObj);
                            if($PaymentWalletTransObj->save()){
                                $DSPaymentWalletObj = PaymentWallet::find($ds_payment_wallet_id);
                                $DSPaymentWalletObj->total_balance=$DSPaymentWalletObj->total_balance + $amount;
                                if($DSPaymentWalletObj->save()){
                                    //Send SMS To Admin Register Mobile Number
                                    $this->sendCreditMessageToDS($distributor_user_id,$amount);
                                } 
                            }
                        }
                        DB::commit();
                        $AgentCode =  $userDSDetails['AgentCode'];
                        $error = "Amount Successfully Transfer To ".$AgentCode;
                        Session::flash('success', $error);
                        return redirect()->route('pushbalancetods',['id'=>$id]);
                } catch (\Exception $ex) {
                    DB::rollback();
                    $error = array("Somthing Went Wrong, Please try after later.");
                    $error = array($ex->getMessage());
                    Session::flash('error', $error);
                    return redirect()->route('pushbalancetods',['id'=>$id]);

                }
                

            }else{
                 $error = array("Amount should be less and equal to requested amount, Please try again later.");
                 Session::flash('error', $error);
                 return redirect()->route('pushbalancetods',['id'=>$id]);
            }

           
          }
          return view('admin.BalanceRequest.pushBalanceToDS',array(
            'DsWalletBalance'=>$DsWalletBalance,
            'menuId'=>'',
            //'finalArr'=>$finalArr
        ));
    }

    //Add Wallet Balance 
    private function updateCreditWalletBalance($amount){
            //Find the WalletId
            $payment_wallet_id = Helper::getPaymentWalletId();
            $PaymentWalletObj  = PaymentWallet::find($payment_wallet_id);
            $PaymentWalletObj->total_balance = $PaymentWalletObj->total_balance + $amount;
            if($PaymentWalletObj->save()){
                return true;
            }else{
                return false;
            }
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

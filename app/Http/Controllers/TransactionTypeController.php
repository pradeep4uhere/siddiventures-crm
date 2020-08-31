<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;
use Config;
use Session;
use App\TransactionType;
use App\AgentCommission;
use App\User;

class TransactionTypeController extends Controller
{
    

    public function __construct() {
       
    }

 public function getCreateDate(){
        return date("Y-m-d H:i:s");
    }


    public function editUserCommission(Request $request,$id){
        $user = User::find($id);
        if ($request->isMethod('post')) {
            //dd($request->all());
            $data = $request->all();
            $count = count($data['transaction_type_code']);
       
            $AgentCommissionArr = array();
            AgentCommission::where('user_id','=',$id)->delete();
            for($i=0;$i<$count;$i++){
              $AgentCommissionArr =   new  AgentCommission();
              $AgentCommissionArr["transaction_type_id"] =    $data['ids'][$i];
              $AgentCommissionArr["user_id"]     =   $user['id'];
              $AgentCommissionArr["role_id" ]    =   $user['role_id'];
              $AgentCommissionArr["commission"]  =   $data['value'][$i];
              $AgentCommissionArr["status"]      =   1;
              $AgentCommissionArr["created_at"]  =   date("Y-m-d H:i:s");
              $AgentCommissionArr->save();
            
            }
            Session::flash('message', 'User Commission Types List Updated Successfully!');
            return redirect()->route('usercommission');
        }
        $transactionTypesList = TransactionType::where('status','=',1)->get();
        $agentCommission = AgentCommission::with('User','TransactionType')
                ->where('user_id','=',$id)
                ->get();

        //dd($agentCommission);


         $agetCommissionArr = array();
         foreach($transactionTypesList as $item){
            $agetCommissionArr[$item['transaction_type_id']] = AgentCommission::with('TransactionType')
            ->where('user_id','=',$id)
            ->where('transaction_type_id','=',$item['id'])
            ->first();
        }
        //dd($agetCommissionArr);
        return view('admin.TransactionTypes.editUserCommission',compact('transactionTypesList','agentCommission','user'));
    }


    public function userCommissionSetting(Request $request){
        $userList = User::where('id','!=',1)->get();
        $transactionTypesList = TransactionType::where('status','=',1)->get();
        $agetCommission = array();
        foreach($userList as $userItem){ 
            foreach($transactionTypesList as $item){
                $agetCommission[$userItem['id']][] = AgentCommission::with('TransactionType')
                ->where('user_id','=',$userItem['id'])
                ->where('transaction_type_id','=',$item['id'])
                ->first();
            }
        }
        //dd($agetCommission);
        return view('admin.TransactionTypes.UserCommissionSetting',compact('userList','transactionTypesList','agetCommission'));
    }



    public function transactionTypesList(Request $request){
        $setting = TransactionType::all();
        //dd($setting);
        return view('admin.TransactionTypes.TypesList',compact('setting'));
    }


    public function saveTransactionTypesList(Request $request){
        $data = $request->all();
        $count = count($data['transaction_type_code']);
        $TransactionTypes = array();

        for($i=0;$i<$count;$i++){
            $TransactionTypes[]=array(
                "transaction_type_code"=>$data['transaction_type_code'][$i],
                "ids"=>$data['ids'][$i],
                "commission_type"=>$data['commission_type'][$i],
                "value"=>$data['value'][$i],
            );
            $TransactionTypeObj = TransactionType::find($data['ids'][$i]);
            $TransactionTypeObj->transaction_type_code = $data['transaction_type_code'][$i];
            $TransactionTypeObj->commission_type       = $data['commission_type'][$i];
            $TransactionTypeObj->value                 = $data['value'][$i];
            $TransactionTypeObj->save();
        }
        Session::flash('message', 'Transaction Types List Updated Successfully!');
        return redirect()->route('transactiontypes');
    }


}

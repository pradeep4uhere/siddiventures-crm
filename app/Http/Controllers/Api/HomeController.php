<?php
namespace App\Http\Controllers\Api;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Page;
use Mail;
use App\Job; 
use App\JobSkill;
use App\JobApplication;
use App\Setting;
use App\Contactus;
use App\WhenStart;
use App\JobApplicationMessages;


class HomeController extends Controller
{

    //method for reply from Candidate for Job application
    public function replyOnApplicationByCandidate(Request $request){
        $filename=$request->file('myFile');

        //echo "<pre>->";
        //print_r($filename);

        $formData=json_decode($request->input('data')); 
	//$formData=$request->all(); 
       	//echo "<pre>";
	//print_r($formData);
	$inputData = array();
	$inputData['job_id']  =  $formData->job_id;
	$inputData['message'] = $formData->message;
	$inputData['jobID']   = $formData->jobID;
	$inputData['job_application_id'] = $formData->job_application_id;
	$inputData['message']= $formData->message;

	$responseArray['status'] = true;
        $responseArray['message'] = "Somthing went wrong.";
    
      //  $formData = $request->all();
        if(!empty($inputData)){
            //echo "<pre>";
            //print_r($formData);
            $job_id      	= $inputData['job_id'];
            $jobID              = decrypt($inputData['jobID']);
            $job_application_id = decrypt($inputData['job_application_id']);

            //Get Details Of the Job Application
            $jobApplicationDetails = JobApplication::find($job_application_id);
            //print_r($jobApplicationDetails);


            //Get Details of Job
            $jobDetails = Job::find($job_id);
            //print_r($jobDetails);


            $reply_message  = $inputData['message'];

            $mobile         = $jobApplicationDetails['mobile'];
            $email_address  = $jobApplicationDetails['email_address'];
            $first_name     = $jobApplicationDetails['first_name'];
            $last_name      = $jobApplicationDetails['last_name'];
            $full_name      = $first_name.' '.$last_name;

            $admin_email_address  =$this->getSettingValue('job_application_email');
            $job_application_reply=$this->getSettingValue('job_application_reply');
            $admin_name           =$this->getSettingValue('job_application_sign');
            $admin_greetings_name =$this->getSettingValue('job_application_greetings');
            
            $message_to         = 'ADMIN'; 
            $message_from       = 'USER'; 



            //Save Data into Table
            $JobApplicationMessages = new JobApplicationMessages();
            $JobApplicationMessages['job_id']               = $job_id;
            $JobApplicationMessages['job_application_id']   = $job_application_id;
            $JobApplicationMessages['email_address']        = $email_address;
            $JobApplicationMessages['name']                 = $full_name;

            $JobApplicationMessages['from_email_address']   = $admin_email_address;
            $JobApplicationMessages['from_name']            = $admin_name;
            $JobApplicationMessages['message']              = $reply_message;
            $JobApplicationMessages['message_to']           = $message_to;
            $JobApplicationMessages['message_from']         = $message_from;
            


            //Save Resume
            if(!empty($request->file('myFile'))){
                $file = $request->file('myFile');
                $fileName = $file->getClientOriginalName();
                $JobApplicationMessages['fileattachment']         = $fileName;
                $destinationPath        =   'storage/uploads/resume';
                $file->move($destinationPath,$file->getClientOriginalName());
            }

            if($JobApplicationMessages->save()){ 
                if($JobApplicationMessages->id >0){
                    $JobApplicationMessagesData['job_id']               = $job_id;
                    $JobApplicationMessagesData['job_application_id']   = $job_application_id;
                    $JobApplicationMessagesData['email_address']        = $email_address;
                    $JobApplicationMessagesData['name']                 = $full_name;
                    $JobApplicationMessagesData['from_email_address']   = $admin_email_address;
                    $JobApplicationMessagesData['from_name']            = $admin_name;
                    $JobApplicationMessagesData['message']              = $reply_message;
                    $JobApplicationMessagesData['message_to']           = $message_to;
                    $JobApplicationMessagesData['message_from']         = $message_from;
                    $this->sendEmailToAdminForJobApplication($JobApplicationMessagesData);
                    $responseArray['status'] = true;
                    $responseArray['message'] = "Message Sent Successfully.";
                }else{
                    $responseArray['status'] = false;
                    $responseArray['message'] = "Message not Processed.";
                }
            }else{
                $responseArray['status'] = false;
                $responseArray['message'] = "Message not sent, Please try after sometime.";
            }
        }
        return response()->json($responseArray);
    }






    //Send Email to admin from the user On JOB Application
    public function sendEmailToAdminForJobApplication($FromData){
        $job_application_email      =$this->getSettingValue('job_application_email');
        $job_application_reply      =$this->getSettingValue('job_application_reply');
        $job_application_sign       =$this->getSettingValue('job_application_sign');
        $job_application_greetings  =$this->getSettingValue('job_application_greetings');
        $address_number_1           =$this->getSettingValue('address_number_1');
        $office_number              =$this->getSettingValue('office_number');
        $contact_mobile             =$this->getSettingValue('contact_mobile');


        $job_application_reply  = $job_application_reply;
        $to_admin_email_address = $job_application_email;
        $admin_name             = $job_application_sign;


        $admin_email_address= $job_application_reply;
        $to_email_address   = $job_application_email;
        $username           = $FromData['name'];
        $reply_message      = $FromData['message'];
        $job_id             = $FromData['job_id'];
        $job_application_id = $FromData['job_application_id'];
        $body_message       = "You have new meesage as below,";

        $enJobId            = encrypt($job_id);
        $enjobApplicationId = encrypt($job_application_id);


        //Footer
        $logo = env('FRONT_URL').'/images/footer-logo.png';
        $fb   = env('FRONT_URL').'/images/fb.png';
        $ln   = env('FRONT_URL').'/images/in.png';
        $gp   = env('FRONT_URL').'/images/g+.png';
        $reply_url = env('FRONT_URL').'replyadmin/'.$enJobId.'/'.$enjobApplicationId.'/'.$job_id;
        $data = array(
            'site_url'          =>env('APP_URL'),
            'logo'              =>  $logo,
            'fb'                =>  $fb,
            'ln'                =>  $ln,
            'gp'                =>  $gp,
            'address_number_1'  =>  $address_number_1,
            'office_number'     =>  $office_number,
            'contact_mobile'    =>  $contact_mobile,
            'user_email'        =>  $to_email_address,
            'user_name'         =>  ucwords($job_application_greetings),
            'admin_email'       =>  $admin_email_address,
            'admin_name'        =>  $admin_name,
            'reply_message'     =>  $reply_message,
            'body_message'      =>  $body_message,
            'to_admin_email_address'=>$to_admin_email_address,

            'reply_url' =>$reply_url
        );

        Mail::send('Email.JobReplyToAdmiinFromUser',  ['data' => $data], function($message) use ($data) {
           $message->to($data['user_email'])->subject('Thank You for applying job!');
           $message->from($data['admin_email'],"Aimbeyond");
        });
        //dd($data);


       
    }




    //Method for save log for each contact us enquiry    
    public function applycontactus(Request $request){
        $formData=json_decode($request->input('data')); 
        $responseArray['status'] = true;
        $responseArray['message'] = "Somthing went wrong.";
	
	    $formData = $request->all();
        if(!empty($formData)){
            $email_address  = $request->get('email_address');
            $first_name     = $request->get('full_name');
            $message        = $request->get('message');
            $mobile         = $request->get('mobile');

            $jobapplication = new Contactus();
            $jobapplication['full_name']           = $first_name;
            $jobapplication['email_address']       = $email_address;
            $jobapplication['mobile']              = $mobile;
            $jobapplication['message']             = $message;
            $jobapplication['created_at']          = date("Y-m-d H:i:s");

            $FromData['first_name'] = $first_name;
            $FromData['email_address'] = $email_address;
            $FromData['message'] = $message;
            $FromData['mobile'] = $mobile;
            // $this->showUploadFile($request);
            if($jobapplication->save()){
                if($jobapplication->id >0){
                    $this->replyMessageOnEmail($FromData);
                    $this->replyMessageOnEmailToAdmin($FromData);
                    $responseArray['status'] = true;
                    $responseArray['message'] = "Query Submitted Suucessfully.";
                }else{
                    $responseArray['status'] = false;
                    $responseArray['message'] = "Query not Processed.";
                }
            }else{
                $responseArray['status'] = false;
                $responseArray['message'] = "Query not Processed.";
            }
        }
        return response()->json($responseArray);
    }



    public function replyMessageOnEmailToAdmin($FromData){
        $job_application_email  =$this->getSettingValue('contact_email');
        $job_application_reply  =$this->getSettingValue('contact_reply_email');
        $job_application_sign   =$this->getSettingValue('contact_us_signature');
        $job_application_greetings   =$this->getSettingValue('contact_us_greeting');
        $address_number_1       =$this->getSettingValue('address_number_1');
        $office_number          =$this->getSettingValue('office_number');
        $contact_mobile         =$this->getSettingValue('contact_mobile');


        $job_application_reply  = $job_application_reply;
        $to_admin_email_address       = $job_application_email;
        $admin_name             = $job_application_sign;


        $admin_email_address= $job_application_reply;
        $to_email_address   = $FromData['email_address'];
        $username           = $FromData['first_name'];
        $reply_message      = $FromData['message'];
        $mobile             = $FromData['mobile'];
        $body_message       = "You have new meesage as below,";

        //Footer
        $logo = env('FRONT_URL').'/images/footer-logo.png';
        $fb   = env('FRONT_URL').'/images/fb.png';
        $ln   = env('FRONT_URL').'/images/in.png';
        $gp   = env('FRONT_URL').'/images/g+.png';
        $data = array(
            'site_url'=>env('APP_URL'),
            'logo'=>$logo,
            'fb'=>$fb,
            'ln'=>$ln,
            'gp'=>$gp,
            'address_number_1'=>$address_number_1,
            'office_number'=>$office_number,
            'contact_mobile'=>$contact_mobile,
            'user_email'=>$to_email_address,
            'user_name'=>ucwords($username),
            'admin_email'=>$admin_email_address,
            'admin_name'=>$admin_name,
            'message'=>$reply_message,
            'body_message'=>$body_message,
            'to_admin_email_address'=>$to_admin_email_address,
            'greeting_name'=>$job_application_greetings,
            'mobile'=>$mobile
        );

        Mail::send('Email.WithoutSignContactUsToAdmin',  ['data' => $data], function($message) use ($data) {
           $message->to($data['to_admin_email_address'])->subject('New Contact Us Message -['.$data['user_name'].']');
           $message->from($data['admin_email'],"Aimbeyond");
        });
       
    }



    
    public function replyMessageOnEmail($FromData){
        $job_application_email  =$this->getSettingValue('contact_email');
        $job_application_reply  =$this->getSettingValue('contact_reply_email');
        $job_application_sign   =$this->getSettingValue('contact_us_signature');
        $job_application_greetings   =$this->getSettingValue('contact_us_greeting');
        $address_number_1       =$this->getSettingValue('address_number_1');
        $office_number          =$this->getSettingValue('office_number');
        $contact_mobile         =$this->getSettingValue('contact_mobile');


        $job_application_reply  = $job_application_reply;
        $to_admin_email_address       = $job_application_email;
        $admin_name             = $job_application_sign;


        $admin_email_address= $job_application_reply;
        $to_email_address   = $FromData['email_address'];
        $username           = $FromData['first_name'];
        $reply_message      = $FromData['message'];
        $body_message       = "You have new meesage as below,";

        //Footer
        $logo = env('FRONT_URL').'/images/footer-logo.png';
        $fb   = env('FRONT_URL').'/images/fb.png';
        $ln   = env('FRONT_URL').'/images/in.png';
        $gp   = env('FRONT_URL').'/images/g+.png';
        $data = array(
            'site_url'=>env('APP_URL'),
            'logo'=>$logo,
            'fb'=>$fb,
            'ln'=>$ln,
            'gp'=>$gp,
            'address_number_1'=>$address_number_1,
            'office_number'=>$office_number,
            'contact_mobile'=>$contact_mobile,
            'user_email'=>$to_email_address,
            'user_name'=>ucwords($username),
            'admin_email'=>$admin_email_address,
            'admin_name'=>$admin_name,
            'reply_message'=>$reply_message,
            'body_message'=>$body_message,
            'to_admin_email_address'=>$to_admin_email_address
        );
        Mail::send('Email.ContactUsToUser',  ['data' => $data], function($message) use ($data) {
           $message->to($data['user_email'])->subject('Thank you for Contacting Us!');
           $message->from($data['admin_email'],"Aimbeyond");
        });


       
    }



    public function applyjob(Request $request){
        //$this->getSettingValue('job_application_email'); 
        $filename=$request->file('myFile');
        $formData=json_decode($request->input('data')); 
        $responseArray['status'] = true;
        $responseArray['message'] = "Somthing went wrong.";
        if(!empty($formData)){

            $jobId          = $formData->jobId;
            $email_address  = $formData->email_address;
            $first_name     = $formData->first_name;
            $last_name      = $formData->last_name;
            $when_start     = $formData->when_start;
            $cover_letter   = $formData->cover_letter;
            $mobile         = $formData->mobile;
            $whenStartArr=array();
            $whenStartGlobalArray = $this->getwhenStartGlobalArray();
            foreach($whenStartGlobalArray as $item){
                $whenStartArr[$item['id']]=$item['title'];
            }
            // $whenStartArr=array(
            //     "1"=>"Immediate",
            //     "2"=>"Within 1 Week",
            //     "3"=>"Within 10 Days",
            //     "4"=>"Within 15 Days",
            //     "5"=>"Within 20 Days",
            //     "6"=>"Within 25 Days",
            //     "7"=>"Within 30 Days",
            //     "8"=>"Within 45 Days",
            //     "9"=>"Within 90 Days"
            // );
            $when_start_value = "";
            if(in_array($when_start,$whenStartArr)){
                $when_start_value = $whenStartArr[$when_start];
            }

            $whenStartObj = WhenStart::find($when_start);
            $when_start_value = $whenStartObj['title']; 
            $jobapplication = new JobApplication();
            $jobapplication['job_id']               = $jobId;
            $jobapplication['first_name']           = $first_name;
            $jobapplication['email_address']        = $email_address;
            $jobapplication['mobile']               = $mobile;
            $jobapplication['last_name']            = $last_name;
            $jobapplication['when_start']           = $when_start_value;
            $jobapplication['cover_letter']         = $cover_letter;
            $jobapplication['application_status']   = 'New Application';
            $jobapplication['created_at']           = date("Y-m-d H:i:s");

	    //Save Resume
	    $file = $request->file('myFile');
       	    //echo "<pre>";
	    //print_r($file);
            //Display File Name
            $fileName = $file->getClientOriginalName();
	    $jobapplication['resume']	=	$fileName;
	    $destinationPath 		= 	'storage/uploads/resume';
	    //$destinationPath = "public";
     	    $file->move($destinationPath,$file->getClientOriginalName());

          // $this->showUploadFile($request);
            if($jobapplication->save()){
                if($jobapplication->id >0){
                    $JobformData['jobId']          = $formData->jobId;
                    $JobformData['email_address']  = $formData->email_address;
                    $JobformData['first_name']     = $formData->first_name;
                    $JobformData['last_name']      = $formData->last_name;
                    $JobformData['when_start']     = $when_start;
                    $JobformData['cover_letter']   = $formData->cover_letter;
                    $JobformData['mobile']         = $formData->mobile;
                    $JobformData['fileName']      = $fileName;
                    //For User
                    $this->ApplyJOBOnEmailToUser($JobformData);

                    //For Admin
                    $this->ApplyJOBOnEmailToAdmin($JobformData);

                    $responseArray['status'] = true;
                    $responseArray['message'] = "Job Applied Suucessfully.";
                }else{
                    $responseArray['status'] = false;
                    $responseArray['message'] = "Job Application not Processed.";
                }
            }else{
                $responseArray['status'] = false;
                $responseArray['message'] = "Job Application not Processed.";
            }
        }
        return response()->json($responseArray);
    }


    public function getSettingValue($type){
        $setting = Setting::orderBy('id','ASC')->get();
        foreach($setting as $key=>$item){
            if($item['type']==strtolower($type)){
                return $setting[$key]['value']; 
            }
        }
    }

    //Send Email to Admin
     public function ApplyJOBOnEmailToAdmin($FromData){
        $job_application_email  =$this->getSettingValue('job_application_email');
        $job_application_reply  =$this->getSettingValue('job_application_reply');
        $job_application_sign   =$this->getSettingValue('job_application_sign');
        $job_application_greetings   =$this->getSettingValue('job_application_greetings');
        $address_number_1       =$this->getSettingValue('address_number_1');
        $office_number          =$this->getSettingValue('office_number');
        $contact_mobile         =$this->getSettingValue('contact_mobile');

        $whenStartArr=array();
        $whenStartGlobalArray = $this->getwhenStartGlobalArray();
        foreach($whenStartGlobalArray as $item){
            $whenStartArr[$item['id']]=$item['title'];
        }
        // $whenStartArr=array(
        //     "1"=>"Immediate",
        //     "2"=>"Within 1 Week",
        //     "3"=>"Within 10 Days",
        //     "4"=>"Within 15 Days",
        //     "5"=>"Within 20 Days",
        //     "6"=>"Within 25 Days",
        //     "7"=>"Within 30 Days",
        //     "8"=>"Within 45 Days",
        //     "9"=>"Within 90 Days"
        // );

        //if(in_array($FromData['when_start'],$whenStartArr)){
            $when_start = $whenStartArr[$FromData['when_start']];
        //}


        $setting = Setting::orderBy('id','ASC')->get();
        //dd($request->all());
    //echo "<pre>";
    //print_r($when_start);
        $jobDetails = array();
        if($FromData['jobId']!=''){
            $jobDetails = Job::find($FromData['jobId']);
            $jobDetailsTitle =  $jobDetails['job_title'];
        }else{
            $jobDetails = array();
            $jobDetailsTitle =  '';
        }
        $job_application_reply= $job_application_reply;
        $to_email_address   = $job_application_email;
        $admin_name           = $job_application_sign;
        $cover_letter       = $FromData['cover_letter'];
        $username           = ucfirst(strtolower($FromData['first_name'])).' '.ucfirst(strtolower($FromData['last_name']));
        $jobId              = $jobDetailsTitle;
        $when_start         = $when_start;
        $mobile             = $FromData['mobile'];
        $fileName           = $FromData['fileName'];
        $user_email_address = $FromData['email_address'];
        $reply_message      = '';

        //Footer
        $logo = env('FRONT_URL').'/images/footer-logo.png';
        $fb   = env('FRONT_URL').'/images/fb.png';
        $ln   = env('FRONT_URL').'/images/in.png';
        $gp   = env('FRONT_URL').'/images/g+.png';
        $data = array(
            'site_url'=>env('APP_URL'),
            'logo'=>$logo,
            'fb'=>$fb,
            'ln'=>$ln,
            'gp'=>$gp,
            'address_number_1'=>$address_number_1,
            'office_number'=>$office_number,
            'contact_mobile'=>$contact_mobile,
            'user_email'=>$to_email_address,
            'user_email_address'=>$user_email_address,
            'greeting_name'=>$job_application_greetings,
            'admin_name'=>$admin_name,
            'user_name'=>$username,
            'admin_email'=>$job_application_reply,
            'jobDetailsTitle'=>$jobDetailsTitle,
            'cover_letter'=>$cover_letter,
            'job_name'=>$jobId,
            'when_start'=>$when_start,
            'mobile'=>$mobile,
            'resume'=>env('APP_URL')."/public/storage/uploads/resume/".$fileName
        );
        Mail::send('Email.WithoutSignJobApplyAdmin',  ['data' => $data], function($message) use ($data) {
           $message->to($data['user_email'])->subject('New Job Application ['.$data['user_name'].']: '.$data['job_name'].'');
           $message->from($data['admin_email'],'Aimbeyond');
        });
    }


    //Send Email to Admin
     public function ApplyJOBOnEmailToUser($FromData){

        $job_application_email  =$this->getSettingValue('job_application_email');
        $job_application_reply  =$this->getSettingValue('job_application_reply');
        $job_application_sign   =$this->getSettingValue('job_application_sign');
        $address_number_1       =$this->getSettingValue('address_number_1');
        $office_number          =$this->getSettingValue('office_number');
        $contact_mobile         =$this->getSettingValue('contact_mobile');


        $whenStartArr=array();
        $whenStartGlobalArray = $this->getwhenStartGlobalArray();
        foreach($whenStartGlobalArray as $item){
            $whenStartArr[$item['id']]=$item['title'];
        }

        // $whenStartArr=array(
        //     "1"=>"Immediate",
        //     "2"=>"Within 1 Week",
        //     "3"=>"Within 10 Days",
        //     "4"=>"Within 15 Days",
        //     "5"=>"Within 20 Days",
        //     "6"=>"Within 25 Days",
        //     "7"=>"Within 30 Days",
        //     "8"=>"Within 45 Days",
        //     "9"=>"Within 90 Days"
        // );

        //if(in_array($FromData['when_start'],$whenStartArr)){
            $when_start = $whenStartArr[$FromData['when_start']];
        //}
        //$setting = Setting::orderBy('id','ASC')->get();
        //dd($request->all());
	    //echo "<pre>";
	    //print_r($when_start);
        $jobDetails = array();
        if($FromData['jobId']!=''){
            $jobDetails = Job::find($FromData['jobId']);
            $jobDetailsTitle =  $jobDetails['job_title'];
        }else{
            $jobDetails = array();
            $jobDetailsTitle =  '';
        }
        $job_application_email= $job_application_email;
        $admin_name         = $job_application_sign;
        $to_email_address   = $FromData['email_address'];
        $username           = ucfirst(strtolower($FromData['first_name'])).' '.ucfirst(strtolower($FromData['last_name']));
        $cover_letter       = $FromData['cover_letter'];
        $jobId              = $jobDetailsTitle;
        $when_start         = $when_start;
        $mobile             = $FromData['mobile'];
        $fileName           = $FromData['fileName'];
        $reply_message      = '';

        //Footer
        $logo = env('FRONT_URL').'/images/footer-logo.png';
        $fb   = env('FRONT_URL').'/images/fb.png';
        $ln   = env('FRONT_URL').'/images/in.png';
        $gp   = env('FRONT_URL').'/images/g+.png';
        
        $data = array(
            'site_url'=>env('APP_URL'),
            'logo'=>$logo,
            'fb'=>$fb,
            'ln'=>$ln,
            'gp'=>$gp,
            'address_number_1'=>$address_number_1,
            'office_number'=>$office_number,
            'contact_mobile'=>$contact_mobile,
            'user_email'=>$to_email_address,
            'user_name'=>$username,
            'admin_name'=>$admin_name,
            'admin_email'=>$job_application_email,
            'cover_letter'=>$cover_letter,
            'jobDetailsTitle'=>$jobDetailsTitle,
            'job_name'=>$jobId,
            'when_start'=>$when_start,
            'mobile'=>$mobile,
            'resume'=>env('APP_URL')."/public/storage/uploads/resume/".$fileName
        );
        Mail::send('Email.jobApplyUser',  ['data' => $data], function($message) use ($data) {
           $message->to($data['user_email'])->subject('Thank you for applying for the Job Position-'.$data['job_name']);
           $message->from($data['admin_email'],"Aimbeyond");
        });
    }

    public function getSettingList(){
        $settingList = Setting::all();
        return $settingList;
    }


    public function getHeaderMenu(){
        $menuList = Menu::with('childMenu')->where('status','=',1)->where('parent_id','=',0)->orderBy('order_no','ASC')->get()->toArray();
            if(count($menuList)>0){
                foreach($menuList as $key=>$menuItem){
                //Get Page List of the Menu
                $pageList=Page::where("parent_menu_id","=",$menuItem['id'])->where('status','=',1)->first();
                //dd($pageList);
                if($pageList['slug']=='joinus'){
                    $pageurl = env('API_URL').'/api/v1/joinus';
                }else{
                    $pageurl = env('API_URL').'/api/v1/getpagedetails/'.$pageList['slug'];
                }
                $menuArray[$key] = array(
                            "id"=>$menuItem['id'],
                            "parentId"=>$menuItem['parent_id'],
                            "title"=>$menuItem['title'],
                            "orderNo"=>$menuItem['order_no'],
                            "image_icon"=>$menuItem['image_icon'],
                            //"page"=>$pageList,
                            "pageTemplateId"=>$pageList['page_template_id'],
                            "pageurl"=>$pageurl,
                            "pageId"=>$pageList['id'],
                            "pageSlug"=>$pageList['slug'],
                        );
                }
        }

        return $menuArray;
    }
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function gethomepage()
    {
        $stateArray = array();
        $responseArray = array();
        $menuArray = array();
        try{
            $menuArray = $this->getHeaderMenu();
            if(count($menuArray)>0){
                //Home page content
                $defaultimages =  'abit_creative.png';
                $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$defaultimages;
                $homepageBanner = env('APP_URL').'/public'.$bannerPath;

                $responseArray['status'] = true;
                $responseArray['message'] = "success";

                $settingArray = $this->getSettingList();
                $responseArray['result']['Settings'] = $settingArray;  
                $responseArray['result']['Menu'] = $menuArray;      
                $responseArray['result']['HomePage'] = $homepageBanner;         

            }else{
                $responseArray['status'] = false;
                $responseArray['message'] = "No State Found";
            }
        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }

        return response()->json($responseArray);
    }


    public function notfound(){
        $responseArray  = array();
        $menuArray      = array();
        $finalPageArray  = array();
        $pageContentArrDetails  = array();
        $menuArray = $this->getHeaderMenu();
        $settingArray = $this->getSettingList();
        $responseArray['status'] = false;
        $responseArray['message'] = "Page not found";
        $responseArray['result']['Menu'] = $menuArray;    
        $responseArray['result']['Settings'] = $settingArray;   
        $responseArray['result']['PageDetails'] =$finalPageArray;    
        $responseArray['result']['PageContentDetails'] =$pageContentArrDetails;  
        return $responseArray;  
    }

    public function getPageDetails(Request $request, $pageId,$pageTemplateId=null){
        $responseArray  = array();
        $menuArray      = array();
        $pageBody       = array();
        $metaDetails    = array();
	    $imageArray     = array();
        $finalPageArray  = array();
        $pageContentArrDetails  = array();
        try{

            $pageDetails = Page::with('PageContent')
            ->where('status','=',1)->where('slug','=',$pageId)->first();
            //echo $pageDetails['parent_menu_id'];
            if(empty($pageDetails)){
                $responseArray = $this->notfound();
                return response()->json($responseArray);
            }
            
            $ParanetMenu = '';
            if($pageDetails['parent_menu_id'] > 0){ 
                $parentMenuId   = $pageDetails['parent_menu_id'];
                $ParanetMenuArr = Menu::find($parentMenuId);
                $ParanetMenu    = $ParanetMenuArr['title'];
            }
            
            $ChildMenu = '';
            if($pageDetails['menu_id'] > 0 ){
                $childMenuId    = $pageDetails['menu_id'];
                $ChildMenuArr   = Menu::find($childMenuId);
                $ChildMenu      = $ChildMenuArr['title'];
            }

            //dd($ChildMenu['title']);
            //Main Page Body
            $pageBody['Title']              =   $pageDetails['title']; 
            $pageBody['Description']        =   $pageDetails['description']; 
            $pageBody['Tagline']            =   $pageDetails['tagline']; 
            $pageBody['Slug']               =   $pageDetails['slug']; 
            $pageBody['PageTemplateId']     =   $pageDetails['page_template_id']; 
            $pageBody['Status']             =   $pageDetails['status']; 
            $pageBody['ParentPage']         =   $ParanetMenu; 
            $pageBody['ChildPage']          =   $ChildMenu; 

            //Meta Details
            $metaDetails['metaHeading']     =   $pageDetails['meta_heading'];
            $metaDetails['metaTitle']       =   $pageDetails['meta_title'];
            $metaDetails['metaDescription'] =   $pageDetails['meta_description'];
            $metaDetails['ogDescription']   =   $pageDetails['og_description'];
            $metaDetails['metaKeywords']    =   $pageDetails['meta_keywords'];
            $metaDetails['Robots']          =   $pageDetails['robots'];
            $metaDetails['revisitAfter']    =   $pageDetails['revisit_after'];
            $metaDetails['og_local']        =   $pageDetails['og_local'];
            $metaDetails['og_type']         =   $pageDetails['og_type'];
            $metaDetails['og_image']        =   $pageDetails['og_image'];
            $metaDetails['og_title']        =   $pageDetails['og_title'];
            $metaDetails['og_url']          =   $pageDetails['og_url'];
            $metaDetails['og_site_name']    =   $pageDetails['og_site_name'];
            $metaDetails['canonical']       =   $pageDetails['canonical'];
            $metaDetails['geo_region']      =   $pageDetails['geo_region'];
            $metaDetails['geo_place_name']  =   $pageDetails['geo_place_name'];
            $metaDetails['geo_position']    =   $pageDetails['geo_position'];
            $metaDetails['icbm']            =   $pageDetails['icbm'];
            $metaDetails['author']          =   $pageDetails['author'];

            //Banner Details
            $defaultimages =  $pageDetails['default_images'];
            $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$defaultimages;
            $homepageBanner = env('APP_URL').'/public'.$bannerPath;
            $homePageBannerArray=array(
                'TagLine'=>$pageDetails['tagline'],
                'Title'=>$pageDetails['banner_title'],
                'Description'=>$pageDetails['banner_descriptions'],
                'Image'=>$homepageBanner,
            );

            $finalPageArray= array(
                                    'MainBody'=>$pageBody,
                                    'MetaDetails'=>$metaDetails,
                                    'Banner'=>$homePageBannerArray
                            );

            //all Content of the Page
            $pageContentArrDetails = array();
            $pageContentArr = $pageDetails['PageContent'];


            if(!empty($pageContentArr)){
                foreach($pageContentArr as $contentItem){
                    //check if this Content have multiple Image or not
                    $PageContentImage = $contentItem['PageContentImage'];

                    if(!empty($PageContentImage)){
                        foreach($PageContentImage as $contentItemImage){

                            //dd($contentItemImage);
                            $contentImage = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_250PX_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_250PX_HEIGHT').'/'.$contentItemImage['default_images'];
                            $contentImageBanner = env('APP_URL').'/public'.$contentImage;

                            $contentImage1 = config('global.PAGE_CONTENT_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$contentItemImage['default_images'];
                            $contentImageBanner1 = env('APP_URL').'/public'.$contentImage1;

                            $imageArray[]=array(
                                'image'=>$contentImageBanner1,
                                'image250'=>$contentImageBanner,
                                'altText'=>$contentItemImage['image_alt'],
                                'titleText'=>$contentItemImage['image_title']
                            );
                        }
                    }

                    //Get Page Link Details
                    $targetslug = '';
                    $pageLinkDetails = Page::find($contentItem['page_link_id']);
                    if(!empty($pageLinkDetails)){
                        $targetslug = $pageLinkDetails['slug'];
                    }
                    $pageContentArrDetails[]= array(
                        'Title'=>$contentItem['title'],
                        'Description'=>$contentItem['description'],
                        'TargetLink'=>$targetslug,
                        'ExternalLink'=>$contentItem['url'],
                        'Field1'=>$contentItem['field_1'],
                        'Field2'=>$contentItem['field_2'],
                        'Field3'=>$contentItem['field_3'],
                        'Field4'=>$contentItem['field_4'],
                        'Field5'=>$contentItem['field_5'],
                        'Status'=>$contentItem['status'],
                        'Images'=>$imageArray
                    );

                    $imageArray = array();
                }
                //dd($pageDetails['PageContent']);

            }
            

            $menuArray = $this->getHeaderMenu();
            $settingArray = $this->getSettingList();
            $responseArray['status'] = true;
            $responseArray['message'] = "success";
            $responseArray['result']['Menu'] = $menuArray;    
            $responseArray['result']['Settings'] = $settingArray;    
            $responseArray['result']['PageDetails'] =$finalPageArray;    
            $responseArray['result']['PageContentDetails'] =$pageContentArrDetails;    

        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }

        return response()->json($responseArray);
       
    }

    public function jobdetails(Request $request, $pageId,$pageTemplateId=null){
        $responseArray  = array();
        $menuArray      = array();
        $pageBody       = array();
        $metaDetails    = array();

        $finalPageArray  = array();
        try{

            $pageDetails = Job::with('JobSkill')
            ->where('job_status','=',1)->where('id','=',$pageId)->first();

            // dd($pageDetails);
            //echo $pageDetails['parent_menu_id'];

            //Main Page Body
            $pageBody['Tagline']=$pageDetails['tagline']; 
            $pageBody['image_title']=$pageDetails['image_title']; 
            $pageBody['image_alt']=$pageDetails['image_alt']; 
            $pageBody['job_title']=$pageDetails['job_title']; 
            $pageBody['job_descriptions']=$pageDetails['job_descriptions']; 
            $pageBody['job_id']=$pageDetails['job_id']; 
            $pageBody['job_publish_date']=$pageDetails['job_publish_date']; 


         
            //Banner Details
            $defaultimages =  $pageDetails['default_images'];
            $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$defaultimages;
            $homepageBanner = env('APP_URL').'/public'.$bannerPath;

            //Get All the Skills Of this Job
            $jobSkills = JobSkill::with('Skill')->where('job_id','=',$pageId)->get();
            $jobskillArray = array();
            if(!empty($jobSkills)){
                foreach($jobSkills as $jobskillItem){
                    $jobskillArray[] = array(
                        'SkillId'=>$jobskillItem['Skill']['id'],
                        'Skill'  =>$jobskillItem['Skill']['title'],
                    );
                }
            }



            $homePageBannerArray=array(
                'image_title'=>$pageDetails['image_title'],
                'image_alt'=>$pageDetails['image_alt'],
                'Image'=>$homepageBanner,
            );

            $finalPageArray= array(
                                    'MainBody'=>$pageBody,
                                    'Banner'=>$homePageBannerArray
                            );

            //all Content of the Page

            $whenStartGlobalArray = $this->getwhenStartGlobalArray();
    
            $menuArray = $this->getHeaderMenu();
            $settingArray = $this->getSettingList();
            $responseArray['status'] = true;
            $responseArray['message'] = "success";
            $responseArray['result']['Menu'] = $menuArray;    
            $responseArray['result']['Settings'] = $settingArray;    
            $responseArray['result']['WhenStart'] = $whenStartGlobalArray;    
            $responseArray['result']['PageDetails'] =$finalPageArray;    
            $responseArray['result']['Skill'] =$jobskillArray; 

            //Get Other JOBs
            $otherJobList = $this->getOtherJobList($pageId);
            $responseArray['result']['CurrentOppening'] =$otherJobList; 


        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }

        return response()->json($responseArray);
       
    }


    public function getwhenStartGlobalArray(){
        $whenStartGlobalArray = WhenStart::where('status','=',1)->orderBy('id','ASC')->get()->toArray(); 
        return $whenStartGlobalArray;
    }


    private function getOtherJobList($pageId){

            //Get All the Job List
            $jonFinalArray = array();
            $jobListObj= Job::with('JobSkill')->where('id','!=',$pageId)->where('job_status','=',1)->get();
            $jobListFinal = array();
            if(!empty($jobListObj)){
                foreach($jobListObj as $jobList){

                    $defaultimages =  $jobList['default_thumbnail'];
                    $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$defaultimages;
                    $homepageBanner = env('APP_URL').'/public'.$bannerPath;
                    $homePageBannerArray=array(
                        'ImageTitle'=>$jobList['image_title'],
                        'ImageAlt'  =>$jobList['image_alt'],
                        'Image'     =>$homepageBanner,
                    );

                    $jonFinalArray['id']               = $jobList['id'];
                    $jonFinalArray['bannerImage']      = $homePageBannerArray;
                    $jonFinalArray['defaultImages']    = $jobList['default_images'];
                    $jonFinalArray['Tagline']          = $jobList['tagline'];
                    $jonFinalArray['jobTitle']         = $jobList['job_title'];
                    $jonFinalArray['jobDescriptions']  = $jobList['job_descriptions'];
                    $jonFinalArray['jobId']            = $jobList['job_id'];
                    $jonFinalArray['jobPublishDate']   = date('d M,Y',strtotime($jobList['job_publish_date']));
                    $jonFinalArray['jobStatus']        = ($jobList['job_status']==1)?'Active':'InActive';
                    $jonFinalArray['externalUrl']      = $jobList['external_url'];
                    $jonFinalArray['detailsUrl']       = env('API_URL').'/api/v1/jobdetails/'.$jobList['id'];
                   
                    //Get All the Skills Of this Job
                    $jobSkills = JobSkill::with('Skill')->where('job_id','=',$jobList['id'])->get();
                    $jobskillArray = array();
                    if(!empty($jobSkills)){
                        foreach($jobSkills as $jobskillItem){
                            $jobskillArray[] = array(
                                'SkillId'=>$jobskillItem['Skill']['id'],
                                'Skill'  =>$jobskillItem['Skill']['title'],
                            );
                        }
                    }

                    $jonFinalArray['Skill']      = $jobskillArray;
                    $jobListFinal[] = $jonFinalArray;
                    //dd($jobSkills);

                    $jonFinalArray = array();
                }

            }
            return $jobListFinal;

    }



    /*
     * Get Join Us API
     */
    public function getJoinnUs(Request $request){

        $responseArray  = array();
        $menuArray      = array();
        $pageBody       = array();
        $metaDetails    = array();

        $finalPageArray  = array();
        $pageContentArrDetails = array();
        try{
        $pageDetails=Page::where('slug','=','joinus')->where('status','=',1)->orderBy('updated_at','DESC')->first();

          //Main Page Body
            $pageBody['Title']=$pageDetails['title']; 
            $pageBody['Description']=$pageDetails['description']; 
            $pageBody['Tagline']=$pageDetails['tagline']; 
            $pageBody['Slug']=$pageDetails['slug']; 
            $pageBody['PageTemplateId']=$pageDetails['page_template_id']; 
            $pageBody['status']=$pageDetails['status']; 

            //Meta Details
            $metaDetails['metaHeading']     = $pageDetails['meta_heading'];
            $metaDetails['metaTitle']       = $pageDetails['meta_title'];
            $metaDetails['metaDescription'] = $pageDetails['meta_description'];
            $metaDetails['ogDescription']   = $pageDetails['og_description'];
            $metaDetails['metaKeywords']    = $pageDetails['meta_keywords'];
            $metaDetails['Robots']          = $pageDetails['robots'];
            $metaDetails['revisitAfter']    = $pageDetails['revisit_after'];
            $metaDetails['og_local']        = $pageDetails['og_local'];
            $metaDetails['og_type']         = $pageDetails['og_type'];
            $metaDetails['og_image']        = $pageDetails['og_image'];
            $metaDetails['og_title']        = $pageDetails['og_title'];
            $metaDetails['og_url']          = $pageDetails['og_url'];
            $metaDetails['og_site_name']    = $pageDetails['og_site_name'];
            $metaDetails['canonical']       = $pageDetails['canonical'];
            $metaDetails['geo_region']      = $pageDetails['geo_region'];
            $metaDetails['geo_place_name']  = $pageDetails['geo_place_name'];
            $metaDetails['geo_position']    = $pageDetails['geo_position'];
            $metaDetails['icbm']            = $pageDetails['icbm'];
            $metaDetails['author']          = $pageDetails['author'];

            //Banner Details
            $defaultimages =  $pageDetails['default_images'];
            $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$defaultimages;
            $homepageBanner = env('APP_URL').'/public'.$bannerPath;
            $homePageBannerArray=array(
                'Title'=>$pageDetails['banner_title'],
                'Description'=>$pageDetails['banner_descriptions'],
                'Image'=>$homepageBanner,
            );

            $finalPageArray= array(
                                    'MainBody'=>$pageBody,
                                    'MetaDetails'=>$metaDetails,
                                    'Banner'=>$homePageBannerArray
                            );



            //Get All the Job List
            $jonFinalArray = array();
            $jobListObj= Job::with('JobSkill')->where('job_status','=',1)->get();
            $jobListFinal = array();
            if(!empty($jobListObj)){
                foreach($jobListObj as $jobList){

                    $defaultimages =  $jobList['default_thumbnail'];
                    $bannerPath = config('global.PAGE_IMG_BANNER').'/'.config('global.PAGE_CONTENT_IMG_DEFAULT_WIDTH').'X'.config('global.PAGE_CONTENT_IMG_DEFAULT_HEIGHT').'/'.$defaultimages;
                    $homepageBanner = env('APP_URL').'/public'.$bannerPath;
                    $homePageBannerArray=array(
                        'ImageTitle'=>$jobList['image_title'],
                        'ImageAlt'  =>$jobList['image_alt'],
                        'Image'     =>$homepageBanner,
                    );

                    $jonFinalArray['id']               = $jobList['id'];
                    $jonFinalArray['bannerImage']      = $homePageBannerArray;
                    $jonFinalArray['defaultImages']    = $jobList['default_images'];
                    $jonFinalArray['Tagline']          = $jobList['tagline'];
                    $jonFinalArray['jobTitle']         = $jobList['job_title'];
                    $jonFinalArray['jobDescriptions']  = $jobList['job_descriptions'];
                    $jonFinalArray['jobId']            = $jobList['job_id'];
                    $jonFinalArray['jobPublishDate']   = date('d M,Y',strtotime($jobList['job_publish_date']));
                    $jonFinalArray['jobStatus']        = ($jobList['job_status']==1)?'Active':'InActive';
                    $jonFinalArray['status']           = $jobList['job_status'];
                    $jonFinalArray['externalUrl']      = $jobList['external_url'];
                    $jonFinalArray['detailsUrl']       = env('API_URL').'/api/v1/jobdetails/'.$jobList['id'];
                   
                    //Get All the Skills Of this Job
                    $jobSkills = JobSkill::with('Skill')->where('job_id','=',$jobList['id'])->get();
                    $jobskillArray = array();
                    if(!empty($jobSkills)){
                        foreach($jobSkills as $jobskillItem){
                            $jobskillArray[] = array(
                                'SkillId'=>$jobskillItem['Skill']['id'],
                                'Skill'  =>$jobskillItem['Skill']['title'],
                            );
                        }
                    }

                    $jonFinalArray['Skill']      = $jobskillArray;
                    $jobListFinal[] = $jonFinalArray;
                    //dd($jobSkills);

                    $jonFinalArray = array();
                }

            }

            $menuArray = $this->getHeaderMenu();
            $responseArray['status'] = true;
            $responseArray['message'] = "success";
            $responseArray['result']['Menu'] = $menuArray;    
            $responseArray['result']['PageDetails'] =$finalPageArray;    
            $responseArray['result']['jobList'] =$jobListFinal;  

        }catch (Exception $e) {
            $responseArray['status'] = false;
            $responseArray['message'] = $e->getMessage();
        }

        return response()->json($responseArray);

    }

}

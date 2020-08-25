<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Config;
use App\Menu;
use Session;
use Storage;
use Mail;
use Image;
use App\Setting;
use App\Skill;
use App\Job;
use App\JobSkill;
use App\JobApplication;
use App\Contactus;
use App\WhenStart;
use App\JobApplicationMessages;
use Carbon\Carbon;;
class JobController extends Controller
{
    

      /**
     * Global Directory Name
     * Where All Images will upload
     */
    public $uploadDir;
    /**
     * Global Directory Name
     * Where All Business Images will upload
     */
    public $uploadLogoDir;
    /**
     * Global Directory Name
     * Where All Business thumb Images will upload
     */
    public $uploadThumbDir;
    
    public $imageName;
    public $thumbWidth;
    public $thumbHeight;
    
    
    
    public function __construct() {
       $this->middleware('auth');
       $this->uploadDir=config('global.JOB_DIR');
       $this->uploadLogoDir=config('global.JOB_IMG_DIR');
       $this->uploadThumbDir=config('global.JOB_THUMB_DIR');
       

       $this->Width=config('global.JOB_IMG_WIDTH');
       $this->Height=config('global.JOB_IMG_HEIGHT');

       $this->thumbHeight=config('global.JOB_THUMB_IMG_HEIGHT');
       $this->thumbWidth=config('global.JOB_THUMB_IMG_WIDTH');
       $this->imageName=NULL;
       //$this->uploadDir.DIRECTORY_SEPARATOR.Auth::user()->id;
       //$this->uploadDir.DIRECTORY_SEPARATOR.Auth::user()->id.DIRECTORY_SEPARATOR.'thumb';
       
    }

    //Download All CVs of Job Application
    public function downloadJobApplicationsCvs($id){
        $files = array('readme.txt', 'test.html', 'image.gif');
        $zipname = 'file.zip';
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        foreach ($files as $file) {
          $zip->addFile($file);
        }
        $zip->close();
        dd($id);
    }


    /*
     * All Contact List
     * All enquiry listed by the user from the frontend
     */
    public function allContactusList(Request $request){
        $List = Contactus::orderBy('created_at','DESC')->Paginate(15);
        return view('admin.Contactus.List',compact('List'));
    }



    /*
     * All Skill List
     */
    public function allJobSkillList(Request $request){
        $List = Skill::Paginate(15);
        return view('admin.Job.Skill.List',compact('List'));

    }


    /*
     * All JOB application List
     */
    public function allJobApplication(Request $request){
        $List = JobApplication::with('Job')->Paginate(1500);
        //dd($List);
        return view('admin.Job.Jobapplication.List',compact('List'));

    }



    /*
     * Application Update Status
     */
    public function editApplication(Request $request,$id){
        $menu = JobApplication::find($id);
        
        if($request->isMethod('post')) {
            $hiddenId =  $request->get('id');
            $obj = JobApplication::find($hiddenId);
            $obj['application_status']= $request->get('application_status');
            //dd($menu);
            if($obj->save()){
                Session::flash('message', 'Job Application Updated Successfully!');
                return redirect()->route('alljobsapplication');    
            }
        }
        return view('admin.Job.Jobapplication.edit',array('menu'=>$menu));
    }



    /*
     * view Details Of Application and List of All the Application for this JOB
     */
    public function viewApplication(Request $request,$id){
        $whenstart =WhenStart::where('status','=',1)->get()->toArray();
        $menu = JobApplication::with('Job')->find($id);
        
        if($request->isMethod('post')) {
            $hiddenId =  $request->get('id');
            $obj = JobApplication::find($hiddenId);
            $obj['application_status']= $request->get('application_status');
            //dd($menu);
            if($obj->save()){
                Session::flash('message', 'Job Application Updated Successfully!');
                return redirect()->route('alljobsapplication');    
            }
        }
        $List = JobApplication::with('Job')->where('job_id','=',$id)->Paginate(15);
        // dd($List);
        return view('admin.Job.Jobapplication.view',array('menu'=>$menu,'List'=>$List,'whenstart'=>$whenstart));
    }




    /*
     * Update JOB Application Status
     */
    public function replyMessage(Request $request,$id){
        $setting = Setting::orderBy('id','ASC')->get();
        $menu = Contactus::find($id);
        
        if($request->isMethod('post')) {
            $hiddenId =  $request->get('id');
            $obj = Contactus::find($hiddenId);
            $obj['application_status']= $request->get('application_status');
            //dd($menu);
            if($obj->save()){
                Session::flash('message', 'Job Application Updated Successfully!');
                return redirect()->route('alljobsapplication');    
            }
        }
        return view('admin.Contactus.edit',array('menu'=>$menu,'setting'=>$setting));
    }



    /*
     * Reply Message to User By the Admn for JOB Applicaiton
     */
    public function replyMessageOnApplication(Request $request,$id){
       

        $setting = Setting::orderBy('id','ASC')->get();
        $JobApplicationMessages = JobApplication::with('Job','JobApplicationMessages')->find($id);
        if($JobApplicationMessages == null){
            return abort(404, 'The resource you are looking for could not be found');
        }
        //dd($JobApplicationMessages);
        if($request->isMethod('post')) {
             if(empty($request->get('reply_message'))){
                Session::flash('error', 'Please enter message first!');
                return redirect()->back(); 
            }
            $hiddenId =  $request->get('id');
            $job_id             = $hiddenId; 
            $job_application_id = $id; 
            $to_email_address   = $request->get('to_email_address'); 
            $full_name          = $request->get('full_name'); 
            $admin_email_address= $request->get('email_address'); 
            $admin_name         = $request->get('name'); 
            $reply_message      = $request->get('reply_message'); 
            $message_to         = 'USER'; 
            $message_from       = 'ADMIN'; 
            
            //Save Data into Table
            $JobApplicationMessages = new JobApplicationMessages();
            $JobApplicationMessages['job_id']               = $job_id;
            $JobApplicationMessages['job_application_id']   = $job_application_id;
            $JobApplicationMessages['email_address']        = $to_email_address;
            $JobApplicationMessages['name']                 = $full_name;
            $JobApplicationMessages['from_email_address']   = $admin_email_address;
            $JobApplicationMessages['from_name']            = $admin_name;
            $JobApplicationMessages['message']              = $reply_message;
            $JobApplicationMessages['message_to']           = $message_to;
            $JobApplicationMessages['message_from']         = $message_from;
            if($JobApplicationMessages->save()){

                $JobApplicationMessagesData['job_id']               = $job_id;
                $JobApplicationMessagesData['job_application_id']   = $job_application_id;
                $JobApplicationMessagesData['email_address']        = $to_email_address;
                $JobApplicationMessagesData['name']                 = $full_name;
                $JobApplicationMessagesData['from_email_address']   = $admin_email_address;
                $JobApplicationMessagesData['from_name']            = $admin_name;
                $JobApplicationMessagesData['message']              = $reply_message;
                $JobApplicationMessagesData['message_to']           = $message_to;
                $JobApplicationMessagesData['message_from']         = $message_from;
                $this->sendEmailToUserForJobApplication($JobApplicationMessagesData);
                Session::flash('message', 'Email Sent to user Successfully!');
                return redirect()->route('viewjob',['id'=>$job_id,'application']);    
            }
        }

        //Get All the conversation
        $messsageList = JobApplicationMessages::where('job_application_id','=',$id)
        ->orderBy('created_at','DESC')
        ->get()
        ->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('d M,Y');
        })->toArray();

        
        return view('admin.Job.jobapplicationreply',array(
                    'setting'               =>  $setting,
                    'jobapplicationDetails' =>  $JobApplicationMessages,
                    'id'                    =>  $id,
                    'messsageList'          =>  $messsageList
                )
        );
    }



    //Send Email to User On JOB Application
    public function sendEmailToUserForJobApplication($FromData){
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
        $to_email_address   = $FromData['email_address'];
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
            'user_name'         =>  ucwords($username),
            'admin_email'       =>  $admin_email_address,
            'admin_name'        =>  $admin_name,
            'reply_message'     =>  $reply_message,
            'body_message'      =>  $body_message,
            'to_admin_email_address'=>$to_admin_email_address,

            'reply_url' =>$reply_url
        );

        Mail::send('Email.JobReplyToUser',  ['data' => $data], function($message) use ($data) {
           $message->to($data['user_email'])->subject('Thank You for applying job!');
           $message->from($data['admin_email'],"Aimbeyond");
        });
        //dd($data);


       
    }


    public function replyOnApplicationByCandidate(Request $request, $id){

    }




    /*
     * Add New Skill
     */
    public function addSkill(Request $request,$id=null){
        if($request->isMethod('post')) {
            $obj = new Skill();
            $obj['title'] = $request->get('title');
            $obj['status'] = $request->get('status');
            if($obj->save()){
                Session::flash('message', 'Skills added successfully!');
                return redirect()->route('alljobskills');
            }
        }
        return view('admin.Job.Skill.add',array('id'=>$id));
    }




     /*
     * @params id of the SKill
     * Edit  Skill
     */
     public function editSkill(Request $request,$id){
        $menu = Skill::find($id);
        //dd($menu);
        if($request->isMethod('post')) {
            $hiddenId =  $request->get('id');
            $obj = Skill::find($hiddenId);
            $obj['title']      = $request->get('title');
            $obj['status']     = $request->get('status');
            //dd($menu);
            if($obj->save()){
                Session::flash('message', 'Skill updated successfully!');
                return redirect()->route('alljobskills');    
            }
        }
        return view('admin.Job.Skill.edit',array('menu'=>$menu));
    }

    


    /*
     * Delete Skill
     * @param id of the SKill
     */
    public function deleteSkill(Request $request,$id){
        $menu = Skill::find($id);
        if($menu->delete()){
            Session::flash('message', 'Skill deleted successfully!');
            return redirect()->route('alljobskills');
        }else{
            Session::flash('message', 'Skill not updated !');
            return redirect()->route('alljobskills');
        }

    }



    public function deleteMessage(Request $request,$id){
        $menu = Contactus::find($id);
        if($menu->delete()){
            Session::flash('message', 'Message deleted successfully!');
            return redirect()->route('contactuslist');
        }else{
            Session::flash('message', 'Message not updated !');
            return redirect()->route('contactuslist');
        }

    }



    public function allJobList(Request $request){
        $List = Job::with('Jobskill','JobApplication')->orderBy('id','DESC')->Paginate(1500);
        return view('admin.Job.List',compact('List'));
    }



    public function createJob(Request $request){
        $skills = Skill::where('status','=',1)->get();

        if ($request->isMethod('post')) {
            $title          = $request->get('title');
            $page_url       = $request->get('page_url');
            $body           = $request->get('body');
            $jobid         = $request->get('jobid');
            $job_publish_date = $request->get('job_publish_date');
            $status         = $request->get('job_status');
            $tagline        = $request->get('tagline');
            $image_alt      = $request->get('image_alt');
            $image_title    = $request->get('image_title');
            $page           = new Job();
            
            $skillsList= $request->get('skills');
            
            $page['job_title']=$title;
            $page['tagline']=$tagline;
            // $page['page_url']=$page_url;
            $page['job_descriptions']=$body;
            if($job_publish_date!=''){
                $page['job_publish_date']=$job_publish_date;
            }else{
                $page['job_publish_date']=$this->getCreateDate();
            }
            
            if($jobid!=''){
                $page['job_id']=$jobid;
            }else{
                $page['job_id']=time();
            }

            $page['job_status']=$status;


            $page['image_alt']=$image_alt;
            $page['image_title']=$image_title;

            $page['created_at']=date('Y-m-d H:i:s');
            // dd($page);
            //Upload the image
            if(!empty($request->file('logo'))){
                $this->imageName=$this->saveImage($request);
                $page->default_images =$this->imageName;
                $page->default_thumbnail =$this->imageName;
            }

            try{
                $page->save();
                if($page->id >0){
                    $this->saveJobSkill($page->id,$skillsList);
                }
                Session::flash('message', 'Job "'.$title.'" created.');
            }catch(Exception $e){
                Session::flash('message', 'Page not created!');
            }
            return redirect()->route('alljobs');
        }
        return view('admin/Job/create',array('skills'=>$skills));
    }



    private function saveJobSkill($jobId,$skillsList){
            if(!empty($skillsList)){
                foreach($skillsList as $skillItem){
                    $jobskill =  new JobSkill();
                    $jobskill->job_id = $jobId; 
                    $jobskill->skill_id = $skillItem; 
                    $jobskill->created_at = $this->getCreateDate(); 
                    $jobskill->save();
                }
            }
    }

    
    private function updateJobSkill($jobId,$skillsList){
            if(!empty($skillsList)){
                JobSkill::where('job_id','=',$jobId)->delete();
                foreach($skillsList as $skillItem){
                    $jobskill =  new JobSkill();
                    $jobskill->job_id = $jobId; 
                    $jobskill->skill_id = $skillItem; 
                    $jobskill->created_at = $this->getCreateDate(); 
                    $jobskill->save();
                }
            }
    }

    



    public function deletejob(Request $request,$id){
        $page = Job::find($id);
        $title = $page['job_title']." Job deleted.";
        if(!empty($page)){
            
            try{
                $page->delete();
                Session::flash('message',$title);
            }catch(Exception $e){
                Session::flash('message', 'Job not deleted!');
            }
            return Redirect::back()->with('msg', 'Job not deleted!');   
        }


    }


    public function viewJob(Request $request,$id=null){
        $skills = Skill::where('status','=',1)->get();
        $jobDetails = Job::with('JobSkill')->where('id','=',$id)->get()->toArray();
        $List = JobApplication::with('Job')->where('job_id','=',$id)->orderBy('id','DESC')->Paginate(1500);
        return view('admin/Job/view',array('skills'=>$skills,'jobDetails'=>$jobDetails[0],'List'=>$List));

    }




    public function editJob(Request $request,$id=null){
        $skills = Skill::where('status','=',1)->get();
        if ($request->isMethod('post')) {
            $title          = $request->get('title');
            $page_url       = $request->get('external_url');
            $body           = $request->get('body');
            $jobid         = $request->get('jobid');
            $job_publish_date = $request->get('job_publish_date');
            $status         = $request->get('job_status');
            $tagline        = $request->get('tagline');
            $image_alt      = $request->get('image_alt');
            $image_title    = $request->get('image_title');
            $page           = Job::find($id);
            
            $skillsList= $request->get('skills');
            
            $page['job_title']=$title;
            $page['tagline']=$tagline;
            $page['external_url']=$page_url;
            $page['job_descriptions']=$body;
            if($job_publish_date!=''){
                $page['job_publish_date']=$job_publish_date;
            }else{
                $page['job_publish_date']=$this->getCreateDate();
            }
            
            if($jobid!=''){
                $page['job_id']=$jobid;
            }else{
                $page['job_id']=time();
            }

            $page['job_status']=$status;


            $page['image_alt']=$image_alt;
            $page['image_title']=$image_title;

            $page['created_at']=date('Y-m-d H:i:s');
            //dd($page);
            $this->updateJobSkill($page->id,$skillsList);
                
            //Upload the image
            if(!empty($request->file('logo'))){
                $this->imageName=$this->saveImage($request);
                $page->default_images =$this->imageName;
                $page->default_thumbnail =$this->imageName;
            }
            try{
                $page->save();
                Session::flash('message', $title.' Job updated.');
            }catch(Exception $e){
                Session::flash('message', 'Job not updated!');
            }
            return redirect()->route('alljobs');
        }
        $jobDetails = Job::with('JobSkill')->find($id);
        return view('admin/Job/edit',array('skills'=>$skills,'jobDetails'=>$jobDetails));

    }






    function saveImage($request){
          $image      = $request->file('logo');
          $fileName   = md5(time()) . '.' . $image->getClientOriginalExtension();
          $imgArr=explode(".",$fileName);
          $ext=strtolower(end($imgArr));
          if(in_array($ext,config('global.IMG_EXT'))){
          $img = Image::make($image->getRealPath());
          $directoryName = 'banner';
          $thubmName = $this->thumbWidth.'X'.$this->thumbHeight;
          $img->resize($this->thumbWidth, $this->thumbHeight,  function ($constraint) {
              $constraint->upsize();                 
          });
          $img->stream(); // <-- Key point
          $res = Storage::disk('public')->put('uploads/'.$directoryName.'/'.$thubmName.'/'.$fileName, $img, 'public');

          //600X600
          $thubmName = $this->Width.'X'.$this->Height;
          $img->resize($this->Width,$this->Height, function ($constraint) {
              $constraint->upsize();                 
          });
          $img->stream(); // <-- Key point
          $res = Storage::disk('public')->put('uploads/'.$directoryName.'/'.$thubmName.'/'.$fileName, $img, 'public');
          return $fileName;
          }else{
            Session::flash('message', 'Invalid File Extension!');
            //return null;
            return Redirect::back()->with('msg', 'Invalid File Extension!');
          }
    }




    public function deleteJobImage(Request $request, $id){
        $pageContent = Job::find($id);
        $pageContent->default_images    = '';
        $pageContent->default_thumbnail = '';
        $pageContent->image_alt         = '';
        $pageContent->image_title       = '';
        if($pageContent->save()){
            Session::flash('message', 'Job  Image deleted successfully!');
            return Redirect::back()->with('msg', 'Job Image deleted successfully!'); 
        }else{
            Session::flash('message', 'Job  Image not deleted!');
            return Redirect::back()->with('msg', 'Job Image not deleted!');   
        }

    }

     public function getSettingValue($type){
        $setting = Setting::orderBy('id','ASC')->get();
        foreach($setting as $key=>$item){
            if($item['type']==strtolower($type)){
                return $setting[$key]['value']; 
            }
        }
    }

    public function replyMessageOnEmail(Request $request){

        $job_application_email  =$this->getSettingValue('contact_email');
        $job_application_reply  =$this->getSettingValue('contact_reply_email');
        $admin_name             =$this->getSettingValue('contact_us_signature');
        $job_application_greetings   =$this->getSettingValue('contact_us_greeting');
        $address_number_1       =$this->getSettingValue('address_number_1');
        $office_number          =$this->getSettingValue('office_number');
        $contact_mobile         =$this->getSettingValue('contact_mobile');

        //dd($request->all());
        $admin_email_address = $request->get('email_address');
        $to_email_address = $request->get('to_email_address');
        $username = $request->get('full_name');
        $reply_message = $request->get('reply_message');
        $id = $request->get('id');
        $setting = Setting::orderBy('id','ASC')->get(); 

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
            'admin_email'=>$admin_email_address,
            'reply_message'=>$reply_message,
            'admin_name'=>$admin_name
        );
        Mail::send('Email.reply',  ['data' => $data], function($message) use ($data) {
           $message->to($data['user_email'])->subject('Thank you for contacting with us');
           $message->from($data['admin_email'],"Aimbeyond");
        });

        //Update the Table after Reply
        $contactObj = Contactus::find($id);
        $contactObj->is_reply = 1;
        if($contactObj->save()){
            Session::flash('message', 'Message Sent Successfully!');
        }else{
            Session::flash('message', 'Message Not Sent Successfully!');  
        }
        return redirect()->route('contactuslist');
        // return Redirect::back()->with('msg', 'Message Sent Successfully!');   
    }




}

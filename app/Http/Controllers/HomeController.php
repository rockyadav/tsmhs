<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use App\Model\Cluster_requirement;
use Illuminate\Http\Request;
use App\Model\Categories;
use App\Model\States;
use App\Model\Cities;
use App\Model\Slider;
use App\Model\Department;
use App\Model\News;
use App\Model\Facilities;
use App\Model\Events;
use App\Model\Campus;
use App\Model\Courses;
use App\Model\MediaCentre;
use App\Model\ContactUs;
use App\Model\Downloads;
use Validator;
use App\User;
use Input;
use Auth;
use DB;
use paginate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        $data['sliders'] = Slider::where(['campus_id'=>2,'status'=>1])->orderBy('id','desc')->get();
        $data['departments'] = Department::where('status',1)->paginate(3);
        $data['news'] = News::where('status',1)->orderBy('news_date','desc')->paginate(3);
        $data['events'] = Events::where('status',1)->orderBy('event_date','desc')->paginate(3);
        $data['grade'] = Cluster_requirement::where('status',1)->groupBy('grade')->orderBy('grade','asc')->get();
        $data['category'] = Categories::orderBy('name','asc')->get();
        $data['courses'] = array(); 
        if(session()->has('setEligibility'))
        {
            $eligible = session()->get('setEligibility');
            $data['courses'] = Cluster_requirement::where(['cluster_requirements.category_id'=>$eligible['category_id'],'cluster_requirements.grade'=>$eligible['grade'],'cluster_requirements.status'=>1])->join('courses','courses.id','=','cluster_requirements.course_id')->select('courses.id','courses.name')->orderBy('courses.name','asc')->get();
        }
      return view('front.index',compact('data'));
    }


    public function directorMessage()
    {  
      return view('front.director-message');
    }

    public function principalMessage()
    {  
      return view('front.principal-message');
    }

    public function registrarMessage()
    {  
      return view('front.registrar-message');
    }

    public function deanMessage()
    {  
      return view('front.dean-message');
    }

    public function departments()
    {  
       $data['departments'] = Department::where('status',1)->get();
       return view('front.departments',compact('data'));
    }

    public function departmentsCourse($page_url)
    {  
       $data['cources'] =  Department::join('courses','departments.id','=','courses.department')
                ->where(['departments.page_url'=>$page_url,'departments.status'=>1])
                ->select('courses.*','departments.name as department','departments.page_url as dpage_url')
                ->get();
        
       return view('front.department-course',compact('data'));
    }


    public function courseDetail($dpage_url,$cpage_url)
    {   

       $data['cources'] =  Courses::leftjoin('departments','courses.department','=','departments.id')->leftjoin('cluster_requirements','courses.id','=','cluster_requirements.course_id')->where('courses.page_url',$cpage_url)->select('courses.*','departments.name as department','cluster_requirements.grade')->first();
        
       return view('front.course-detail',compact('data'));
    }

    public function news()
    {  
       $data['news'] =  News::where('status',1)->orderBy('news_date','desc')->paginate(10);
       return view('front.news',compact('data'));
    }

    public function newsDetail($cpage_url)
    {  
       $data['news'] =  News::where('page_url',$cpage_url)
                ->first();
 
       $data['related_news'] =  News::where('page_url','!=',$cpage_url)
                                        ->orderBy('news_date','desc')
                                        ->where('status',1)
                                        ->limit(5)
                                        ->get();
        
       return view('front.news-details',compact('data'));
    }

    public function events()
    {  
       $data['events'] =  Events::where('status',1)->orderBy('event_date','desc')->paginate(10);
       return view('front.events',compact('data'));
    }

    public function eventDetail($page_url)
    {  
       $data['event'] =  Events::where('page_url',$page_url)
                ->first();
 
       $data['related_event'] =  Events::where('page_url','!=',$page_url)
                                        ->orderBy('event_date','desc')
                                        ->where('status',1)
                                        ->limit(5)
                                        ->get();
        
       return view('front.event-details',compact('data'));
    }

    
    public function facilityDetails($page_url)
    {  
       $data['facility'] =  Facilities::where('page_url',$page_url)
                ->first();
 
       $data['related_facility'] =Facilities::where('page_url','!=',$page_url)
                                            ->orderBy('id','desc')
                                            ->where('status',1)
                                            ->limit(5)
                                            ->get();
        
       return view('front.facility-details',compact('data'));
    }


    public function imageGallery()
    {  
       $data['gallery'] = MediaCentre::where(['type'=>'image','campus_id'=>2])->where('status',1)->get();
       return view('front.image-gallery',compact('data'));
    }

    public function videoGallery()
    {  
       $data['videos'] = MediaCentre::where(['type'=>'video','campus_id'=>2])->where('status',1)->get();
       return view('front.video-gallery',compact('data'));
    }

    public function downloads()
    {  
       $data['downloads'] = Downloads::where('status',1)->get();
       return view('front.downloads',compact('data'));
    }

    public function termsConditions()
    {  
       return view('front.terms-conditions');
    }

    public function privacyPolicy()
    {  
       return view('front.privacy-policy');
    }

    public function faqs()
    {  
       return view('front.faqs');
    }

    public function aboutUs()
    {  
       return view('front.about-us');
    }

    public function contactUs()
    { 
        $data['campus'] = Campus::where('status',1)->get();
        return view('front.contact-form',compact('data'));
    }

    public function loginRegister()
    {
       return view('front.login');
    }

    public function contactUsAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'mobile'     => 'required|unique:users',
          'first_name' => 'required',
          'last_name'  => 'required',
          'country'    => 'required',
          'subject'    => 'required',
          'message'    => 'required',
          'mobile'     => 'required|min:10|max:10',
          'email'      => 'required|email'
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back() ->withErrors($validator)->withInput(); 
        }

         
          $catdata = new ContactUs;
          $catdata->first_name= trim($request['first_name']);
          $catdata->last_name = trim($request['last_name']);
          $catdata->country   = trim($request['country']);
          $catdata->subject   = trim($request['subject']);
          $catdata->country   = trim($request['country']);
          $catdata->message   = trim($request['message']);
          $catdata->mobile    = trim($request['mobile']);
          $catdata->email     = trim($request['email']);
          $catdata->inq_date  = date('Y-m-d');

          $result =  $catdata->save();  
          if($result)
          {
            return back()->with('success','Detail has been sent successfully');
          }else{
            return back()->with('error','Try again.');
          }     
    }
    
    
  
    public function registration(Request $request)
    {
          $title = 'Registraion'; 

          $country = DB::table('countries')
                     ->where('id',1)
                     ->orderBy('name','asc')
                     ->get();

          $state = DB::table('county')
                     ->where('country_id',1)
                     ->orderBy('name','asc')
                     ->get(); 
          $courses = array(); 
            if(session()->get('setEligibility'))
            {
              $eligible = session()->get('setEligibility');
              $courses = Cluster_requirement::where(['cluster_requirements.category_id'=>$eligible['category_id'],'cluster_requirements.grade'=>$eligible['grade'],'cluster_requirements.status'=>1])->join('courses','courses.id','=','cluster_requirements.course_id')->select('courses.id','courses.name')->orderBy('courses.name','asc')->get();
            }
                            
           $grade = Cluster_requirement::where('status',1)->groupBy('grade')->orderBy('grade','asc')->get();
           $category = Categories::orderBy('name','asc')->get();
           $campus = Campus::orderBy('name','desc')->where('status',1)->get();

        $hide = 1;
        return view('front.registration', compact('title','country','state','courses','grade','category','hide','campus'));
    }


    public function registrationAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'mobile'           => 'required',
          'email'            => 'required',
          'first_name'       => 'required',
          'last_name'        => 'required',
          //'national_id'      => 'required',
          'preferred_intake' => 'required',
          'campus_of_study'  => 'required',
          'mode_of_study'    => 'required',
          'kcse_marksheet'   => 'required|mimes:jpeg,jpg,png|max:10000',
          'your_picture'     => 'mimes:jpeg,jpg,png|max:10000',
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back() ->withErrors($validator)->withInput(); 
        }
          $email = trim($request['email']);
          $checkemail = User::where(['email'=>$email,'verification'=>0])->first();
          if(!empty($checkemail))
          {
            $catdata = User::find($checkemail->id);
          }else{
            $catdata = new User;
          }

          $check = DB::table('users')
                   ->orderBy('id','DESC')
                   ->where('role',2)
                   ->where('email','!=',$email)
                   ->select('id','registration_number')
                   ->first();
          if(!empty($check))
          {    
            $apno = $check->registration_number;
            $ss = explode('-',$apno);
            $appno = $ss[2]+1;
            $order_no ="TSMHS-".date('Y')."-".$appno;
          }else{
             $order_no ="TSMHS-".date('Y')."-1";
          }  

           if ($request->hasFile('kcse_marksheet'))
           {
              $file = array('kcse_marksheet' => Input::file('kcse_marksheet'));
              $destinationPath = 'public/images/marksheet/'; 
              $extension = Input::file('kcse_marksheet')->getClientOriginalExtension(); 
              $fileName = 'marksheet'.time().'.'.$extension;
              Input::file('kcse_marksheet')->move($destinationPath, $fileName);
               $catdata->kcse_marksheet = $fileName;
            } 

        if ($request->hasFile('your_picture'))
           {
              $file = array('your_picture' => Input::file('your_picture'));
              $destinationPath = 'public/images/picture/'; 
              $extension = Input::file('your_picture')->getClientOriginalExtension(); 
              $fileName = 'picture'.time().'.'.$extension;
              Input::file('your_picture')->move($destinationPath, $fileName);
               $catdata->picture = $fileName;
            } 

          $catdata->registration_number  = $order_no;
          $catdata->first_name   = trim($request['first_name']);
          $catdata->last_name    = trim($request['last_name']);
          $catdata->mobile       = trim($request['mobile']);
          $catdata->email        = trim($request['email']);

          $dob = trim($request['dob']);
          $password = $dob; 

          $catdata->password     = Hash::make($password);
          $catdata->dob          = $dob;
          $catdata->alt_mobile   = trim($request['alt_mobile']);
          $catdata->nationality  = trim($request['nationality']);
          $catdata->national_id  = trim($request['national_id']);
          $catdata->country      = trim($request['country']);
          $catdata->state        = trim($request['town']);
          $catdata->father_name  = trim($request['father_name']);
          $catdata->father_mobile= trim($request['father_mobile']);
          $catdata->father_profession = trim($request['father_profession']);
          $catdata->guardian_name     = trim($request['guardian_name']);
          $catdata->guardian_mobile   = trim($request['guardian_mobile']);
          $catdata->secondary_school_name = trim($request['secondary_school_name']);
          $catdata->mode_of_study     = trim($request['mode_of_study']);

          $eligible = session()->get('setEligibility');
          $catdata->kcse_grade            = $eligible['grade'];
          $catdata->intrested_course      = $eligible['course_id'];
          $catdata->education_level       = $eligible['category_id'];
          $catdata->source_of_fees        = trim($request['source_of_fees']);
          $catdata->transport_fee         = trim($request['transport_fee']);
          $catdata->programme_name        = trim($request['programme_name']);
          $catdata->study_type            = trim($request['study_type']);
          $catdata->preferred_intake      = trim($request['preferred_intake']);
          $catdata->educational_background= trim($request['educational_background']);
          $catdata->financing_of_study    = trim($request['financing_of_study']);
          $catdata->campus_of_study       = trim($request['campus_of_study']);
          $catdata->register_step         = 2;
         
        $result =  $catdata->save();  
        if($result)
        {
            session()->forget('setEligibility');
            return redirect('registration-fee');
        }else{
            return back()->with('error','Try again.');
        }     
    }

    public function mailTemplate($type='reg',$data=[])
    {
        if($type=='reg')
        {
           return view('mail-templates.registration');
        }
    }

    public function get_kcse_grade_list(Request $request)
    {  
        $models = DB::table("cluster_requirements")
                    ->where("course_id",$request->course_id)
                    ->orderBy("grade","ASC")
                    ->get();

        return response()->json($models);
    }
    

    public function get_course_list(Request $request)
    {  

        $grade = $request->grade_id;
        $models = DB::table("cluster_requirements")
                    ->join('courses', 'cluster_requirements.course_id', '=', 'courses.id')
                   // ->where("cluster_requirements.grade","LIKE","%".$grade."%")
                    ->where("cluster_requirements.grade",$grade)
                    ->orderBy("courses.name","ASC")
                    ->groupBy("courses.id")
                    ->select("courses.*")
                    ->get();

        return response()->json($models);

    }

    public function get_state_list(Request $request)
    {  
        $models = DB::table("county")
                    ->where("country_id",$request->country_id)
                    ->orderBy("name","ASC")
                    ->get();
        return response()->json($models);

    }

    public function checkLogin(Request $request)
    {
        echo 'test';die;
        $user = Auth::user();
        $u = User::findOrFail($user->id);
        if ($u->isLogin == 1) {
            if ($user->role == 1) {
                return redirect('admin/dashboard');
            }
            if ($user->role == 2) {
                return redirect('student/dashboard');
            }
        } elseif ($u->isLogin == 0) {
            Auth::logout();
            return redirect('login')->with('error_message', 'Your account disabled');
        }
    }

    public function getCourses($catid,$grade)
    {
        $courses = Cluster_requirement::where(['cluster_requirements.category_id'=>$catid,'cluster_requirements.grade'=>$grade,'cluster_requirements.status'=>1])->join('courses','courses.id','=','cluster_requirements.course_id')->select('courses.id','courses.name')->orderBy('courses.name','asc')->get();
        $options = '<option value="">Course not Found</options>';
        if (count($courses) > 0) {
            $options = '<option value="">Select Course</option>';
            foreach ($courses as $c) {
                $options .= '<option value="'.$c->id.'">'.$c->name.'</options>';
            }
        }
        return $options;
    }

    public function setEligibility(Request $request)
    {
      if(count($_POST)>0)
      {
        $sesion = session()->put('setEligibility',['grade'=>$request['grade'],'category_id'=>$request['category_id'],'course_id'=>$request['course_id'],'first_name'=>'','last_name'=>'','mobile'=>'','email'=>'']);
        return back()->with('success', 'Eligibility set successfully');
      }else{
        return redirect('/');
      }
    }

    public function studentRegistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'mobile'     => 'required',
          'first_name' => 'required',
          'last_name'  => 'required',
          'email'      => 'required|unique:users',
          'grade'      => 'required',
          'category'   => 'required',
          'course'     => 'required'
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)->withInput(); 
        } 

          $inst  = new User;
          $inst->first_name             = trim($request['first_name']);
          $inst->last_name              = trim($request['last_name']);
          $inst->mobile                 = trim($request['mobile']);
          $inst->email                  = trim($request['email']);
          $inst->kcse_grade             = trim($request['grade']);
          $inst->intrested_course       = trim($request['course']);
          $inst->education_level        = trim($request['category']);
          $inst->register_step          = 1;
          $res = $inst->save();
          if($res)
          {
            session()->put('setEligibility',['grade'=>$request['grade'],'category_id'=>$request['category'],'course_id'=>$request['course'],'first_name'=>$request['first_name'],'last_name'=>$request['last_name'],'mobile'=>$request['mobile'],'email'=>$request['email']]);

            return redirect('registration-form');
          }else{
            return redirect('registration')->with('error', 'Check your eligibility and completed registration form');
          }
    }

    public function registrationForm(Request $request)
    {
          $title = 'Registraion'; 

          $country = DB::table('countries')
                     ->where('id',1)
                     ->orderBy('name','asc')
                     ->get();

          $state = DB::table('county')
                     ->where('country_id',1)
                     ->orderBy('name','asc')
                     ->get(); 
          $courses = array(); 
            if(session()->get('setEligibility'))
            {
              $eligible = session()->get('setEligibility');
              $courses = Cluster_requirement::where(['cluster_requirements.category_id'=>$eligible['category_id'],'cluster_requirements.grade'=>$eligible['grade'],'cluster_requirements.status'=>1])->join('courses','courses.id','=','cluster_requirements.course_id')->select('courses.id','courses.name')->orderBy('courses.name','asc')->get();
            }
                            
           $grade = Cluster_requirement::where('status',1)->groupBy('grade')->orderBy('grade','asc')->get();
           $category = Categories::orderBy('name','asc')->get();
           $campus = Campus::orderBy('name','desc')->where('status',1)->get();
        $hide = 0;
        return view('front.registration', compact('title','country','state','courses','grade','category','hide','campus'));
    }

    public function showCampus($url)
    {
        $campus = Campus::where(['page_url'=>$url,'status'=>1])->first();
        if(!empty($campus))
        {
            $data['sliders'] = Slider::where(['campus_id'=>$campus->id,'status'=>1])->orderBy('id','desc')->get();
            $data['gallery'] = MediaCentre::where(['type'=>'image','campus_id'=>$campus->id])->orderBy('id','desc')->where('status',1)->limit(12)->get();
            $data['videos'] = MediaCentre::where(['type'=>'video','campus_id'=>$campus->id])->orderBy('id','desc')->where('status',1)->limit(12)->get();
            $data['name'] = $campus->name;
            $data['campus'] = $campus;
            return view('front.campus-page',compact('data'));
        }else{
            return back()->with('error','Campus not found');
        }
    }
    /* end of class*/
}

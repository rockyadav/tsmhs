<?php

namespace App\Http\Controllers\Admin;

use App\Model\States;
use App\Model\Cities;
use App\Model\User_registration;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;
use Input;

class RegistrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $data = DB::table('users')
            ->leftJoin('courses', 'users.intrested_course', '=', 'courses.id')
            ->where('users.status', 1)
            ->where('users.role', 2)
            ->select('users.*', 'courses.name as course_name')
            ->orderBy('users.id','DESC')
            ->paginate(15);
        $title = 'Students list';
        return view('admin.registration.list', compact('data', 'title'));
    }

   
  public function create()
    {
       
    }


    public function store(Request $request)
    {
       
    }

 
    public function show($id)
    {
       $details = User::where('id',$id)->first();
        $courses = DB::table('courses')->where('status',1)->get();
        $state = DB::table('county')->where('country_id',1)->get();
        $category = DB::table('categories')->get();

        $title = 'Students list';
        return view('admin.registration.views',compact('courses','details','state','category'));
       

       
    }

    public function edit($id)
    {
        $details = User::where('id',$id)->first();
        $courses = DB::table('courses')
                        ->join('cluster_requirements', 'cluster_requirements.course_id', '=', 'courses.id')
                        ->where('cluster_requirements.grade',$details->kcse_grade)
                       ->where('courses.status',1)->get();
        $state = DB::table('county')->where('country_id',1)->get();
        $category = DB::table('categories')->get();


        return view('admin.registration.edit',compact('courses','details','state','category'));
    }

    
    public function update(Request $request)
    {
     
      $validator = Validator::make($request->all(), [
          'mobile'        => 'required',
          'first_name'       => 'required',
          'last_name'       => 'required',
          'national_id'       => 'required',
          'preferred_intake'       => 'required',
          'campus_of_study'       => 'required',
          'mode_of_study'       => 'required',
          'kcse_marksheet'      => 'mimes:jpeg,jpg,png|max:10000',
          'your_picture'       => 'mimes:jpeg,jpg,png|max:10000',
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back() ->withErrors($validator)->withInput(); 
        }

          $id = trim($request['rowId']);

          $catdata = User::where('id',$id)->first();  

           if ($request->hasFile('kcse_marksheet'))
           {

            if($catdata->kcse_marksheet!='')
              {
                  $path = url('public/images/marksheet/'.$catdata->kcse_marksheet);
                  if(file_exists($path)){
                        @unlink($path);
                    } 
              }
              
              $file = array('kcse_marksheet' => Input::file('kcse_marksheet'));
              $destinationPath = 'public/images/marksheet/'; 
              $extension = Input::file('kcse_marksheet')->getClientOriginalExtension(); 
              $fileName = 'marksheet'.time().'.'.$extension;
              Input::file('kcse_marksheet')->move($destinationPath, $fileName);
               $catdata->kcse_marksheet = $fileName;
            } 

        if ($request->hasFile('your_picture'))
           {

            if($catdata->picture!='')
              {
                  $path = url('public/images/picture/'.$catdata->picture);
                  if(file_exists($path)){
                        @unlink($path);
                    } 
              }

              $file = array('your_picture' => Input::file('your_picture'));
              $destinationPath = 'public/images/picture/'; 
              $extension = Input::file('your_picture')->getClientOriginalExtension(); 
              $fileName = 'picture'.time().'.'.$extension;
              Input::file('your_picture')->move($destinationPath, $fileName);
               $catdata->picture = $fileName;
            } 

         
          $catdata->first_name   = trim($request['first_name']);
          $catdata->last_name    = trim($request['last_name']);
          $catdata->mobile       = trim($request['mobile']);
          $catdata->email        = trim($request['email']);
          $catdata->dob          = trim($request['dob']);
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
         
          $catdata->kcse_grade            = trim($request['kcse_grade']);
          $catdata->intrested_course      = trim($request['intrested_course']);
          $catdata->education_level       = trim($request['education_level']); 

          $catdata->source_of_fees        = trim($request['source_of_fees']);
          $catdata->transport_fee         = trim($request['transport_fee']);
          $catdata->programme_name        = trim($request['programme_name']);
          $catdata->study_type            = trim($request['study_type']);
          $catdata->preferred_intake      = trim($request['preferred_intake']);
          $catdata->educational_background= trim($request['educational_background']);
          $catdata->financing_of_study    = trim($request['financing_of_study']);
          $catdata->campus_of_study       = trim($request['campus_of_study']);
         
        $result =  $catdata->save();  
        if($result)
        {
            return back()->with('success','Details has been updated successfully.');
        }else{
            return back()->with('error','Try again.');
        }  
    
 }

   
     public function destroy(Request $request,$id)
    {
        $check = DB::table('users')->where('id', $id)->first();
       
      if($check!='')
      {
         User::where('id', $id)->delete();
           echo 'success'; 
      }else{
            echo 'error';  
      }
    }
   

    
/* end of class*/

}

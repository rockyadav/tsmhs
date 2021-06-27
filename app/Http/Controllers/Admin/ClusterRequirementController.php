<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Cluster_requirement;
use App\Model\Categories;
use Validator;
use Auth;
use DB;
class ClusterRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data['list'] = DB::table('cluster_requirements')
                      ->leftJoin('categories','categories.id','=','cluster_requirements.category_id')
                      ->leftjoin('courses', 'courses.id', '=', 'cluster_requirements.course_id')
                      ->where(['cluster_requirements.status'=>1])
                      ->orderBy('cluster_requirements.id','desc')
                      ->select('courses.name as course_name','cluster_requirements.*','categories.name as category_name')
                      ->paginate(25); 
     
        return view('admin.cluster_requirement.list',compact('data'));
    }

     public function create()
    {

        $courses = DB::table('courses')
                      ->where(['status'=>1])
                      ->orderBy('id','desc')
                      ->get(); 
        $data['category'] = Categories::get();
        return view('admin.cluster_requirement.add',compact('courses','data'));
    }


    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'category'  => 'required',
          'course'    => 'required',
          'grade'     => 'required',
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back() ->withErrors($validator)->withInput(); 
        }
          $category_id = trim($request['category']);
          $grade = trim($request['grade']);
          $course = trim($request['course']);
          $check = Cluster_requirement::where(['category_id'=>$category_id,'grade'=>$grade,'course_id'=>$course])->first();
          if(!empty($check))
          {
             return back()->with('error','This grade already exist in this course category.');
          }

          $catdata = new Cluster_requirement;  
          $catdata->category_id  = trim($request['category']);
          $catdata->course_id    = trim($request['course']);
          $catdata->grade        = trim($request['grade']);
          $catdata->description  = trim($request['description']);
          $result =  $catdata->save();  
          if($result)
          {
              return back()->with('success','Details has been saved successfully.');
          }else{
              return back()->with('error','Try again.');
          }               

    }

 
    public function show($id)
    {
       return view('admin.cluster_requirement.view');
    }

    public function edit($id)
    {
        $details = Cluster_requirement::where('id',$id)->first();
        $courses = array();
        if(!empty($details))
        {
            $courses = DB::table('courses')
                      ->where(['status'=>1,'category_id'=>$details->category_id])
                      ->get(); 
        }
        
        $data['category'] = Categories::get();
        return view('admin.cluster_requirement.edit',compact('courses','details','data'));
    }

    
    public function update(Request $request)
    {
     
       $validator = Validator::make($request->all(), [
          'course'      => 'required',
          'grade'       => 'required',
          'category'  => 'required',
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back() ->withErrors($validator)->withInput(); 
        }

          $id = trim($request['rowId']);
          $category_id = trim($request['category']);
          $grade = trim($request['grade']);
          $course = trim($request['course']);
          $check = Cluster_requirement::where(['category_id'=>$category_id,'grade'=>$grade,'course_id'=>$course])->where('id','!=',$id)->first();
          
          if(!empty($check))
          {
             return back()->with('error','This grade already exist in this course category.');
          }


          $catdata = Cluster_requirement::where('id',$id)->first();  
          $catdata->category_id  = trim($request['category']);
          $catdata->course_id    = trim($request['course']);
          $catdata->grade        = trim($request['grade']);
          $catdata->description  = trim($request['description']);

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
        $check = DB::table('cluster_requirements')->where('id', $id)->first();
       
      if($check!='')
      {
         Cluster_requirement::where('id', $id)->delete();
           echo 'success'; 
      }else{
            echo 'error';  
      }
    }
    //class end
}

<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Courses;
use App\Model\Categories;
use App\Model\Department;
use Validator;
use Auth;
use DB;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $res = Courses::where(['courses.status'=>1]);
        $res->leftJoin('categories','categories.id','=','courses.category_id');
        $res->orderBy('courses.id','desc');
        $res->select('courses.*','categories.name as category_name');
        $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.course.list',compact('data'));
    }

    public function create()
    {
      $data['category'] = Categories::get();
      $data['departments'] = Department::where('status',1)->get();
      return view('admin.course.add', compact('data'));
    }


    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'category'    => 'required',
          'name'        => 'required',
          'duration'    => 'required',
          'course_fee'  => 'required',
          'exam_board'  => 'required',
          'duration'    => 'required',
          'department'  => 'required'
          ]);

         $response = array();
        if ($validator->fails()) {
            $valErrors = '';
            foreach ($validator->messages()->getMessages() as $field_name => $messages)
            {
                foreach($messages AS $message) {
                    $valErrors .= $message.', ';
                }
            }

            $response['status']='error';
            $response['msg']=rtrim($valErrors,', ');
            return $response; 
        }


          $category_id = trim($request['category']);
          $name        = trim($request['name']);
          $check = Courses::where(['category_id'=>$category_id,'name'=>$name])->first();

         if(!empty($check)){
            $response['status']='error';
            $response['msg']='Course already exist';
            return $response; 
         }
         
        $insert_data = Courses::saveData($request->all());
        if($insert_data==1)
        {
            $response['status']='success';
            $response['msg']='Detail has been saved successfully';
        }else{
            $response['status']='error';
            $response['msg']='Please try again';
        }
        return $response;        

    }

 
    public function show($id)
    {
       return view('admin.courses.view');
    }

    public function edit($id)
    {
        $course = Courses::where('id',$id)->first();
        $data['category'] = Categories::get();
        $data['departments'] = Department::where('status',1)->get();
        return view('admin.course.edit',compact('course','data'));
    }

    
    public function update(Request $request)
    {
     
       $validator = Validator::make($request->all(), [
          'category'    => 'required',
          'name'        => 'required',
          'duration'    => 'required',
          'course_fee'  => 'required',
          'exam_board'  => 'required',
          'duration'    => 'required',
          'department'  => 'required'
          ]);

        if ($validator->fails()) 
        {
            return redirect()->back() ->withErrors($validator)->withInput(); 
        }

          $id = trim($request['rowId']);
          $category_id = trim($request['category']);
          $name        = trim($request['name']);

          $check = Courses::where(['category_id'=>$category_id,'name'=>$name])->first();
          if(!empty($check) && $id!=$check->id)
          {
              return back()->with('error','Course already exist.');
          }
          
        $update_data = Courses::updateData($id,$request->all());
        if($update_data)
        {
            return back()->with('success','Details has been updated successfully.');
        }else{
            return back()->with('error','Try again.');
        }  
    
    }

   
    public function destroy(Request $request,$id)
    {
        $check = DB::table('courses')->where('id', $id)->first();
       
      if($check!='')
      {
         Courses::where('id', $id)->delete();
           echo 'success'; 
      }else{
            echo 'error';  
      }
    }

    public function getCourses($id)
    {
      $courses = DB::table('courses')->where(['category_id'=>$id,'status'=>1])->get();
      $option = '<option value="">No Courses Available </option>';
      if(count($courses)>0)
      {
        $option = '<option value="">Select Course Name</option>';
        foreach($courses as $c)
        {
          $option .= '<option value="'.$c->id.'">'.$c->name.'</option>';
        }
      }

      return $option;
    }
    //class end
}

<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Department;
use Validator;
use Auth;
use DB;
class DepartmentController extends Controller
{
   
    public function index()
    {  
        $res = Department::where(['status'=>1]);
        $res->orderBy('id','desc');
        $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.department.list',compact('data'));
    }

     public function create()
    {
         return view('admin.department.add');
    }


     public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'name'     => 'required|unique:departments',
          'image'    => 'required|mimes:jpeg,jpg,png' 
          
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
         
        $insert_data = Department::saveData($request->all());
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
       return view('admin.department.view');
    }

    public function edit($id)
    {
        $department = Department::where('id',$id)->first();
        return view('admin.department.edit',compact('department'));
    }


  public function update(Request $request)
    {

        $validator   =  Validator::make($request->all(), [
          'name'    => 'required',
          'image'    => 'required|mimes:jpeg,jpg,png' 
         
        ]);

        $id = $request['rowId'];
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

        $check = Department::where(['name'=>$request['name'],'status'=>1])->first();
        
        if(!empty($check) && $check->id!=$id){
            $response['status']='error';
            $response['msg']='Department already exist';
            return $response; 
        }
        
        $update_data = Department::updateData($id,$request->all());
        if($update_data==1)
        {
            $response['status']='success';
            $response['msg']='Detail has been updated successfully';
        }else{
            $response['status']='error';
            $response['msg']='Please try again';
        }        
        return $response;
    }

   
     public function destroy(Request $request,$id)
    {
        $check = DB::table('departments')->where('id', $id)->first();
       
      if($check!='')
      {
         Department::where('id', $id)->delete();
           echo 'success'; 
      }else{
            echo 'error';  
      }
    }
    //class end
}

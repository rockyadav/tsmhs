<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Model\Campus;
use Validator;
use Auth;
use DB;
class CampusController extends Controller
{
   
    public function index()
    {  
        $res = Campus::where(['status'=>1]);
        $res->orderBy('id','desc');
        $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.campus.list',compact('data'));
    }

    public function create()
    {
         return view('admin.campus.add');
    }

    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
          'name'     => 'required|unique:departments'
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
         
        $insert_data = Campus::saveData($request->all());
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
       return view('admin.campus.view');
    }

    public function edit($id)
    {
        $campus = Campus::where('id',$id)->first();
        return view('admin.campus.edit',compact('campus'));
    }

    public function update(Request $request)
    {

    $validator  =  Validator::make($request->all(), [
      'name'    => 'required'
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

    $check = Campus::where(['name'=>$request['name'],'status'=>1])->first();

    if(!empty($check) && $check->id!=$id){
        $response['status']='error';
        $response['msg']='Campus already exist';
        return $response; 
    }

    $update_data = Campus::updateData($id,$request->all());
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

    public function destroy($id)
    {        
      
      if($id!=''){
        $data = Campus::deleteData($id);
        if($data){
          echo "success";
         }
      }
        
   }
    //class end
}

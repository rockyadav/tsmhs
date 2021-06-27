<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $res = User::where('status',1)->whereIn('role',[3,4]);
        $res->orderBy('id','desc');
        $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.users.list',compact('data'));
    }

    public function store(Request $request)
    {
        $validator      =  Validator::make($request->all(), [
          'first_name'  => 'required',
          'mobile' => ['required', 'min:10'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed']
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

        $email = User::where(['email'=>$request['email'],'status'=>1])->first();
        
        if(!empty($email)){
            $response['status']='error';
            $response['msg']='Email already exist';
            return $response; 
        }

        $mobile = User::where(['mobile'=>$request['mobile'],'status'=>1])->first();
        
        if(!empty($mobile)){
            $response['status']='error';
            $response['msg']='Mobile number already exist';
            return $response; 
        }
        
        $insert_data = User::saveData($request->all());
        if($insert_data==1)
        {
            $response['status']='success';
            $response['msg']='User saved successfully';
        }else{
            $response['status']='error';
            $response['msg']='Please try again';
        }
        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['detail'] = User::where('id',$id)->first();
        return view('admin.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $validator      =  Validator::make($request->all(), [
          'rowId' => 'required', 
          'first_name'  => 'required',
          'mobile' => ['required', 'min:10'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'password' => ['nullable', 'string', 'min:8', 'confirmed']
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

        $email = User::where(['email'=>$request['email'],'status'=>1])->first();
        
        if(!empty($email) && $email->id!=$id){
            $response['status']='error';
            $response['msg']='Email already exist';
            return $response; 
        }

        $mobile = User::where(['mobile'=>$request['mobile'],'status'=>1])->first();
        
        if(!empty($mobile) && $mobile->id!=$id){
            $response['status']='error';
            $response['msg']='Mobile number already exist';
            return $response; 
        }
        
        $update_data = User::updateData($id,$request->all());
        if($update_data==1)
        {
            $response['status']='success';
            $response['msg']='User updated successfully';
        }else{
            $response['status']='error';
            $response['msg']='Please try again';
        }        
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_data = User::deleteData($id);
        if($delete_data)
        {
            return back()->with('success','User deleted successfully');
        }else{
            return back()->with('error','Please try again');
        }
    }
    //class end
}

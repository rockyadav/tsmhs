<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Model\MediaCentre;
use Validator;
use Auth;
use DB;

class MediaCentreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $type = 0;
        if(isset($_GET['type']))
        {
            $type = $_GET['type'];
        }

        $res = MediaCentre::where('status',1);
        if($type>0)
        { 
           if($type==1){
                $res->where('type','image');
            }elseif($type==2) {
                 $res->where('type','video');
            }else{
               $res->where('status',1);
            }

        }

        $result = $res->orderBy('id', 'desc')->paginate(25); 
        $data['list']   = $result;
        return view('admin.media-centre.list',compact('data'));
    }

     public function create()
    {
         return view('admin.media-centre.add');
    }

    public function store(Request $request)
    {
        $validator  =  Validator::make($request->all(), [
         // 'title'   => 'required',
          'type'    => 'required',
          'image'   => 'nullable|mimes:jpeg,jpg,png'     
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

       /* $check = MediaCentre::where(['title'=>$request['title'],'status'=>1])->first();
        
        if(!empty($check)){
            $response['status']='error';
            $response['msg']='Title already exist';
            return $response; 
        }*/

      
        $insert_data = MediaCentre::saveData($request->all());
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
        $data['detail'] = MediaCentre::where('id',$id)->first();
        return view('admin.media-centre.edit',compact('data'));
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

        $validator  =  Validator::make($request->all(), [
          //'title'   => 'required', 
          'type'    => 'required', 
          'image'   => 'nullable|mimes:jpeg,jpg,png'     
         
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

       /* $check = MediaCentre::where(['title'=>$request['title'],'status'=>1])->first();
        
        if(!empty($check) && $check->id!=$id){
            $response['status']='error';
            $response['msg']='Title already exist';
            return $response; 
        }*/
        
        $update_data = MediaCentre::updateData($id,$request->all());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {        
      
      if($id!=''){
        $data = MediaCentre::deleteData($id);
        if($data){
          echo "success";
         }
      }
        
   }
    //class end
}

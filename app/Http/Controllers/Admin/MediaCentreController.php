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
        $hide = 0;
        $type = 0;
        if(isset($_GET['type']))
        {
            $type = $_GET['type'];
        }

        $campus = 0;
        if(isset($_GET['campus']))
        {
            $campus = $_GET['campus'];
        }

        $res = MediaCentre::where('media_centres.status',1);
        $res->join('campuses','campuses.id','=','media_centres.campus_id');
        if($type>0)
        { 
           if($type==1){
                $hide = 1;
                $res->where('media_centres.type','image');
            }elseif($type==2) {
                 $hide = 1;
                 $res->where('media_centres.type','video');
            }else{
               $res->where('media_centres.status',1);
            }

        }
        if($campus>0)
        { 
           if($campus!='all'){
                $res->where('campuses.id',$campus);
            }
        }
        $result = $res->orderBy('media_centres.id', 'desc')->select('media_centres.*','campuses.name')->paginate(25); 
        $data['list']   = $result;
        $data['hide']   = $hide;
        $data['campuses'] = DB::table('campuses')->where('status',1)->get();
        return view('admin.media-centre.list',compact('data'));
    }

     public function create()
    {
         $data['campuses'] = DB::table('campuses')->where('status',1)->get();
         return view('admin.media-centre.add',compact('data'));
    }

    public function store(Request $request)
    {
        $validator  =  Validator::make($request->all(), [
          'campus'  => 'required',
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
        $data['campuses'] = DB::table('campuses')->where('status',1)->get();
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
          'campus'   => 'required', 
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

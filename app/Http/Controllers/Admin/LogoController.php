<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Model\Logo;
use Validator;
use Auth;
use DB;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $campus = 0;
        if(isset($_GET['campus']))
        {
            $campus = $_GET['campus'];
        }

        $res = Logo::where('logos.status',1);
        $res->join('campuses','campuses.id','=','logos.campus_id');
        if($campus>0)
        { 
           if($campus!='all'){
                $res->where('campuses.id',$campus);
            }
        }
        $result = $res->orderBy('logos.id', 'desc')->select('logos.*','campuses.name')->paginate(25); 
        $data['list']   = $result;
        $data['campuses'] = DB::table('campuses')->where('status',1)->get();
        return view('admin.logo.list',compact('data'));
    }

    public function create()
    {
        $data['campuses'] = DB::table('campuses')->where('status',1)->get();
        return view('admin.logo.add',compact('data'));
    }

    public function store(Request $request)
    {
        $validator  =  Validator::make($request->all(), [
          'campus' => 'required',
          'logo'  => 'required|mimes:png'
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
       
        $insert_data = Logo::saveData($request->all());
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
        $data['detail'] = Logo::where('id',$id)->first();
        $data['campuses'] = DB::table('campuses')->where('status',1)->get();
        return view('admin.logo.edit',compact('data'));
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

        $validator   =  Validator::make($request->all(), [
          'campus' => 'required',
          'logo'  => 'nullable|mimes:png' 
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
        
        $update_data = Logo::updateData($id,$request->all());
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
      
        $logo = Logo::where('id', $id)->first();

        if($logo->logo!="")
        {
            unlink('public/images/logos/'.$logo->logo);
        }   

        $data =Logo::where('id', $id)->delete();

        if($data){
          echo "success";
         }
   }
    //class end
}

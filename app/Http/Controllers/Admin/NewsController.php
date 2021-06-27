<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Model\News;
use Validator;
use Auth;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $res = News::where('status',1);
        $res->orderBy('id','desc');
        $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.news.list',compact('data'));
    }

     public function create()
    {
         return view('admin.news.add');
    }

    public function store(Request $request)
    {
        $validator  =  Validator::make($request->all(), [
          'title'  => 'required',
          'description'  => 'required',
          'news_date'  => 'required',
          'image'  => 'required|mimes:jpeg,jpg,png'
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

        $check = News::where(['title'=>$request['title'],'status'=>1])->first();
        
        if(!empty($check)){
            $response['status']='error';
            $response['msg']='Title already exist';
            return $response; 
        }

      
        $insert_data = News::saveData($request->all());
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
        $data['detail'] = News::getData($id);
       
        return view('admin.news.views',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['detail'] = News::where('id',$id)->first();
        return view('admin.news.edit',compact('data'));
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
          'title'    => 'required',
          'description' => 'required',
          'news_date'  => 'required',
          'image'    => 'nullable|mimes:jpeg,jpg,png' 
         
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

        $check = News::where(['title'=>$request['title'],'status'=>1])->first();
        
        if(!empty($check) && $check->id!=$id){
            $response['status']='error';
            $response['msg']='Title already exist';
            return $response; 
        }
        
        $update_data = News::updateData($id,$request->all());
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
        $data = News::deleteData($id);
        if($data){
          echo "success";
         }
      }
        
   }
    //class end
}

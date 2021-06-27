<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Model\Slider;
use Validator;
use Auth;
use DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $res = Slider::where('status',1);
        $res->orderBy('id','desc');
        $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.slider.list',compact('data'));
    }

     public function create()
    {
         return view('admin.slider.add');
    }

    public function store(Request $request)
    {
        $validator  =  Validator::make($request->all(), [
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

       
        $insert_data = Slider::saveData($request->all());
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
        $data['detail'] = Slider::where('id',$id)->first();
        return view('admin.slider.edit',compact('data'));
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
        
        $update_data = Slider::updateData($id,$request->all());
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
      
        $slider = Slider::where('id', $id)->first();

        if($slider->image!="")
        {
            unlink('public/images/slider/'.$slider->image);
        }   

        $data =Slider::where('id', $id)->delete();

        if($data){
          echo "success";
         }
   }
    //class end
}

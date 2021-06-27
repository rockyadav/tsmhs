<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\User;
use App\Model\ContactUs;
use Validator;
use Auth;
use DB;

class InquiriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $res = ContactUs::where('status',1);
                $res->orderBy('id','desc');
                $result = $res->paginate(25); 
        $data['list']   = $result;
        return view('admin.inquiries.list',compact('data'));
    }

   
    public function show($id)
    {
      $data['detail'] = ContactUs::getData($id);
      return view('admin.inquiries.view',compact('data'));
    }
  
    public function destroy($id)
    {        
      if($id!=''){
        $data = ContactUs::deleteData($id);
        if($data){
          echo "success";
         }
      }
        
    }
    //class end
}

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
    public function index(Request $request)
    {  
        $res = ContactUs::where('status',1);

        $t_date = '';
        $f_date = '';
        if(isset($_GET['f_date']))
        {
            $f_date = $_GET['f_date'];
        }

        if(isset($_GET['t_date']))
        {
            $t_date = $_GET['t_date'];
        }

        if($f_date!='')
        {
          $f_date = date("Y-m-d",strtotime($f_date));
          $res->whereDate('inq_date','>=',$f_date);   
        }

        if($t_date!='')
        {
          $t_date = date("Y-m-d",strtotime($t_date));
          $res->whereDate('inq_date','<=',$t_date);   
        }

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

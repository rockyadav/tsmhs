<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Session;
use App\User; 
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use DB;
use Image;

class ProfileController extends Controller
 {
    /**
     * Create a new controller instance.
     *
     * @return void 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {  
        $id     = Auth::user()->id;
        $data['user'] = User::find($id); 
        return view('admin.profile',compact('data'));
    }

    //profile update
    public function profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name'  => 'required|string',        
            'mobile'     => 'required|min:10|max:10',      
            'rowid'      => 'required',      
            'email'      => 'required|email'      
        ]);  

        if($validator->fails()) 
        {
          return redirect()->back()->withErrors($validator)->withInput(); 
        }  
       $updata = User::findOrFail($request['rowid']);
       $updata->first_name = trim($request['first_name']);
       $updata->last_name  = trim($request['last_name']);
       $updata->email      = trim($request['email']);
       $updata->mobile     = trim($request['mobile']);

       if($request['password']!='')
       {
         $updata->password = bcrypt($request['password']);
       }
         $res = $updata->save();
       if($res)
       {
           return back()->with('success','Profile updated successfully');
       }else{
           return back()->with('error','Try again!'); 
       } 
    }


    //profile image update
    public function changeImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,jpg,png|max:10240',
            'rowid' =>'required'
        ]);

        if($validator->fails())  
        {
          return redirect()->back()->withErrors($validator)->withInput(); 
        }  
 
         $updata = User::findOrFail($request['rowid']); 
        if($request->hasFile('image')) 
          {

            if($updata->image!='')
                {
                  $path = url('public/assets/photos/'.$updata->image);
                    if(file_exists($path)){
                        @unlink($path);
                    } 
                }

            
                   
            $file = $request['image'];
            $destinationPath = 'assets/photos/';  
            $extension = $file->getClientOriginalExtension(); 
            $fileName = date('m-d-Y_hia').rand(1,99999).'.'.$extension; 
            $image_resize = Image::make($file->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path($destinationPath.'/' .$fileName));
            $updata->picture = $fileName;
            $res = $updata->save(); 

            if($res)
            {
               return back()->with('success','Image updated successfully');
            }else{
               return back()->with('error','Try again!'); 
            } 
        } 
    }


    public function websiteImage(Request $request)
    {
       return view('admin.website-image');
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|mimes:png',
            'background' => 'nullable|mimes:jpg,jpeg',
        ]);

        if($validator->fails())  
        {
          return redirect()->back()->withErrors($validator)->withInput(); 
        }  
        
        $res = 0;
        if($request->hasFile('logo')) 
        {    
            $file = $request['logo'];
            $destinationPath = public_path().'/assets/image';
            $logoName = 'new_logo.png'; 
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(200, 91);
            $image_resize->save($destinationPath . '/' . $logoName);
            $res = DB::table('website_info')->where('id',1)->update(['description'=>$logoName,'updated_at'=>date('Y-m-d H:i:s')]); 
        } 

        if($request->hasFile('background')) 
        {    
            $file = $request['background'];
            $destinationPath = public_path().'/assets/image';
            $extension = $file->getClientOriginalExtension(); 
            $fileName = 'test.jpg'; 
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(1920, 700);
            $image_resize->save($destinationPath . '/' . $fileName);
            $res = DB::table('website_info')->where('id',2)->update(['description'=>$fileName,'updated_at'=>date('Y-m-d H:i:s')]); 
        } 

        if($res)
        {
            return back()->with('success','Image updated successfully');
        }else{
           return back()->with('error','Not update.'); 
        } 
    }

// class end
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Department extends Model
{
     protected $table = 'departments';
     protected $primaryKey = 'id';


      public static function saveData($data)
    {
        $page_url = Department::craeteUrl($data['name']);
        $savedata = new Department();
        $savedata->page_url = $page_url;
        $savedata->name     = $data['name'];
        $savedata->description  = $data['description'];

        if (isset($data['image'])) {
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/departments');
            $img = Image::make($file->path());
            $img->save($destinationPath.'/'.$imageName); 
            $savedata->image = $imageName;
        }

        $res = $savedata->save();
        return $res; 
    }

    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = Department::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = Department::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Department::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }

     public static function updateStatus($id,$status){  
        $savedata = Department::find($id);
        $savedata->status   = $status;
        $res = $savedata->save();
        return $res; 
    }


    public static function updateData($id,$data)
    {   
       
        $page_url = Department::craeteUrl($data['name']);
        $savedata = Department::find($id);
        $savedata->page_url = $page_url;
        $savedata->name     = $data['name'];
        $savedata->description = $data['description'];

          if($savedata->image!="" && isset($data['image']))
            {  
             unlink('public/images/departments/'.$savedata->image);      
            }
            
            if (isset($data['image'])) {
               
                $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/departments');
                $img = Image::make($file->path());
               /* $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imageName);*/
                $img->save($destinationPath.'/'.$imageName); 
                $savedata->image = $imageName;

            }
        $res = $savedata->save();
        return $res;  
    }


    public static function craeteUrl($name)
    {
        $page_url=str_replace(' ','-', $name);
        $page_url=str_replace('.','-', $page_url);
        $page_url=str_replace('/','-', $page_url);
        $page_url=str_replace('?','-', $page_url);
        $page_url=str_replace('&','-', $page_url);
        $page_url=str_replace('%','-', $page_url);
        return strtolower($page_url);
    }

}
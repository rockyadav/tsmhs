<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Events extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        
        $page_url = Events::craeteUrl($data['title']);
        $savedata = new Events();
        $savedata->page_url = $page_url;
        $savedata->title     = $data['title'];
        $savedata->description  = $data['description'];
        $savedata->event_date   = $data['event_date'];
        $savedata->from_time   = $data['from_time'];
        $savedata->to_time   = $data['to_time'];
        $savedata->address   = $data['address'];

        if (isset($data['image'])) {
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/events');
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

 

    public static function updateData($id,$data)
    {   
       
        $page_url = Events::craeteUrl($data['title']);
        $savedata = Events::find($id);
        $savedata->page_url = $page_url;
        $savedata->title     = $data['title'];
        $savedata->description = $data['description'];
        $savedata->event_date   = $data['event_date'];
        $savedata->from_time   = $data['from_time'];
        $savedata->to_time   = $data['to_time'];
        $savedata->address   = $data['address'];


        $oldimg = $savedata->image;

          if($savedata->image!="" && isset($data['image']))
            {  
             unlink('public/images/events/'.$savedata->image);      
            }
            
            if (isset($data['image'])) {
               
                $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/events');
                $img = Image::make($file->path());
                $img->resize(270, 252);
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
            $result = Events::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = Events::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Events::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }

    public static function craeteUrl($title)
    {
        $page_url=str_replace(' ','-', $title);
        $page_url=str_replace('.','-', $page_url);
        $page_url=str_replace('/','-', $page_url);
        $page_url=str_replace('?','-', $page_url);
        $page_url=str_replace('&','-', $page_url);
        $page_url=str_replace('%','-', $page_url);
        return strtolower($page_url);
    }

    //
}

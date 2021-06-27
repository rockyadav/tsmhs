<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class MediaCentre extends Model
{
    protected $table = 'media_centres';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        
        $savedata = new MediaCentre();
        $savedata->title     = $data['title'];
        $type= $data['type'];
        $savedata->type = $type;

        if($type=='image'){

        if (isset($data['image'])) {
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/media-centre');
            $img = Image::make($file->path());
           /* $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);*/
            $img->save($destinationPath.'/'.$imageName); 
            $savedata->image = $imageName;
        }
    }elseif ($type=='video') {
       $savedata->video_link= $data['video_link'];
    }  


        $res = $savedata->save();
        return $res; 
    }

 

    public static function updateData($id,$data)
    {   
       
        $savedata = MediaCentre::find($id);
        $savedata->title     = $data['title'];
        $type= $data['type'];
        $savedata->type = $type;

        if($type=='image'){

          if($savedata->image!="" && isset($data['image']))
            {  
             unlink('public/images/media-centre/'.$savedata->image);      
            }
            
            if (isset($data['image'])) {
                $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/media-centre');
                $img = Image::make($file->path());
               /* $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$imageName);*/
                $img->save($destinationPath.'/'.$imageName); 
                $savedata->image = $imageName;
            }
        }elseif ($type=='video') {
           $savedata->video_link= $data['video_link'];  
          
        }  

        $res = $savedata->save();
        return $res;  
    }


    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = MediaCentre::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = MediaCentre::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = MediaCentre::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }



     public static function updateStatus($id,$status){  
        $savedata = MediaCentre::find($id);
        $savedata->status   = $status;
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

    //
}

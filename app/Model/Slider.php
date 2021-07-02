<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        
        $savedata = new Slider();
        $savedata->campus_id     = $data['campus'];

        if (isset($data['image'])) {
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/slider');
            $img = Image::make($file->path());
            $img->resize(1920, 716);
            $img->save($destinationPath.'/'.$imageName);
            $savedata->image = $imageName;
        }

        $res = $savedata->save();
        return $res; 
    }

 

    public static function updateData($id,$data)
    {   
        $savedata = Slider::find($id);
        $savedata->campus_id     = $data['campus'];

        $oldimg = $savedata->image;

          if($savedata->image!="" && isset($data['image']))
            {  
             unlink('public/images/slider/'.$savedata->image);      
            }
            
            if (isset($data['image'])) {
               
                $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/slider');
                $img = Image::make($file->path());
                $img->resize(1920, 716);
                $img->save($destinationPath.'/'.$imageName);
                //$img->save($destinationPath.'/'.$imageName); 
                $savedata->image = $imageName;

            }
        $res = $savedata->save();
        return $res;  
    }


    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = Slider::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = Slider::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Slider::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }

    //
}

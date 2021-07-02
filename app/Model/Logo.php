<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Logo extends Model
{
    protected $table = 'logos';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    { 
        $savedata = new Logo();
        $savedata->campus_id     = $data['campus'];

        if (isset($data['logo'])) {
            $file = Input::file('logo');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/logos');
            $img = Image::make($file->path());
            $img->resize(270, 50);
            $img->save($destinationPath.'/'.$imageName);
            $savedata->logo = $imageName;
        }

        $res = $savedata->save();
        return $res; 
    }

 

    public static function updateData($id,$data)
    {   
        $savedata = Logo::find($id);
        $savedata->campus_id     = $data['campus'];

        $path = 'public/images/logos/'.$savedata->logo;
        if(file_exists($path) && isset($data['logo']))
        {  
            unlink('public/images/logos/'.$savedata->logo);      
        }
        if (isset($data['logo'])) {
            $file = Input::file('logo');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/logos');
            $img = Image::make($file->path());
            $img->resize(270, 50);
            $img->save($destinationPath.'/'.$imageName);
            $savedata->logo = $imageName;

        }
        $res = $savedata->save();
        return $res;  
    }


    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = Logo::where('status',1)->orderBy('id','desc')->get();
        }else{
            $result = Logo::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Logo::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }

    //
}

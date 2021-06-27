<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Facilities extends Model
{
    protected $table = 'facilities';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        $page_url = Facilities::craeteUrl($data['title']);
        $savedata = new Facilities();
        $savedata->page_url = $page_url;
        $savedata->title     = $data['title'];
        $savedata->description= $data['description'];

        if (isset($data['image'])) {
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/facilities');
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

        $page_url = Facilities::craeteUrl($data['title']);
        $savedata = Facilities::find($id);
        $savedata->page_url    = $page_url;
        $savedata->title       = $data['title'];
        $savedata->description = $data['description'];

        $oldimg = $savedata->image;

          
             $path = 'public/images/facilities/'.$savedata->image;
            if(file_exists($path) && isset($data['image']))
            {  
                unlink('public/images/facilities/'.$savedata->image);      
            }
            
            if (isset($data['image'])) {
               
                $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/facilities');
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
            $result = Facilities::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = Facilities::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Facilities::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }



     public static function updateStatus($id,$status){  
        $savedata = Facilities::find($id);
        $savedata->status   = $status;
        $res = $savedata->save();
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

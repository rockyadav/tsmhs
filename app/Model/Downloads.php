<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Downloads extends Model
{
    protected $table = 'downloads';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        $savedata = new Downloads();
        $savedata->title     = $data['title'];

        if (isset($data['pdf_file'])) {
            $file = Input::file('pdf_file'); 
            $fileName = $file->getClientOriginalName(); 
            $file_extension = $file->extension(); 
            $path = 'public/downloads/'.$fileName;
            if(file_exists($path))
            {
                $fileName = time().'-'.$fileName;
            }

            $destinationPath = public_path('downloads');
            $file->move($destinationPath, $fileName);
            $savedata->file_extension =  $file_extension;
            $savedata->pdf_file = $fileName;
        }
        $res = $savedata->save();
        return $res; 
    }

 

    public static function updateData($id,$data)
    {   
       
        $savedata = Downloads::find($id);
        $savedata->title     = $data['title'];

        $path = 'public/downloads/'.$savedata->pdf_file;
        if(file_exists($path) && isset($data['pdf_file']))
        {  
            unlink('public/downloads/'.$savedata->pdf_file);      
        }
        
        if (isset($data['pdf_file'])) {
            $file = Input::file('pdf_file'); 
            $file_extension = $file->extension();
            $fileName = time().'.'.$file->extension();
            $destinationPath = public_path('downloads');
            $file->move($destinationPath, $fileName);
            $savedata->file_extension =  $file_extension;
            $savedata->pdf_file = $fileName;
        }

        $res = $savedata->save();
        return $res;  
    }


    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = Downloads::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = Downloads::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Downloads::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }



     public static function updateStatus($id,$status){  
        $savedata = Downloads::find($id);
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

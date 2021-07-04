<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        $page_url = News::craeteUrl($data['title']);
        $savedata = new News();
        $savedata->page_url = $page_url;
        $savedata->title     = $data['title'];
        $savedata->description  = $data['description'];
        $savedata->news_date   = $data['news_date'];
        $savedata->link_title   = $data['link_title'];

        if (isset($data['image'])) {
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/news');
            $img = Image::make($file->path());
           /* $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);*/
            $img->save($destinationPath.'/'.$imageName); 
            $savedata->image = $imageName;
        }

        if (isset($data['link_file'])) {
            $file = Input::file('link_file'); 
            $fileName = $file->getClientOriginalName(); 
            $file_extension = $file->extension(); 
            $path = 'images/news/'.$fileName;
            if(file_exists($path))
            {
                $fileName = time().'-'.$fileName;
            }

            $destinationPath = public_path('images/news');
            $file->move($destinationPath, $fileName);
            $savedata->link_file = $fileName;
        }

        $res = $savedata->save();
        return $res; 
    }

 

    public static function updateData($id,$data)
    {   
       
        $page_url = News::craeteUrl($data['title']);
        $savedata = News::find($id);
        $savedata->page_url    = $page_url;
        $savedata->title       = $data['title'];
        $savedata->description = $data['description'];
        $savedata->news_date   = $data['news_date'];
        $savedata->link_title  = $data['link_title'];

        if($savedata->image!="" && isset($data['image']))
        {  
            unlink('public/images/news/'.$savedata->image);      
        }
        
        if (isset($data['image'])) {
           
            $file = Input::file('image');
            $imageName = time().'.'.$file->extension();
            $destinationPath = public_path('images/news');
            $img = Image::make($file->path());
           /* $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$imageName);*/
            $img->save($destinationPath.'/'.$imageName); 
            $savedata->image = $imageName;

        }

        if($savedata->link_file!="" && isset($data['link_file']))
        {  
            unlink('public/images/news/'.$savedata->link_file);      
        }

        if (isset($data['link_file'])) {
            $file = Input::file('link_file'); 
            $fileName = $file->getClientOriginalName(); 
            $file_extension = $file->extension(); 
            $path = 'images/news/'.$fileName;
            if(file_exists($path))
            {
                $fileName = time().'-'.$fileName;
            }

            $destinationPath = public_path('images/news');
            $file->move($destinationPath, $fileName);
            $savedata->link_file = $fileName;
        }
        $res = $savedata->save();
        return $res;  
    }


    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = News::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = News::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = News::find($id);     
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

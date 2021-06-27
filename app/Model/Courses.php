<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Courses extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
          $page_url = Courses::craeteUrl($data['name']);
          $savedata = new Courses();
          $savedata->name     = ucwords(trim($data['name']));
          $savedata->page_url = $page_url;

          $savedata->department      = trim($data['department']);
          $savedata->category_id     = trim($data['category']);
          $savedata->duration        = trim($data['duration']);
          $savedata->course_fee      = trim($data['course_fee']);
          $savedata->exam_board      = trim($data['exam_board']);
          $savedata->description     = trim($data['description']);

       /* if (isset($data['image'])) {
             $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/courses');
                $img = Image::make($file->path());
                $img->save($destinationPath.'/'.$imageName); 
                $savedata->image = $imageName;
        }
*/

        $res = $savedata->save();
        return $res; 
    }

    public static function getData($id='',$url='')
    {   
        if($id=='')
        {
            $result = Courses::where('status',1)->orderBy('id','desc')->orderBy('name','asc')->get();
        }elseif($url!=''){
            $result = Courses::leftJoin('departments','courses.department','=','departments.id')
                ->select('Courses.*','departments.name department')
                ->where(['departments.page_url'=>$url,'departments.status'=>1])
                ->get();
        }else{
            $result = Courses::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Courses::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }

    public static function updateData($id,$data)
    {   
        $page_url = Courses::craeteUrl($data['name']);
        $savedata = Courses::find($id);
        $savedata->name     = ucwords(trim($data['name']));;
        $savedata->page_url = $page_url;

        $savedata->category_id     = trim($data['category']);
        $savedata->department      = trim($data['department']);
        $savedata->duration        = trim($data['duration']);
        $savedata->course_fee      = trim($data['course_fee']);
        $savedata->exam_board      = trim($data['exam_board']);
        $savedata->description     = trim($data['description']);

        $result =  $savedata->save();  
        
          if($savedata->image!="" && isset($data['image']))
            {  
             unlink('public/images/courses/'.$savedata->image);      
            }
            
            if (isset($data['image'])) {
               
                $file = Input::file('image');
                $imageName = time().'.'.$file->extension();
                $destinationPath = public_path('images/courses');
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


     public static function updateStatus($id,$status){  
        $savedata = Courses::find($id);
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

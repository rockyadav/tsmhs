<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Image;

class Campus extends Model
{
    protected $table = 'campuses';
    protected $primaryKey = 'id';
    
    public static function saveData($data)
    {
        
        $page_url = Campus::craeteUrl($data['name']);
        $savedata = new Campus();
        $savedata->page_url = $page_url;
        $savedata->name     = ucwords($data['name']);
        $savedata->address  = $data['address'];
        $res = $savedata->save();
        return $res; 
    }


    public static function updateData($id,$data)
    {   
       
        $page_url = Campus::craeteUrl($data['name']);
        $savedata = Campus::find($id);
        if($savedata->id!=2){
        $savedata->page_url = $page_url;   
        }
        $savedata->name     = ucwords($data['name']);
        $savedata->address  = $data['address'];
        $res = $savedata->save();
        return $res;  
    }


    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = Campus::where('status',1)->orderBy('id','desc')->get();
        }else{
            $result = Campus::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = Campus::find($id);     
        $result->status = 0;
        $res = $result->save();
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

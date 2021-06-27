<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';
    protected $primaryKey = 'id';

    public static function getData($id='')
    {   
        if($id=='')
        {
            $result = ContactUs::where('status',1)->orderBy('id','desc')->orderBy('title','desc')->get();
        }else{
            $result = ContactUs::where(['id'=>$id,'status'=>1])->first();
        }        
        return $result; 
    }

    public static function deleteData($id)
    {   
        $result = ContactUs::find($id);     
        $result->status = 0;
        $res = $result->save();
        return $res; 
    }

}
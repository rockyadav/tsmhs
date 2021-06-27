<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name', 'email', 'password','mobile','role','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getData($id='', $type='')
    {   
        if($id=='' && $type!=''){
            $result = User::where(['role'=>$type,'status'=>1])->get();
        }elseif($id!=''){
            $result = User::where(['id'=>$id])->first();
        }else{
            $result = User::where(['status'=>1])->get();
        }        
        return $result; 
    }
    
    public static function saveData($data)
    {
        $user               = new User;          
        $user->first_name   = trim($data['first_name']);
        $user->last_name    = trim($data['last_name']);
        $user->email        = trim($data['email']);
        $user->mobile       = trim($data['mobile']);
        $user->password     = bcrypt(trim($data['password']));
        $user->role         = $data['role'];
        return $res         = $user->save(); 
    }

    public static function updateData($id,$data)
    {
        $user               = User::find($id);
        $user->first_name   = trim($data['first_name']);
        $user->last_name    = trim($data['last_name']);
        $user->email        = trim($data['email']);
        $user->mobile       = trim($data['mobile']);
        $user->role         = $data['role'];

        if($data['password']!='')
        {
            $user->password     = bcrypt(trim($data['password']));
        }
        
        $res = $user->save(); 
        return $res;
    }

    public static function deleteData($id)
    {   
        $result = User::find($id);     
        $result->status = 0;
        $result->save();
        return $result; 
    }

    //class end
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class User_registration extends Model
{
     protected $table = 'users';
     protected $primaryKey = 'id';


    public static function updateStatus($id,$status)
    {   
        $savedata = User_registration::find($id);
        if($status==1){
              $uname = $savedata->first_name.' '.$savedata->last_name;
              $email = $savedata->email;
              $subject ='Active status';
              $msg ="Active status successfully";
              //User_registration::mailgun($email,$msg,$subject);

            }else{
              $uname = $savedata->first_name.' '.$savedata->last_name;
              $email = $savedata->email;
              $admin = DB::table('users')->where('id', '1')->select('email')->first();
              $admin_mail = $admin->email;
              $subject ='Deactive status';
              $msg = "Your status is Deactive by admin more info please contact to " .$admin_mail;
              //User_registration::mailgun($email,$msg,$subject);
            }
        $savedata->is_approved = $status;
        $savedata->save();
        return $savedata; 
    }


   public static function mailgun($email,$msg,$subject)
   {     
        $data = array(
            'to'      => $email, 
            'subject' => $subject,
            'from'    => Config::get('mail.username'),
            'html'    => $msg,
            'sendername'=> 'BCA'
        );  
        Mail::send([], $data, function($message) use ($data) {
            $message->subject($data['subject']);
            $message->from($data['from'],$data['sendername']);
            $message->to($data['to']);
            $message->setBody($data['html'], 'text/html');
        });
      
        // check for failures
        if (Mail::failures()) {
            echo 'test';die;
            return 'false'; // return response showing failed emails
        }else{
             return 'true';  
        }
    }

}
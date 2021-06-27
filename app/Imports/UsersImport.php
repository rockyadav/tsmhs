<?php
namespace App\Imports;
use App\User;
use App\Model\Country;
use App\Model\States;
use App\Model\Student_Levels;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
class UsersImport implements ToModel
{
    use Importable;
    public $datainsert;

    public function model(array $row)
    {
       $res=0;
       if($row[1]!='' && $row[1]!='Student Name' && $row[2]!='' && $row[2]!='Country Name' && $row[3]!='' && $row[3]!='State Name' && $row[4]!='' && $row[4]!='Student Login' && $row[7]!='' && $row[7]!='Level name' && $row[8]!='' && $row[8]!='Group' && (($row[9]!='' && $row[9]!='Email Id') || ($row[10]!='' && $row[10]!='Mobile1')))
       {
          $countrydata = Country::where('country_name',$row[2])->first();
          $country_id  = 0;
          if(!empty($countrydata))
          {
            $country_id   = $countrydata->id;
          }

          $statedata = States::where('state_name',$row[3])->first();
          $state_id  = 0;
          if(!empty($statedata))
          {
            $state_id   = $statedata->id;
          }

          $std_level_id = 0;
          $levels = Student_Levels::where(['name'=>$row[7],'status'=>1])->first();
          if(!empty($levels))
          {
              $std_level_id = $levels->id;
          }

          $checkUnique = User::where(['username'=>$row[4],'status'=>1])->first();

          $checkMobile = array();
          if($row[10]!='')
          {
            $checkMobile = User::where(['mobile'=>$row[10],'status'=>1])->first();
          }
          $checkEmail = array();
          if($row[9]!='')
          {
            $checkEmail = User::where(['email'=>$row[9],'status'=>1])->first();
          }

          if(empty($checkUnique) && empty($checkMobile) && empty($checkEmail))
          {
            $x++;
            $user                     =  new User();
            $user->name               = trim($row[1]);
            $user->username           = trim($row[4]);
            $user->email              = trim($row[9]);
            $user->mobile             = trim($row[10]);
            $user->alternate_mobile   = trim($row[11]);
            $user->country_id         = $country_id;
            $user->state_id           = $state_id;
            $user->std_level_id       = $std_level_id;
            $user->year_of_birth      = trim($row[5]);
            $user->age                = trim($row[6]);
            $user->age_group          = trim($row[8]);
            $user->password           = bcrypt(123456);
            $user->role               = 2;
            $user->join_referral_number = trim($row[12]);
            $res = $user->save();
            if($res)
            {
               $up = User::where('id',$user->id)->first();
               $up->my_referral_number = $up->username.''.$up->id;
               $up->save();
            }
            $this->datainsert++;
          }
       }
    }

    //end class
}
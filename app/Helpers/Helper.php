<?php 
namespace App\Helpers;
use App\Model\Student_Results;
use App\Model\Student_Answers;
use App\User;
use DB;
use Auth;
class Helper
{
public static function getTableRow($tablename="",$arrayid="")
{
    $row = DB::table($tablename)
    ->where($arrayid)
    ->first();
    return $row; 
} 

public static function getTableResultArray($tablename="",$arrayid="")
{
$row = DB::table($tablename)
->whereIn('id',$arrayid)
->get();
return $row; 
} 
public static function getTableRowOR($tablename="",$arrayid="")
{
$row = DB::table($tablename)
->where('user_id',$arrayid)
->orWhere('meeting_user_id',$arrayid)
->first();
return $row; 
}


public static function getTableResult($tablename="")
{
$result = DB::table($tablename)->get();
return $result; 
} 

public static function getFacilities()
{
$result = DB::table('facilities')->where('status',1)->get();
return $result; 
} 


public static function getTableResultByID($tablename="",$arrayid="")
{
$result = DB::table($tablename) 
->where($arrayid)
->get();
return $result; 
}

public static function getTableLastRow($tablename="",$arrayid="")
{
$result = DB::table($tablename) 
->where($arrayid)
->orderBy('id', 'desc')
->take(1)->get();

return $result; 
}

public static function getUser($id)
{
    $user = User::where('id',$id)->first();
    return $user;
}

public static function getAnswer($id,$sessionId,$userId='')
{
    if($userId=='')
    {
        $userId = Auth::user()->id;
    }
  
    $answer = Student_Answers::where(['qid'=>$id,'session_id'=>$sessionId,'uid'=>$userId])->first();
    if(!empty($answer))
    {
      if($answer->qans!='')
      {
        return $answer->qans;
      }else{
        return 'Skipped';
      }
      
    }else{
      return 'Not Attempted';
    }
}

//get section name
public static function getSection($id)
{
    $section = DB::table('sections')->where('id',$id)->first();
    return $section->name;
}

//get student last set no
public static function getLastSet($username)
{
    $prevDate = date('Y-m-d', strtotime('- 1 day'));
    $result = DB::table('users')
       ->join('student_results','student_results.uid','users.id')
       ->whereDate('student_results.created_at', $prevDate)
       ->where('student_results.type', 1)
       ->where('users.username',$username)->orderBy('student_results.id','desc')->first();
    $set_no = 'Not Attempted';
    if(!empty($result))
    {
        $set_no = 'SET-'.$result->set_no;
    }
    return $set_no;
}

//get student last 7 set 
public static function getLast7Set($username,$date)
{
    $prevDate = date('Y-m-d', strtotime('- 1 day', strtotime($date)));
    $result = DB::table('users')
       ->join('student_results','student_results.uid','users.id')
       ->whereDate('student_results.created_at','<=', $prevDate)
       ->where('users.username',$username)
       ->where('student_results.type',1)
       ->orderBy('student_results.id','desc')
       ->select('student_results.scored')
       ->limit(7)->get();
    return $result;
}

//get student exam result 
public static function getExamResult($username,$date,$exam_type)
{
    $prevDate = date('Y-m-d', strtotime($date));
    $result = DB::table('users')
       ->join('student_results','student_results.uid','users.id')
       ->whereDate('student_results.created_at','<=', $prevDate)
       ->where('users.username',$username)
       ->where('student_results.type',2)
       ->where('student_results.exam_type',$exam_type)
       ->orderBy('student_results.id','asc')
       ->select('student_results.scored')
       ->limit(2)->get();
    return $result;
}

public static function updateRank($rankArray)
{
    DB::table('users')->where('username',$rankArray['username'])->update(['actual_rank'=>$rankArray['actual_rank'],'ranking'=>$rankArray['ranking'],'trophy'=>$rankArray['trophy'],'retest'=>$rankArray['retest']]);
}

public static function getUpdateRequest()
{
        return $result = DB::table('profile_update_requests')->join('users','users.id','=','profile_update_requests.uid')->select('profile_update_requests.*','users.username as name','users.role')->where('profile_update_requests.status',0)->count();
} 

public static function getCentreId()
{
  $centre = 0;
  if(session()->has('selectedCentre'))
  {
      $centre = session()->get('selectedCentre');
  }

  return $centre;
}

public static function getExamName()
{
  $config = DB::table('configurations')->where('type','exam-name')->first();
  if(!empty($config))
  {
     return $config->description;
  }
}

//get student exam result 
public static function getLevelSection($levelId)
{
    $result = DB::table('questions')
       ->join('sections','sections.id','questions.section_id')
       ->where('questions.level_id',$levelId)
       ->where('questions.status',1)
       ->where('sections.status',1)
       ->orderBy('questions.section_id','asc')
       ->groupBy('questions.section_id')
       ->select('sections.*')
       ->get();
    if($levelId==5)
    {
      //print_r($result);die;
    }
    return $result;
}
  //class end
}
?>
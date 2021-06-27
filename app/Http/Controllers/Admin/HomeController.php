<?php

namespace App\Http\Controllers\Admin;

use App\Model\States;
use App\Model\Cities;
use App\Model\User_registration;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $title = 'Dashboard';
         
        return view('admin.dashboard', compact('title'));
    }


    public function students(Request $request)
    {
        $data = DB::table('user_registrations')
            ->join('courses', 'user_registrations.intrested_course', '=', 'courses.id')
            ->where('user_registrations.status', 1)
            ->select('user_registrations.*', 'courses.name as course_name')
            ->orderBy('user_registrations.id','DESC')
            ->paginate(15);
        $title = 'Students list';
        return view('admin.student', compact('data', 'title'));
    }

   

   

    public function checkLogin(Request $request)
    {
        $user = Auth::user();
        $u = User::findOrFail($user->id);
        if ($u->isLogin == 1) {
            if ($user->role != 2) {
                return redirect('admin/dashboard');
            }
            
            return redirect('student/dashboard');
        } elseif ($u->isLogin == 0) {
            Auth::logout();
            return redirect('login')->with('error_message', 'Your account disabled');
        }
    }

   

    public function getCity($stateId)
    {
        $cities = Cities::where('state_id', $stateId)->get();
        $options = '<option value="">City Name not Found</options>';
        if (count($cities) > 0) {
            $options = '';
            foreach ($cities as $c) {
                $options .= '<option value="' . $c->id . '">' . $c->city_name . '</options>';
            }
        }
        return $options;
    }

    public function getState($country_id)
    {
        $state = States::where(['country_id'=>$country_id,'status'=>1])->get();
        $options = '<option value="">States Name not Found</options>';
        if (count($state) > 0) {
            $options = '';
            foreach ($state as $s) {
                $options .= '<option value="' . $s->id . '">' . $s->state_name . '</options>';
            }
        }
        return $options;
    }

/* end of class*/

}

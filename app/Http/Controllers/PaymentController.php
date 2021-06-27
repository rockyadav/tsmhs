<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

  
    public function index(Request $request)
    {
        echo 'Payment process comming soon';
    }

    //class end
}
<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers\Auth;

use App\Models\Business\Utility;
use App\Models\Data\SecurityDAO;
USE App\Models\Data\UserDAO;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    function login(Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');
        
        $secDAO = new SecurityDAO();
        $func = new Utility();
        
        if(!$secDAO->comboCheck($email, $pass)){
            $func->createMsg("Email/pass combo is incorrect!", 1);
            return view('Guest/Login');
        }
        else{
            if(Session::get('ACCESS') == 1){
                return view('User/UserHome');
            }
            else if(Session::get('ACCESS') == 2){
                return view('Company/CompHome');
            }
            else if(Session::get('ACCESS') == 0){
                $ud = new UserDAO();
                if($ud->checkSuspended()){
                    return view('User/UserHome');
                }
                else{
                    return view('Guest/welcome');
                }
            }
            else if(Session::get('ACCESS') == 3){
                return view('Admin/AdminHome');
            }
        }
    }
}

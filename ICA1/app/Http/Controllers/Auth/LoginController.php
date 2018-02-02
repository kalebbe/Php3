<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use App\Models\Services\Business\SecurityService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    
    function index(Request $request){
    	$userName = $request->input('username');
    	$pass = $request->input('password');
    	
    	echo "Your username is: " . $userName . " and your password is: " . $pass . "<br>";
    	
    	$user = new UserModel($userName, $pass);
    	
    	$sec = new SecurityService();
    	$results = $sec->login($user);
    	
    	if(!$results){
    		return view('loginFailed');
    	}
    	else{
    		return view('LoginPassed2');
    	}
    }
}

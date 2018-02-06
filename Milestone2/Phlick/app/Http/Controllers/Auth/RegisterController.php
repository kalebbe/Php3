<?php

namespace App\Http\Controllers\Auth;

use App\Models\Data\UserDAO;
use App\Models\Business\SecurityService;
use App\Models\Data\SecurityDAO;
use App\Models\Business\Utility;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    function register(Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');
        $rePass = $request->input('repass');
        $fName = $request->input('first_name');
        $lName = $request->input('last_name');
        
        $user = new UserDAO();
        $func = new Utility();
        
        if($this->validator($email, $pass, $rePass)){
            if($user->register($email, $pass, $lName, $fName)){
                $func->createMsg("Account created!", 1);
                return view('Guest/Login');
            }
        }
        else{
            $func->createMsg("Login failed!", 1);
            return view('Guest/Register');
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator($email, $pass, $rePass)
    {
        $secServ = new SecurityService();
        $secDAO = new SecurityDAO();
        $func = new Utility();
                
        if(!$secServ->validateEmail($email)){
            $func->createMsg("That is not a valid email!", 1);
            return false;
        }
        else if(!$secServ->validatePassword(" ", $pass, $rePass)){
            $func->createMsg("Your password does not meet the requirements!", 1);
            return false;
        }
        else if(!$secDAO->checkExisting($email)){
            $func->createMsg("That email is already taken!", 1);
            return false;
        }
        else{
            return true;
        }
        
    }
}

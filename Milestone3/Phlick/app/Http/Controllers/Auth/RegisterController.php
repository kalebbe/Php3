<?php

namespace App\Http\Controllers\Auth;

use App\Models\Data\UserDAO;
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

    function register(Request $request){
        $email = $request->input('email');
        $pass = $request->input('pass');
        $fName = $request->input('first_name');
        $lName = $request->input('last_name');
        
        $user = new UserDAO();
        $func = new Utility();
        
        if($this->validateForm($request)){
            if($user->register($email, $pass, $lName, $fName)){
                $func->createMsg("Account created!", 1);
                return view('Guest/Login');
            }
        }
        else{
            $func->createMsg("Registration failed!", 1);
            return view('Guest/Register');
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    function validateForm(Request $request)
    {
        $secDAO = new SecurityDAO();
        $func = new Utility();

        $rules = ['email' => 'Required | Between:8,25 | email', 'pass' => 'Required | Between:8,25 | alpha_num',
            'first_name' => 'Required | Between:2,30| Alpha', 'last_name' => 'Required | Between:2,30 | Alpha'];

        $email = $request->input('pass');

        $this->validate($request, $rules);

        if(!$secDAO->checkExisting($email)){
            $func->createMsg("That email is already taken!", 1);
            return false;
        }
        else{
            return true;
        }
        
    }
}

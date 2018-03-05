<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers;

use App\Models\Data\UserDAO;
use App\Models\Business\Utility;
use App\Models\Data\SecurityDAO;
use Illuminate\Http\Request;
use App\Models\Business\SecurityService;
use Session;

class EditController extends Controller{
    private $ud, $func, $sd, $sec;

    function __construct(){
        $this->ud = new UserDAO();
        $this->func = new Utility();
        $this->sd = new SecurityDAO();
        $this->sec = new SecurityService();
    }

    function changePass(Request $request){
        if($this->sd->comboCheck(Session::get('EMAIL'), $request->input('oldpass'))){
            if($this->sec->validatePassword($request->input('oldpass'), $request->input('pass'), $request->input('repass'))){
                $hashPass = password_hash($request->input('repass'), PASSWORD_DEFAULT);
                $this->changeValue($hashPass, "users", "PASSWORD", "Password");
            }
            else{
                $this->func->createMsg("Password does not meet requirements!", 1);
            }
        }
        else{
            $this->func->createMsg("Your current password is not correct!", 1);
        }
        return view('user/EditProfile');
    }

    function changeValue($value, $table, $col, $colNorm){
        if($this->ud->changeValue($table, $col, $value)){
            $this->func->createMsg($colNorm . " has been updated!", 2);
        }
        else{
            $this->func->createMsg("Something went wrong!", 1);
        }
    }

    function changeName(Request $request){
        $this->changeValue($request->input('first_name'), "users", "FIRST_NAME", "First name");
        $this->changeValue($request->input('last_name'), "users", "LAST_NAME", "Last name");
        return view('User/EditProfile');
    }

    function changeEmail(Request $request){
        if($this->sd->checkExisting($request->input('email'))){
            $this->changeValue($request->input('email'), "users", "EMAIL", "email");
            Session::put('EMAIL', $request->input('email'));
        }
        else{
            $this->func->createMsg("That email already exists!", 1);
        }
        return view('User/EditProfile');
    }

    function changeDOB(Request $request){
        $dob = $this->func->formatDate($request->input('month'), $request->input('year'), $request->input('day'));
        $this->changeValue($dob, "profile", "DOB", "DOB");
        return view('User/EditProfile');
    }

    function changeGender(Request $request){
        $this->changeValue($request->input('gender'), "profile", "GENDER", "Gender");
        return view('User/EditProfile');
    }

    function changeEthnicity(Request $request){
        $this->changeValue($request->input('ethnicity'), "profile", "ETHNICITY", "Ethnicity");
        return view('User/EditProfile');
    }

    function changeLocation(Request $request){
        $location = $request->input('city') . ", " . $request->input('state');
        $this->changeValue($location, "profile", "LOCATION", "Location");
        return view('User/EditProfile');
    }

    function changeNumber(Request $request){
        $this->changeValue($request->input('number'), "profile", "NUMBER", "Number");
        return view('User/EditProfile');
    }

    function changeEducation(Request $request){
        $this->changeValue($request->input('education'), "profile", "EDUCATION", "Education");
        return view('User/EditProfile');
    }

    function changeJob(Request $request){
        $this->changeValue($request->input('job'), "profile", "PROFESSION", "Profession");
        return view('User/EditProfile');
    }
}
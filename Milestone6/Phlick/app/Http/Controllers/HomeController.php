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
use Session;

class HomeController extends Controller{

    function goHome(){
        if(!Session::get('ACCESS')){
            Session::flush();
            return view('Guest/welcome');
        }
        else if(Session::get('ACCESS') == 1){
            return view('User/UserHome');
        }
        else if(Session::get('ACCESS') == 2){
            return view('Company/CompHome');
        }
        else if(Session::get('ACCESS') == 3){
            return view('Admin/AdminHome');
        }
    }
}
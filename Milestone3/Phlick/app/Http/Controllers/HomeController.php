<?php

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
        else if(Session::get('ACCESS') == 3){
            return view('Admin/AdminHome');
        }
    }
}
<?php

namespace App\Http\Controllers;

use Session;

class HomeController extends Controller{

    function goHome(){
        if(!Session::get('ACCESS')){
            Session::flush();
            return view('Guest/welcome');
        }
        else if(Session::get('ACCESS') < 1){
            //add code here to inform user of suspension
        }
        else if(Session::get('ACCESS') == 1){
            return view('User/UserHome');
        }
        else if(Session::get('Access') == 3){
            return view('Admin/AdminHome');
        }
    }
}
<?php

namespace App\Http\Controllers;

use Session;

class LogoutController extends Controller
{
    function logout(){
        Session::flush();
        return view('Guest/welcome');
    }
}
<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers;

use Session;

class LogoutController extends Controller
{
    function logout(){
        Session::flush();
        return view('Guest/welcome');
    }
}
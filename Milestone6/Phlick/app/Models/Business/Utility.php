<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace app\Models\Business;

use Session;

class Utility{

    function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }
    
    function createMsg($msg, $msgType){
        Session::put('message_type', $msgType);
        Session::put('message', $msg);
    }
    
    function pageSecurity($access){
        if(Session::get('ACCESS') < $access){
            Session::flush();
            return view('welcome');
        }
    }

    function formatDate($mon, $year, $day){
		$date = $mon . " " . $day . " " . $year;
        return date("Y-m-d", strtotime($date));
    }
}
?>
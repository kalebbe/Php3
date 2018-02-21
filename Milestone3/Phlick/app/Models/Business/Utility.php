<?php 
/*
  * @authors:         Kaleb Eberhart, Mick Torres, Will Berrier
  * @Project Name:    Phlick
  * @Project Version: 1.2
  * @Module Name:     Utility.php
  * @Module Version:  1.0
  * @Date:            02/15/2018
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
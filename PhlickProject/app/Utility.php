<?php 

namespace app;

class Utility{
        
    function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
    }
    
    function createMsg($msg, $msgType){
        $_SESSION['message_type'] = $msgType;
        $_SESSION['message'] = $msg;
    }
    
    function pageSecurity($access){
        //TODO: milestone 2 (assuming)
        if(!isset($_SESSION['access']) || $_SESSION['access'] < $access){
            include('../');
            session_destroy();
            exit();
        }
    }
}
?>
<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class SecurityService extends Model{
    
    function validateEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }
    }
    
    function validatePassword($oldPass, $newPass, $rePass)
    {
        //This Regex checks to make sure the password has letters and numbers
        $alpha = preg_match('@[a-z]@', $newPass);
        $number = preg_match('@[0-9]@', $newPass);
        
        if (!$alpha || !$number || strlen($newPass) < 8 || $newPass != $rePass || $oldPass == $rePass) {
            return false;
        } else {
            return true;
        }
    }
}

?>
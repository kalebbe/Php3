<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace app\Models\Business;

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
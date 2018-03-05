<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace app\Models\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class SecurityDAO{
    private $sql;
    
    function checkExisting($email){
        $this->sql = "SELECT EMAIL FROM users WHERE EMAIL='" . $email . "'";
                
        $results = DB::select($this->sql);
        
        if(count($results) > 0){
            return false;
        }
        else{
            return true;
        }
    }
    
    function comboCheck($email, $pass){
        $this->sql = "SELECT EMAIL, PASSWORD, ACCESS FROM users WHERE EMAIL='" . $email . "'";
        $results = DB::select($this->sql);
        
        if(count($results) != 1){
            return false;
        }
        else{
            $user = DB::table('users')->where('EMAIL', $email)->value('PASSWORD');
            if(!password_verify($pass, $user)){
                return false;
            }
            else{
                $access = DB::table('users')->where('EMAIL', $email)->value('ACCESS');
                $id = DB::table('users')->where('EMAIL', $email)->value('ID');
                Session::put('ACCESS', $access);
                Session::put('EMAIL', $email);
                Session::put('ID', $id);
                return true;
            }
        }
    }
}
?>
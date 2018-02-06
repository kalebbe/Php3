<?php 

namespace app;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SecurityDAO extends Model{
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
        $this->sql = "SELECT EMAIL, PASSWORD FROM users WHERE EMAIL='" . $email . "'";
        $results = DB::select($this->sql);
        
        if(count($results) != 1){
            return false;
        }
        else{
            $user = DB::table('users')->where('EMAIL', $email)->value('PASSWORD');
            //$row = $results->fetch_assoc();
            if(!password_verify($pass, $user)){
                return false;
            }
            else{
                return true;
            }
        }
    }
}
?>
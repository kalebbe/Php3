<?php 

namespace app\Models\Data;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

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
                Session::put('ACCESS', $access);
                return true;
            }
        }
    }
}
?>
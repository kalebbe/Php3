<?php

namespace App\Models\Data;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserDAO extends Model
{
    
    private $sql;
    
    function register($email, $password, $lName, $fName){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $this->sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD)" .
            " VALUES ('" . $fName . "', '" . $lName . "', '" . $email . "', '" .
            $hashPass . "')";
        
        //Attempts to rexecute query and returns boolean
        return DB::insert($this->sql);
        
    }
}

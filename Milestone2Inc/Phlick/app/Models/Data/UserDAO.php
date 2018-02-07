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

        if(DB::insert($this->sql)){
            $id = DB::table('users')->where('EMAIL', $email)->value('ID');
            $sqlProf = "INSERT INTO profile (USER_ID) VALUE ('" . $id . "')";
            return db::insert($sqlProf);
        }
        else return false;
    }
}

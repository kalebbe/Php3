<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Models\Business;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    private $sql, $func;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    function __construct(){
        if(session_start() == PHP_SESSION_NONE){
            session_start();
        }
    }
    
    function __destruct(){
        unset($func);
    }
    
    function register($email, $password, $lName, $fName){
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $this->sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD)" .
            " VALUES ('" . $fName . "', '" . $lName . "', '" . $email . "', '" .
            $hashPass . "')";
        
        //Attempts to rexecute query and returns boolean
        return DB::insert($this->sql);
        
    }
    
    function login($email, $password){
        
    }
}

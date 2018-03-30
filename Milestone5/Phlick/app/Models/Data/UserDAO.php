<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Models\Data;


use Illuminate\Support\Facades\DB;
use App\Models\Business\Utility;
use Session;
use DateTime;

class UserDAO
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
            return DB::insert($sqlProf);
        }
        else return false;
    }

    function changeValue($table, $col, $value){
        if($table == "users") $id = "ID";
        else $id = "USER_ID";
        return DB::table($table)->where($id, Session::get('ID'))->update([$col => $value]);
    }

    function deleteAccount($id){
        DB::table('resume')->where('USER_ID', $id)->delete();
        DB::table('profile')->where('USER_ID', $id)->delete();
        return DB::table('users')->where('ID', $id)->delete();
    }

    function suspendAccount($id, $date){
        $marks = DB::table('users')->where('ID', $id)->value('MARKS');
        $sus = DB::table('users')->where('ID', $id)->value('SUS_END_DATE');
        if($sus != NULL) return false;

        $marks++;

        if($marks != 3){
            return DB::table('users')->where('ID', $id)->update(['MARKS' => $marks, 'SUS_END_DATE' => $date, 'ACCESS' => 0]);
        }
        else{
            return DB::table('users')->where('ID', $id)->update(['MARKS' => $marks, 'ACCESS' => 0, 'SUS_END_DATE' => NULL]);
        }
    }

    function checkSuspended(){
        $sus = DB::table('users')->where('ID', Session::get('ID'))->value('SUS_END_DATE');
        $now = new DateTime("now");
        $susDate = new DateTime($sus);
        if($now > $susDate){
            if(DB::table('users')->where('ID', Session::get('ID'))->update(['ACCESS' => 1, 'SUS_END_DATE' => NULL])){
                Session::put('ACCESS', 1);
                return view('User/UserHome');
            }
            else return false;
        }
        else{
            $remainder = $susDate->diff($now)->format("%d days, %h hours, and %i minutes");
            $func = new Utility();
            $func->createMsg("You are suspended for " . $remainder , 1);
            return false;
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: Kaleb
 * Date: 2/19/2018
 * Time: 11:13 PM
 */

namespace app\Models\Data;

use Illuminate\Support\Facades\DB;
use Session;

class ResumeDAO
{
    function createResume(){
        $sqlSel = "SELECT * FROM resume WHERE USER_ID='" . Session::get('ID') . "'";
        $results = DB::select($sqlSel);

        if(count($results) == 0){
            $sql = "INSERT INTO resume (USER_ID) VALUES('" . Session::get('ID') . "')";
            return DB::insert($sql);
        }
        else return true;
    }

    function changeCol($col, $value){
        if(is_array($value)){
            $value = serialize($value);
        }
        return DB::table("resume")->where('USER_ID', Session::get('ID'))->update([$col => $value]);
    }
}
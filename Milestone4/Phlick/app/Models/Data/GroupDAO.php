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
use Session;
use App\Models\Business\Utility;

class GroupDAO
{
    function deleteGroup($id){
        DB::table('groupmembers')->where('GROUP_ID', $id)->delete();
        return DB::table('groups')->where('ID', $id)->delete();
    }

    function editGroup($id, $title, $des){
        return DB::table('groups')->where('ID', $id)->update(['TITLE' => $title, 'DESCRIPTION' => $des]);
    }

    function addGroup($title, $des){
        return DB::table('groups')->insert(['TITLE' => $title, 'DESCRIPTION' => $des]);
    }

    function joinGroup($id){
        $check = DB::table('groupmembers')->where(['GROUP_ID' => $id, 'USER_ID' => Session::get('ID')])->get();
        if(count($check) > 0){
            $func = new Utility();
            $func->createMsg("You are already part of that group!", 1);
            return false;
        }
        return DB::table('groupmembers')->insert(['GROUP_ID' => $id, 'USER_ID' => Session::get('ID')]);
    }

    function leaveGroup($id){
        return DB::table('groupmembers')->where(['GROUP_ID' => $id, 'USER_ID' => Session::get('ID')])->delete();
    }
}
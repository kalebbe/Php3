<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/29/18
 */

namespace App\Models\Data;

use Illuminate\Support\Facades\DB;
use DateTime;
use Session;

class JobDAO
{
    function deleteJob($id)
    {
        return DB::table('jobs')->where('ID', $id)->delete();
    }

    function editJob($id, $title, $des, $pay, $loc)
    {
        return DB::table('jobs')->where('ID', $id)->update(['TITLE' => $title, 'DESCRIPTION' => $des,
            'COMPENSATION' => $pay, 'LOCATION' => $loc, 'DATE_POSTED' => new DateTime()]);
    }

    function addJob($title, $des, $pay, $loc)
    {
        return DB::table('jobs')->insert(['COMPANY_ID' => Session::get('ID'), 'TITLE' => $title, 'DESCRIPTION' => $des,
            'COMPANY' => Session::get('NAME'), 'COMPENSATION' => $pay, 'LOCATION' => $loc, 'DATE_POSTED' => new DateTime()]);
    }

    function addToCart($uid, $jid){
        $results = DB::table('jobcart')->where('USER_ID', $uid)->where('JOB_ID', $jid)->get();
        if(count($results) != 0){
            return false;
        }
        else{
            return DB::table('jobcart')->insert(['USER_ID' => $uid, 'JOB_ID' => $jid]);
        }
    }

    function deleteCart($uid, $jid){
        if($jid == 0){
            return DB::table('jobcart')->where('USER_ID', $uid)->delete();
        }
        else{
            return DB::table('jobcart')->where('USER_ID', $uid)->where('JOB_ID', $jid)->delete();
        }
    }
}
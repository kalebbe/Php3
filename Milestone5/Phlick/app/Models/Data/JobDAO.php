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
}
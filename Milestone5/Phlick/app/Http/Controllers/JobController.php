<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/29/18
 */

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Data\JobDAO;
use App\Models\Business\Utility;

class JobController extends Controller
{
    private $jd, $func;

    function __construct()
    {
        $this->jd = new JobDAO();
        $this->func = new Utility();
    }

    function editJob(Request $request, $id)
    {
        $title = $request->input('title');
        $des = $request->input('description');
        $pay = $request->input('pay');
        $loc = $request->input('city') . ", " . $request->input('state');

        if (!$this->jd->editJob($id, $title, $des, $pay, $loc)) {
            $this->func->createMsg("Something went wrong!", 1);
        }
        return view('User/Jobs');
    }

    function deleteJob($id)
    {
        if (!$this->jd->deleteJob($id)) {
            $this->func->createMsg("Something went wrong!", 1);
        }
        return view('User/Jobs');
    }

    function viewJob($id)
    {
        return view('User/ViewJob', ['id' => $id]);
    }

    function addJob(Request $request)
    {
        $title = $request->input('title');
        $des = $request->input('description');
        $pay = $request->input('pay');
        $loc = $request->input('city') . ", " . $request->input('state');

        if (!$this->jd->addJob($title, $des, $pay, $loc)) {
            $this->func->createMsg("Something went wrong!", 1);
        }
        return view('User/Jobs');
    }
}
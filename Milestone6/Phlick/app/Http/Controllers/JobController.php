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

    function addToCart($uid, $jid){
        if(!$this->jd->addToCart($uid, $jid)){
            $this->func->createMsg("Job is already saved!", 1);
        }
        else{
            $this->func->createMsg("Job has been saved!", 2);
        }
        return view('User/jobs');
    }

    function removeJob($uid, $jid){
        if(!$this->jd->deleteCart($uid, $jid)){
            $this->func->createMsg("Something went wrong!", 1);
        }
        return view('User/Cart');
    }

    function deleteCart($id){
        if(!$this->jd->deleteCart($id, 0)){
            $this->func->createMsg("Something went wrong!", 1);
        }
        return view('User/Home');
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

    function filterPay(Request $request, $filter){
        $pay1 = $request->input('min');
        $pay2 = $request->input('max');
        return view('User/Jobs', ['pay1' => $pay1, 'pay2' => $pay2, 'filter' => $filter]);
    }

    function filterPayNo(Request $request){
        $pay1 = $request->input('min');
        $pay2 = $request->input('max');
        return view('User/Jobs', ['pay1' => $pay1, 'pay2' => $pay2]);
    }

    function filterFull($pay1, $pay2){
        return view('User/Jobs', ['pay1' => $pay1, 'pay2' => $pay2, 'filter' => 'Full-time']);
    }

    function filterFullNo(){
        return View('User/Jobs', ['filter' => 'Full-time']);
    }

    function filterPart($pay1, $pay2){
        return view('User/Jobs', ['pay1' => $pay1, 'pay2' => $pay2, 'filter' => 'Part-time']);
    }

    function filterPartNo(){
        return view('User/Jobs', ['filter' => 'Part-time']);
    }

    function filterSeas($pay1, $pay2){
        return view('User/Jobs', ['pay1' => $pay1, 'pay2' => $pay2, 'filter' => 'Seasonal']);
    }

    function filterSeasNo(){
        return view('User/Jobs', ['filter' => 'Seasonal']);
    }

    function filterInter($pay1, $pay2){
        return view('User/Jobs', ['pay1' => $pay1, 'pay2' => $pay2, 'filter' => 'Internship']);
    }

    function filterInterNo(){
        return view('User/Jobs', ['filter' => 'Internship']);
    }
}
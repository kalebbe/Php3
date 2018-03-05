<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Data\GroupDAO;
use App\Models\Business\Utility;

class GroupController extends Controller
{
    private $gd, $func;

    function __construct(){
        $this->gd = new GroupDAO();
        $this->func = new Utility();
    }
    function editGroup(Request $request, $id){
        $title = $request->input('title');
        $des = $request->input('description');
        if(!$this->gd->editGroup($id, $title, $des))
            $this->func->createMsg("Something went wrong", 1);
        return view('User/Groups');
    }

    function addGroup(Request $request){
        $title = $request->input('title');
        $des = $request->input('description');
        if(!$this->gd->addGroup($title, $des))
            $this->func->createMsg("Something went wrong!", 1);
        return view('user/Groups');
    }

    function deleteGroup($id){
        if(!$this->gd->deleteGroup($id))
            $this->func->createMsg("Something went wrong!", 1);
        return view('User/Groups');
    }

    function search(Request $request){
        $search = $request->input('search');

        return View('User/Groups', ['search' => $search]);
    }

    function viewGroup($id){
        return view('User/ViewGroup', ['id' => $id]);
    }

    function joinGroup($id){
        if(!$this->gd->joinGroup($id))
            $this->func->createMsg("Something went wrong", 1);
        else
            $this->func->createMsg("Joined group successfully!", 2);
        return view('User/Groups');
    }

    function leaveGroup($id){
        if(!$this->gd->leaveGroup($id))
            $this->func->createMsg("Something went wrong", 1);
        else
            $this->func->createMsg("Successfully left group!", 2);
        return view('User/UserHome');
    }
}
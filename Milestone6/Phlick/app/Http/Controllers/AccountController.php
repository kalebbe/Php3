<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers;

use App\Models\Data\UserDAO;
use App\Models\Business\Utility;

class AccountController extends Controller
{
    private $ud, $func;
    function __construct(){
        $this->func = new Utility();
        $this->ud = new UserDAO();
    }

    function suspendAccount($id){
        $date = date("Y-m-d H:i:s", strtotime("+1 week"));
        if($this->ud->suspendAccount($id, $date)){
            $this->func->createMsg("Account has been suspended!", 2);
        }
        else{
            $this->func->createMsg("Failed to suspend account!", 1);
        }
        return redirect('Home');
    }

    function deleteAccount($id){
        if($this->ud->deleteAccount($id)){
            $this->func->createMsg("Account deleted successfully!", 2);
        }
        else{
            $this->func->createMsg("Failed to delete account!", 1);
        }
        return redirect('Home');
    }
}
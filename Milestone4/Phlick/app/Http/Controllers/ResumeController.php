<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data\ResumeDAO;
use App\Models\Business\Utility;

class ResumeController extends Controller
{
    private $rd, $func;

    function __construct(){
        $this->rd = new ResumeDAO();
        $this->func = new Utility();
    }
    function route($view){
        if($view == "Overview"){
            $this->rd->createResume();
            return view('User/Resume/Resume');
        }
        else if($view == "Objective"){
            return view('User/Resume/Objective');
        }
        else if($view == "Address"){
            return View('User/Resume/Address');
        }
        else if($view == "Education"){
            return view('User/Resume/Education');
        }
        else if($view == "Experience"){
            return View('User/Resume/Experience');
        }
        else if($view == "Skills"){
            return View("User/Resume/Skills");
        }

    }

    function objective(Request $request){
        if(!$this->rd->changeCol("OBJECTIVE", $request->input("objective"))){
            $this->func->createMsg("Something went wrong!", 1);
        }
        return View('User/Resume/Address');
    }

    function address(Request $request){
        $add1 = $request->input('add1');
        $add2 = $request->input('add2');
        $city = $request->input('city');
        $state = $request->input('state');
        $zip = $request->input('zip');
        if($add2 != NULL){
            $address = $add1 . ", " . $add2 . ", " . $city . ", " . $state . ", " . $zip;
        }
        else{
            $address = $add1 . ", " . $city . ", " . $state . ", " . $zip;
        }

        if(!$this->rd->changeCol("ADDRESS", $address)){
            $this->func->createMsg("Something went wrong!", 1);
        }
        return View('User/Resume/Education');
    }

    function education(Request $request){
        $school1 = $request->input('school');
        $year1 = $request->input('year');
        $major1 = $request->input('major');

        $school2 = $request->input('school2');
        $year2 = $request->input('year2');
        $major2 = $request->input('major2');

        $school3 = $request->input('school3');
        $year3 = $request->input('year3');
        $major3 = $request->input('major3');

        $eduArray = [0 => $school1 . "," . $year1 . "," . $major1];

        if($school2 != NULL && $year2 != NULL && $major2 != NULL){
            $eduArray[1] = $school2 . "," . $year2 . "," . $major2;

            if($school3 != NULL && $year3 != NULL && $major3 != NULL){
                $eduArray[2] = $school3 . "," . $year3 . "," . $major3;
            }
        }

        if(!$this->rd->changeCol("EDUCATION", $eduArray)){
            $this->func->createMsg("Something went wrong!", 1);
        }

        return View('User/Resume/Experience');
    }

    function experience(Request $request){
        $name1 = $request->input('name');
        $pos1 = $request->input('position');
        $start1 = $request->input('start');
        $sy1 = $request->input('startyear');
        $end1 = $request->input('end');
        $ey1 = $request->input('endyear');
        $des1 = $request->input('description');

        $name2 = $request->input('name2');
        $pos2 = $request->input('position2');
        $start2 = $request->input('start2');
        $sy2 = $request->input('startyear2');
        $end2 = $request->input('end2');
        $ey2 = $request->input('endyear2');
        $des2 = $request->input('description2');

        $name3 = $request->input('name3');
        $pos3 = $request->input('position3');
        $start3 = $request->input('start3');
        $sy3 = $request->input('startyear3');
        $end3 = $request->input('end3');
        $ey3 = $request->input('endyear3');
        $des3 = $request->input('description3');

        $name4 = $request->input('name4');
        $pos4 = $request->input('position4');
        $start4 = $request->input('start4');
        $sy4 = $request->input('startyear4');
        $end4 = $request->input('end4');
        $ey4 = $request->input('endyear4');
        $des4 = $request->input('description4');

        $name5 = $request->input('name5');
        $pos5 = $request->input('position5');
        $start5 = $request->input('start5');
        $sy5 = $request->input('startyear5');
        $end5 = $request->input('end5');
        $ey5 = $request->input('endyear5');
        $des5 = $request->input('description5');

        $expArray = [0 => $name1 . "," . $pos1 . "," . $start1 . "," . $sy1 . "," . $end1 . "," . $ey1 . "," . $des1];

        if($name2 != NULL && $pos2 != NULL && $start2 != NULL && $sy2 != NULL && $end2 != NULL && $ey2 != NULL && $des2
            != NULL){
            $expArray[1] = $name2 . "," . $pos2 . "," . $start2 . "," . $sy2 . "," . $end2 . "," . $ey2 . "," . $des2;

            if($name3 != NULL && $pos3 != NULL && $start3 != NULL && $sy3 != NULL && $end3 != NULL && $ey3 != NULL &&
                $des3 != NULL){
                $expArray[2] = $name3 . "," . $pos3 . "," . $start3 . "," . $sy3 . "," . $end3 . "," . $ey3 . "," . $des3;

                if($name4 != NULL && $pos4 != NULL && $start4 != NULL && $sy4 != NULL && $end4 != NULL && $ey4 != NULL
                    && $des4 != NULL){
                    $expArray[3] = $name4 . "," . $pos4 . "," . $start4 . "," . $sy4 . "," . $end4 . "," . $ey4 . "," .
                        $des4;

                    if($name5 != NULL && $pos5 != NULL && $start5 != NULL && $sy5 != NULL && $end5 != NULL && $ey5 !=
                        NULL && $des5 != NULL){
                        $expArray[4] = $name5 . "," . $pos5 . "," . $start5 . "," . $sy5 . "," . $end5 . "," . $ey5 .
                            "," . $des5;
                    }
                }
            }
        }

        if(!$this->rd->changeCol("EXPERIENCE", $expArray)){
            $this->func->createMsg("Something went wrong!", 1);
        }
        return View('User/Resume/Skills');
    }

    function skills(Request $request){
        $skill1 = $request->input('skill');
        $exp1 = $request->input('explanation');

        $skill2 = $request->input('skill2');
        $exp2 = $request->input('explanation2');

        $skill3 = $request->input('skill3');
        $exp3 = $request->input('explanation3');

        $skill4 = $request->input('skill4');
        $exp4 = $request->input('explanation4');

        $skill5 = $request->input('skill5');
        $exp5 = $request->input('explanation5');

        $skillArray = [0 => $skill1 . "," . $exp1];

        if($skill2 != NULL && $exp2 != NULL){
            $skillArray[1] = $skill2 . "," . $exp2;

            if($skill3 != NULL && $exp3 != NULL){
                $skillArray[2] = $skill3 . "," . $exp3;

                if($skill4 != NULL && $exp4 != NULL){
                    $skillArray[3] = $skill4 . "," . $exp4;

                    if($skill5 != NULL && $exp5 != NULL){
                        $skillArray[4] = $skill5 . "," . $exp5;
                    }
                }
            }
        }

        if(!$this->rd->changeCol("SKILLS", $skillArray)){
            $this->func->createMsg("Something went wrong!", 1);
        }
        return View('User/Resume/Resume');
    }
}
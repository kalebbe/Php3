<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace app\Models\Data;

use Illuminate\Support\Facades\DB;
use App\fpdf\FPDF;
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

    function generatePDF($option){
        $resume = DB::table('resume')->where('USER_ID', Session::get('ID'))->get();
        $profile = DB::table('profile')->where('USER_ID', Session::get('ID'))->get();
        $user = DB::table('users')->where('ID', Session::get('ID'))->get();
        foreach($resume as $key => $data) {
            foreach($profile as $key2 => $data2){
                foreach($user as $key3 => $data3){
                    $pdf = new Fpdf();
                    $pdf->AddPage();
                    $pdf->SetFont('Arial', 'B', 24);
                    $pdf->SetTextColor(15, 184, 240);
                    $pdf->MultiCell(0, 5, $data3->FIRST_NAME . " " . $data3->LAST_NAME);
                    $pdf->Ln();
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->setFont('Arial', '', 10);
                    $pdf->MultiCell(0, 5, $data->ADDRESS . " | " . $data2->NUMBER . " | " . $data3->EMAIL);
                    $pdf->Ln();
                    $pdf->Ln();
                    $pdf->SetTextColor(15, 184, 240);
                    $pdf->setFont('Arial', 'B', 14);
                    $pdf->Cell(40, 10, "Objective");
                    $pdf->Ln(9);
                    $pdf->SetTextColor(0, 0, 0);
                    $pdf->setFont('Arial', '', 10);
                    $pdf->MultiCell(0, 5, "-" . $data->OBJECTIVE);
                    $pdf->Ln();
                    $pdf->SetTextColor(15, 184, 240);
                    $pdf->setFont('Arial', 'B', 14);
                    $pdf->Cell(40, 10, "Education");
                    $pdf->Ln(9);
                    $pdf->SetTextColor(0, 0, 0);

                    $unsData = unserialize($data->EDUCATION);
                    for($i = 0; $i < count($unsData); $i++){
                        $arrayData = explode(",", $unsData[$i]);
                        $pdf->SetFont('Arial', 'B', 10);
                        $pdf->MultiCell(0, 5, $arrayData[0] . " | " . $arrayData[1]);
                        $pdf->SetFont('Arial', '', 10);
                        $pdf->MultiCell(0, 5, "-Degree: " . $arrayData[2]);
                        $pdf->Ln();
                    }

                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->SetTextColor(15, 184, 240);
                    $pdf->Cell(40, 10, "Skills & Abilities");
                    $pdf->Ln(9);
                    $pdf->SetTextColor(0, 0, 0);

                    $unsData = unserialize($data->SKILLS);
                    for($i = 0; $i < count($unsData); $i++){
                        $arrayData = explode(",", $unsData[$i]);
                        $pdf->SetFont('Arial', 'B', 10);
                        $pdf->MultiCell(0, 5, $arrayData[0]);
                        $pdf->SetFont('Arial', '', 10);
                        $pdf->MultiCell(0, 5, "-" . $arrayData[1]);
                        $pdf->Ln();
                    }

                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->SetTextColor(15, 184, 240);
                    $pdf->Cell(40, 10, "Experience");
                    $pdf->Ln(9);
                    $pdf->SetTextColor(0, 0, 0);

                    $unsData = unserialize($data->EXPERIENCE);
                    for($i = 0; $i < count($unsData); $i++){
                        $arrayData = explode(",", $unsData[$i]);
                        $pdf->SetFont('Arial', 'B', 10);
                        $pdf->MultiCell(0, 5, $arrayData[1] . " | " . $arrayData[0] . " | " .
                            $arrayData[2] . ", " . $arrayData[3] . " - " . $arrayData[4] . ", " .
                            $arrayData[5]);
                        $pdf->SetFont('Arial', '', 10);
                        $pdf->MultiCell(0, 5, "-" . $arrayData[6]);
                        $pdf->Ln();
                    }

                    if($option == "open"){
                        $pdf->Output();
                        exit;
                    }
                    else if($option == "download"){
                        $pdf->Output($data3->FIRST_NAME . "Resume.pdf", "D");
                    }
                }
            }
        }
    }
}
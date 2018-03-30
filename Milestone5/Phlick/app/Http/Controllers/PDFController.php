<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/04/18
 */

namespace App\Http\Controllers;

use App\Models\Data\ResumeDAO;

class PDFController extends Controller
{
    function index($option){
        $rd = new ResumeDAO();
        $rd->generatePDF($option);
    }
}
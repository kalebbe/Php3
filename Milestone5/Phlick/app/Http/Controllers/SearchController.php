<?php
/*
 * @Authors:      Kaleb Eberhart, Mick Torres, Will Bierer
 * @Project Name: Phlick Project
 * @Professor:    James Gordon
 * @Course:       CST-256
 * @Date:         03/29/18
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(Request $request)
    {
        $search = $request->input('search');
        return view('User/SearchResults', ['search' => $search]);
    }

    function searchAll($search){
        return view('User/SearchResults', ['search' => $search]);
    }

    function searchJobs($search){
        return view('User/SearchResults', ['search' => $search, 'category' => 'jobs']);
    }

    function searchComp($search){
        return view('User/SearchResults', ['search' => $search, 'category' => 'companies']);
    }

    function searchGroups($search){
        return view('User/SearchResults', ['search' => $search, 'category' => 'groups']);
    }

    function viewComp($id){
        return view('User/ViewCompany', ['id' => $id]);
    }
}
<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TestController extends BaseController{
	public function test(){
		return "Hello world from test controller";
	}
	
	public function test2(){
		echo "This is the view from the controller:\n";
		return view('helloworld');
	}
}
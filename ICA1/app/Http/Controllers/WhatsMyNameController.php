<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class WhatsMyNameController extends BaseController{
	public function index(Request $request){
		$path = $request->path();
		echo 'Path Method:' . $path;
		echo '<br>';
		
		$method = $request->isMethod('get') ? "GET" : "POST";
		echo 'GET or POST Method:' . $method;
		echo '<br>';
		
		$url = $request->url();
		echo 'URL method:' . $url;
		echo '<br>';
		
		$firstName = $request->input('firstname');
		$lastName = $request->input('lastname');
		
		echo "Your name is: " . $firstName . " " . $lastName;
		echo '<br>';
		$data = ['firstName' => $firstName, 'lastName' => $lastName];
		return view('thatswhoami')->with($data);
		
	}
}
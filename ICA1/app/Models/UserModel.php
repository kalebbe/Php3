<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model{
	private $username, $password;
	
	function __construct($user, $pass){
		$this->username = $user;
		$this->password = $pass;
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function getPassword(){
		return $this->password;
	}
}
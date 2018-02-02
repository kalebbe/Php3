<?php

namespace App\Models\Services\Data;

use App\Models\UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SecurityDAO extends Model{
	
	public function findByUser(UserModel $user){
		$username = $user->getUsername();
		$password = $user->getPassword();
		$sql = "SELECT * FROM users WHERE USERNAME='" . $username . "' AND PASSWORD='" . $password . "'";
	
		$result = DB::select($sql);
		
		if(count($result) != 0){
			return true;
		}
		else{
			return false;
		}
	}
}
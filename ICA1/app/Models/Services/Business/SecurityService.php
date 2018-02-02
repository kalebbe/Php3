<?php

namespace App\Models\Services\Business;

use App\Models\UserModel;
use App\Models\Services\Data\SecurityDAO;
use Illuminate\Database\Eloquent\Model;

class SecurityService extends Model {
	public function login(UserModel $user){
		$sec = new SecurityDAO();
		return $sec->findByUser($user);
	}
}


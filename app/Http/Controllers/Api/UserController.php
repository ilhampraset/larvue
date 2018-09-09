<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController; 
use Illuminate\Http\Request; 

use App\User; 

class UserController extends ApiController
{
	public function __construct(User $user) {
		$this->model = $user;
	}
}

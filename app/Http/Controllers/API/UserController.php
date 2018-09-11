<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController; 
use Illuminate\Http\Request; 

use App\User; 

class UserController extends ApiController
{
	public function __construct(User $user) {
		$this->model = $user;
	}
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\User; 

class AuthController extends ApiController
{
    public function login() {
    	if( Auth::attempt([
			'email' => request('email'), 
			'password' => request('password')
			]) )
		{ 
			$user = Auth::user(); 
			
            return $this->responseSuccess([
				'token' => $user->createToken(env('APP_NAME'))->accessToken
			]);
        } 
        else { 
            return $this->responseUnauthorized(); 
        } 
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
		]);

		if ($validator->fails()) { 
			return $this->responseError(['error'=>$validator->errors()]);            
		}

		$input = $request->all(); 
		$input['password'] = bcrypt($input['password']); 

		$user = User::create($input); 

		return $this->responseSuccess([
			'token'	=> $user->createToken(env('APP_NAME'))->accessToken,
			'name'	=> $user->name,
		]); 
    }

}

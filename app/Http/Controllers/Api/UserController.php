<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 

use App\User; 

class UserController extends ApiController
{
    public function index() {
        return $this->responseSuccess(User::all());
    }

    public function show($id = null) 
    { 
        $user = Auth::user();

        if( ! empty($id) ) {
            try {
                $user = User::findOrFail($id);
            }
            catch(\Exception $e) {
                return $this->responseError(['error' => 'User Not Found!']);
            }    
        }

        return $this->responseSuccess([
            'user'  => $user
        ]); 
    } 
}

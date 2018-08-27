<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \DB;
class EmployeesController extends Controller
{
    public function getData() {
  
    	return response()->json( DB::table('employees')->get());
    }
}

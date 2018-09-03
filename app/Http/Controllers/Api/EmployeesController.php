<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \DB;
use App\Employees;
class EmployeesController extends Controller
{
	public function index() {
  
    	$employees = Employees::whereNotNull('EMPLOYEE_ID');
		if(request()->has('all')){
			$employees->where('EMAIL','like','%'.request('all').'%')
			->orWhere(DB::raw("CONCAT(FIRST_NAME, ' ', LAST_NAME)"),'like','%'.request('all').'%')
			->orWhere('HIRE_DATE','like','%'.request('all').'%');
		}
		if(request()->has('name')){
			$employees->where(DB::raw("CONCAT(FIRST_NAME, ' ', LAST_NAME)"),'like','%'.request('name').'%');
		}

		return $employees->paginate(request('pageLength'));
    }
}

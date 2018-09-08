<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiController; 

use App\Employee;

class EmployeeController extends ApiController
{
	public function __construct(Employee $employee) {
		$this->model = $employee;
	}
	
	public function show($id) {
		try {
			return $this->responseSuccess([
				'employee' => Employee::findOrFail($id)
			]);
		}
		catch(\Exception $e) {
			return $this->responseError(['error' => 'Employee ID:'.$id.' Not Found!']);
		}  
	}
}

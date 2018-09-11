<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\ApiController; 

use App\Employee;

class EmployeeController extends ApiController
{
	public function __construct(Employee $employee) {
		$this->model = $employee;
	}
}

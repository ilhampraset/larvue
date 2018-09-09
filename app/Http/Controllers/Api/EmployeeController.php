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
}

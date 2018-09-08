<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 

class ApiController extends Controller
{
	public static $STATUS_OK = 200;
	public static $STATUS_ERROR = 400;
	public static $STATUS_UNAUTHORIZED = 401;
	public static $STATUS_FORBIDDEN = 403;

	protected $model;

	protected function response($status, $data) {
		return response()->json($data, $status);
	}

	protected function responseSuccess($data= [], $message= 'Success!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_OK, $data);
	}

	protected function responseError($data= [], $message= 'Error!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_ERROR, $data);
	}

	protected function responseUnauthorized($data= [], $message= 'Unauthorized!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_UNAUTHORIZED, $data);
	}

	protected function responseForbidden($data= [], $message= 'Forbidden!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_FORBIDDEN, $data);
	}


	public function index() {
        if( request()->has('search') ) {
			$search = request('search');
			$search_field = request()->has('search_field') ? request('search_field') : '';

			$this->model = $this->model->search($search, $search_field);
        }

		$order = request()->has('order') ? request('order') : $this->model->getKeyName();
		$atoz = request()->has('atoz') ? request('atoz') : 'asc';
		
		$this->model = $this->model->order($order, $atoz);

		return $this->model->paginate(
			request()->has('page_len') 
			? request('page_len')
			: 30
		);
	}
}

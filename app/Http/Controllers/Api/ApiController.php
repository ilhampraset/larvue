<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController extends Controller
{
	public static $STATUS_OK = 200;
	public static $STATUS_ERROR = 400;
	public static $STATUS_UNAUTHORIZED = 401;
	public static $STATUS_FORBIDDEN = 403;

	protected $model;

	/**
	 * BASIC RESPONSE
	 * 
	 * @param integer $status HTTP STATUS CODE
	 * @param array $data response data
	 * 
	 * @return json
	 */
	protected function response($status, $data) {
		return response()->json($data, $status);
	}

	/**
	 * SUCCESS RESPONSE (200)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Success!')
	 * 
	 * @return json
	 */
	protected function responseSuccess($data= [], $message= 'Success!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_OK, $data);
	}

	/**
	 * ERROR RESPONSE (400)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Error!')
	 * 
	 * @return json
	 */
	protected function responseError($data= [], $message= 'Error!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_ERROR, $data);
	}

	/**
	 * UNAUTHORIZED RESPONSE (401)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Unauthorized!')
	 * 
	 * @return json
	 */
	protected function responseUnauthorized($data= [], $message= 'Unauthorized!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_UNAUTHORIZED, $data);
	}

	/**
	 * FORBIDDEN RESPONSE (403)
	 * 
	 * @param array $data response data
	 * @param string $message (default:'Forbidden!')
	 * 
	 * @return json
	 */
	protected function responseForbidden($data= [], $message= 'Forbidden!') {
		$data['message'] = $message;
		return $this->response(static::$STATUS_FORBIDDEN, $data);
	}


	/**
	 * =========================
	 * PUBLIC METHODS
	 * ---------
	**/
	/**
	 * Route::get('/')
	 */
	public function index() 
	{
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

	/**
	 * Route::get('/{id}')
	 */
	public function show($id) 
	{
		try {
			return $this->model->findOrFail($id);
		}
		catch(ModelNotFoundException $e) {
			return $this->responseError([
				'error' => 'ID:'.$id.' Not Found!'
			]);
		}
		catch(\Exception $e) {
			return $this->responseError([
				'error' => $e->getMessage(),
				'trace' => $e->getTrace()
			]);
		}
	}

	/**
	 * Route::post('/')
	 */
	public function store(Request $request) 
	{
		$this->validateStoreRequest($request);

		$saved_data = $this->model->create($request->all());

		return $this->responseSuccess([
			'saved' => $saved_data
		]);
	}

	/**
	 * Route::put('/{id}')
	 */
	public function update(Request $request, $id) 
	{
		$this->validateUpdateRequest($request, $id);

		try {
			$data = $this->model->findOrFail($id);
			$data->fill($request->all());
			$saved = $data->save();

			return $this->responseSuccess([
				'saved' => $data
			]);
		}
		catch(ModelNotFoundException $e) {
			return $this->responseError([
				'error' => 'ID:'.$id.' Not Found!'
			]);
		}
		catch(\Exception $e) {
			return $this->responseError([
				'error' => $e->getMessage(),
				'trace' => $e->getTrace()
			]);
		}
	}

	/**
	 * Route::delete('/{id}')
	 */
	public function destroy($id) 
	{
		try {
			$data = $this->model->findOrFail($id);
			$data->delete();

			return $this->responseSuccess([
				'deleted' => $data
			]);
		}
		catch(ModelNotFoundException $e) {
			return $this->responseError([
				'error' => 'ID:'.$id.' Not Found!'
			]);
		}
		catch(\Exception $e) {
			return $this->responseError([
				'error' => $e->getMessage(),
				'trace' => $e->getTrace()
			]);
		}
	}


	/**
	 * =========================
	 * VALIDATORS
	 * ---------
	**/
	protected function validateStoreRequest($request) {
		\Validator::make($request->all(), [

		])->validate();
	} 

	protected function validateUpdateRequest($request, $id) {
		\Validator::make($request->all(), [

		])->validate();
	} 

}

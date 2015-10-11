<?php

namespace App\Http\Controllers\Api\V1\Admin\Product;

use App\Models\Repositories\Product\ProductInterface as Model;
use App\Http\Requests\ProductCreateRequest;
use yajra\Datatables\Datatables;
use Validator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
	/*
	 * Primary/Main model
	 */
	protected $model;
	
	protected $response;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
		$this->response = [
			'status' => 'error',
			'messages' => [
				'Unknown error occured'
			]
		];
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Datatables::of($this->model->all())->make(true);
    }


    /**
     * Create a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		// Check the request format
        if ('json' !== $request->format()) {
			$this->response['status'] = 'fail';
			$this->response['messages'][] = 'Unknown request format';
		} else {
			$data = $request->json()->all();
			
			// Check whether the data is empty
			if (!empty($data)) {
				$validator = $this->validator($data);
				
				// Check whether the data is valid
				if (false === $validator->fails()) {
					
					// Check whether the data able to be saved to database
					if ($this->model->create($data)) {
						$this->response['status'] = 'success';
						$this->response['messages'][0] = 'none';
					} else {
						$this->response['status'] = 'fail';
						$this->response['messages'][0] = 'Failed to save to database';
					}
				} else {
					$this->response['status'] = 'fail';
					$this->response['messages'] = $validator->errors()->all();
				}
			} else {		
				$this->response['status'] = 'fail';
				$this->response['messages'][0] = "Can't parse the data";
			}
		}
		
        return response($this->response)
			->header('Content-Type:', 'json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productId)
    {
		// Check the request format
        if ('json' !== $request->format()) {
			$this->response['status'] = 'fail';
			$this->response['messages'][] = 'Unknown request format';
		} else {
			$data = $request->json()->all();
			
			// Check whether the data is empty
			if (!empty($data)) {
				$validator = $this->validator($data);
				
				// Check whether the data is valid
				if (false === $validator->fails()) {
					
					// Check whether the data able to be saved to database
					if ($this->model->update($productId, $data)) {
						$this->response['status'] = 'success';
						$this->response['messages'][0] = 'none';
					} else {
						$this->response['status'] = 'fail';
						$this->response['messages'][0] = 'Failed to save to database';
					}
				} else {
					$this->response['status'] = 'fail';
					$this->response['messages'] = $validator->errors()->all();
				}
			} else {		
				$this->response['status'] = 'fail';
				$this->response['messages'][0] = "Can't parse the data";
			}
		}
		
		return response($this->response)
			->header('Content-Type:', 'json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
		// Check whether the data able to be saved to database
		if ($this->model->destroy($productId)) {
			$this->response['status'] = 'success';
			$this->response['messages'][0] = 'none';
		} else {
			$this->response['status'] = 'fail';
			$this->response['messages'][0] = 'Failed to delete data';
		}
				
		return response($this->response)
			->header('Content-Type:', 'json');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'code' => 'required|max:255|unique:products',
        ]);
    }
}

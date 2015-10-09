<?php

namespace App\Http\Controllers\Admin\Store;

use App\Models\Repositories\Store\StoreInterface as Model;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreEditRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
	/*
	 * Primary/Main model
	 */
	protected $model;
	
	/*
	 * Base view path
	 */
	protected $view;
	
	/*
	 * 
	 * Base language path
	 */
	protected $lang;
	
	/* 
	 * This controller route
	 */
	 protected $route;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
		$this->view = 'admin.store.edit';
		$this->lang = 'responses.store';
		$this->route = 'store';
	}
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $store = $this->model->all()->take(1);
        
        return view($this->view)
	        ->with('store', $store[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditRequest $request, $id)
    {
        if ($this->model->update($id, $request->all())) {
            $response['status'] = 'success'; // http 200
            $response['msg'] = \Lang::get("{$this->lang}.update.success");
        } else {
            $response['status'] = 'danger';
            $response['msg'] = \Lang::get("{$this->lang}.update.fail");
        }

        return redirect("{$this->route}/settings")->with('response', $response);
    }
}

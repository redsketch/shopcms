<?php

namespace App\Http\Controllers\Admin\Store;

use App\Models\Repositories\Store\StoreInterface as Model;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreEditRequest;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
	protected $model;
	protected $view;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
		$this->view = 'admin.store.edit';
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
        $this->model->update($id, $request->all());
    }
}

<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Repositories\Product\ProductInterface as Model;
use yajra\Datatables\Datatables;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
		$this->view = 'admin.product';
		$this->lang = 'responses.product';
		$this->route = 'products';
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("{$this->view}.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function productList()
    {
		return Datatables::of($this->model->all())->make(true);
	}
}

<?php
namespace App\Composers;

use App\Models\Repositories\Store\StoreInterface as Model;

/**
 * 
 * @author Risza
 */
class SiteProperties
{
	protected $store;
	
	public function __construct(Model $model)
	{
		$this->store = $model->find(1);
	}
	
	public function compose($view)
	{
		$view->with('site', $this->store);
	}
}

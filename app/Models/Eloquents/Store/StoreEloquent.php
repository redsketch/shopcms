<?php
namespace App\Models\Eloquents\Store;

use App\Models\Repositories\Store\StoreInterface;
use App\Models\Eloquents\Entities\Store\Store as Model;
use App\Models\Eloquents\Crud;

/**
 *
 * @author risza
 */
class StoreEloquent extends Crud implements StoreInterface
{
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
}

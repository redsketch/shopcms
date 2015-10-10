<?php
namespace App\Models\Eloquents\Product;

use App\Models\Repositories\Product\ProductInterface;
use App\Models\Eloquents\Entities\Product\Product as Model;
use App\Models\Eloquents\Crud;

/**
 *
 * @author risza
 */
class ProductEloquent extends Crud implements ProductInterface
{
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
}

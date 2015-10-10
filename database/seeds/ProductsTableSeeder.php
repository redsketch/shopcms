<?php

use Illuminate\Database\Seeder;
use App\Models\Repositories\Product\ProductInterface as Model;

class ProductsTableSeeder extends Seeder
{
    protected $model;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
	
	public function run()
	{
		DB::table('products')->delete();
		
		factory(App\Models\Eloquents\Entities\Product\Product::class, 50)->create();
	}
}

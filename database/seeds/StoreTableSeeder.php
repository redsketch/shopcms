<?php

use Illuminate\Database\Seeder;
use App\Models\Repositories\Store\StoreInterface as Model;

class StoreTableSeeder extends Seeder
{
	protected $model;
	
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
	
	public function run()
	{
		DB::table('store')->delete();
		
		$this->model->create(
			[
				'name' => 'Shop CMS',
				'address' => 'Soon',
				'email' => 'contact@shopcms.com',
				'phone1' => '1234567',
				'phone2' => '1234568'
			]
		);
	}
}

<?php
namespace App\Models;

use App\Models\Repositories\Store\StoreInterface;

/**
 * 
 * @author Risza
 */
class SiteProperties
{
	protected $store;
	
	public function __construct(StoreInterface $store)
	{
		$this->store = $store->find(1);
		return $this->properties();
	}
	
	public function properties()
	{
		return $this->store;
	}
}

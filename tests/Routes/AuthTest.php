<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;

class AuthTest extends TestCase
{
	use WithoutMiddleware;
	
    /**
     * Test whether auth/login is exists.
     *
     * @return void
     */
    public function testTheAuthRouteIsExists()
    {
        $this->visit('auth/login')->see('Shopte');
    }
}

<?php

//namespace Tests\Feature;
namespace Restserver\Test;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiRequestTest extends TestCase
{
	
    /**
     * Request test items
     *
     * @return void
     */
    public function testRequestItems()
    {
        $response = $this->get('/api/items');

        $response->assertStatus(200);
    }
	
	/**
     * Request test request get items available
     *
     * @return void
     */
    public function testRequestItemsAvailable()
    {
        $response = $this->get('/api/items/available');

        $response->assertStatus(200);
    }
	
	/**
     * Request test get items available with amount > 5
     *
     * @return void
     */
    public function testRequestItemsAvailableAmount()
    {
        $response = $this->get('/api/items/available/5');

        $response->assertStatus(200);
    }
	
	/**
     * Request test get items unavailable with amount = 0
     *
     * @return void
     */
    public function testRequestItemsUnavailable()
    {
        $response = $this->get('/api/items/unavailable');

        $response->assertStatus(200);
    }
	
	/**
     * Request test show item id = 3
     *
     * @return void
     */
    public function testRequestItemId3()
    {
        $response = $this->get('/api/items/3');

        $response->assertStatus(200);
    }
	
	/**
     * Request test edit item id = 3
     *
     * @return void
     */
    public function testRequestItemEditId3()
    {
        $response = $this->get('/api/items/3/edit');

        $response->assertStatus(200);
    }
	
	/**
     * Request test create new item
     *
     * @return void
     */
    public function testRequestCreateItem()
    {
		$response = $this
					->json('POST', '/api/items', [
						'name' => 'Produkt dodany przez test PHPUnit', 
						'amount' => 0
					]);

        $response->assertStatus(200);
    }
	
	/**
     * Request test update item id = 6
     *
     * @return void
     */
    public function testRequestUpdateItem()
    {
		$response = $this
					->json('PUT', '/api/items/6', [
						'name' => 'Produkt zostal dodany i zaktualizowany przez test PHPUnit', 
						'amount' => 0
					]);

        $response->assertJson([
                'message' => 'Items updated.',
				'updated' => true
            ]);
    }
	
	/**
     *  Request test try delete does not exist item id = 50
     *
     * @return void
     */
    public function testRequestItemDeleteId50()
    {
        $response = $this->delete('/api/items/50');
        $response->assertJson([
                'error' => true,
				'message' => 'there is no such items to be removed'
            ]);
    }
}

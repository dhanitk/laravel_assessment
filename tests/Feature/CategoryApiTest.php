<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testReadData()
    {
        $response = $this->get('/api/category');
        $response->assertStatus(200);
    }
}

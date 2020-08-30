<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/rest/1');

        $response->assertStatus(200);
    }
}

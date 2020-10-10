<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RestTest extends TestCase
{
    /**
     * A basic feature test show.
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->get('/rest/1');

        $response->assertStatus(200);
    }

//    public function testPost()
//    {
//        $response = $this->post('/rest/storeapi',[
//            'message' => 'aaa',
//            'url' => 'aaa.com'
//        ]);
//
//        $response->assertStatus(200);
//    }
}

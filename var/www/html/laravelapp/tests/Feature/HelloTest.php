<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HelloTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHello()
    {
        //ダミーで利用するデータ
        factory(User::class)->create([
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);
        factory(User::class, 10)->create();

        $this->assertDatabaseHas('users', [
            'name' => 'AAA',
            'email' => 'BBB@CCC.com',
            'password' => 'ABCABC',
        ]);

        //ダミーで利用するデータ
        factory(User::class)->create([
            'name' => 'XXX',
            'email' => 'YYY@ZZZ.com',
            'password' => '123',
        ]);
        factory(User::class, 10)->create();

        $this->assertDatabaseHas('users', [
            'name' => 'XXX',
            'email' => 'YYY@ZZZ.com',
            'password' => '123',
        ]);



        //▼===== ルート情報テスト =====▼
//        $response = $this->get('/');
//        $response->assertStatus(200);
//
//        $response = $this->get('/hello');
//        $response->assertStatus(302);
//
//        $user = factory(USER::class)->create();
//        $response = $this->actingAs($user)->get('/hello');
//        $response->assertStatus(200);
//
//        $response = $this->get('/no_route');
//        $response->assertStatus(404);
        //▲===== ルート情報テスト =====▲

        //▼===== 変数テスト =====▼
//        $this->assertTrue(true);
//
//        $arr = [];
//        $this->assertEmpty($arr);
//
//        $msg = 'Hello';
//        $this->assertEquals('Hello', $msg);
//
//        $n = random_int(0, 100);
//        $this->assertLessThan(100, $n);
        //▲===== 変数テスト =====▲
    }
}

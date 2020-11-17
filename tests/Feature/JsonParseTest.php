<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JsonParseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/engine/bitcoin/get-data');
        $response->assertJson(
            [
                "USD"=>["symbol"=>"$"],
                "TWD"=>["symbol"=>"NT$"]
            ]
        );
        $response->assertStatus(200);
    }
}

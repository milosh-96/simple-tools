<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TipsTest extends TestCase
{

    /** @test */
    public function checkDoesEndpointWork()
    {
        $response = $this->get('/tests');


        $response->assertStatus(200);
    }
}

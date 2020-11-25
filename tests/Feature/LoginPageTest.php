<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function frontendTest()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/auth/account/login');
        $response->assertSee("Login");
        $response->assertSee("Password");
        $response->assertSee("Email");
        $response->assertSee("Your email address");
        $response->assertSee("Your password");
        $response->assertSee("Login");
        $response->assertSee("Forgot password?");
        $response->assertStatus(200);
    }
}

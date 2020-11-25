<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationPageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test */
    public function frontendTest()
    {
        $response = $this->get('/auth/account/register');
        $response->assertStatus(200);
        $response->assertSee([
            "Register",
            "User Name",
            "Email Address",
            "Password",
            "Register"
        ]);
        $response->assertSee([
            "Your Email Address",
            "Your Password",
            "Your User Name",
            "Confirm password by typing it again."
        ]);
    }
}

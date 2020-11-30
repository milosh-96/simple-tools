<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;
class EditProfilePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function allFieldsPresent()
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('profile.edit'));

        $response->assertStatus(200);

        $this->be(User::first());

        $response->assertSee("User Name");
        $response->assertSee("You cannot edit your user name.");

        $response->assertSee("Name");

        $response->assertSee("Email");
        $response->assertSee("You must confirm new email.");

        $response->assertSee("Name");

        $response->assertSee("To reset password go to Edit password page.");

    }
}

<?php

namespace Tests\Feature\Questions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class SingleQuestionPageTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function pageWorks() {
        $this->withoutExceptionHandling();
        $response = $this->get('/questions/question/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function ensureAllElementsAreThere() {
        $this->withoutExceptionHandling();
        $response = $this->get('/questions/question/1');

        $response->assertSee("Question Title");

        $response->assertSee("Question Description");

        $response->assertSee("Date Time");
        $response->assertSee("By User");
        $response->assertSee("Yes");
        $response->assertSee("No");

        $response->assertSee("Comments");

    }

   
}

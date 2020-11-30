<?php

namespace Tests\Feature\Questions;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class StoreQuestionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testStoreAction()
{
    $this->withoutExceptionHandling();
    Session::start();
    $user = new User(array('name' => 'John'));
    $this->be($user);
    $response = $this->call('POST', 'questions', array(
        '_token' => csrf_token(),
        'choices'=>array("a","b"),
        'title'=>'milos',
        'description'=>'aa',
    ));
    $this->assertEquals(302, $response->getStatusCode());
    
}
}

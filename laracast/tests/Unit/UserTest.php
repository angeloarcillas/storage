<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{

        use RefreshDatabase;
    public function user_can_have_team()
    {
        // $this->withoutExceptionHandling(); //remove if test == ok    

        $user = factory('App\User')->create();
        $user->team->create(['name'=>'Acme']);
        $this->assertEquals('Acne',$user->teams->name);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}

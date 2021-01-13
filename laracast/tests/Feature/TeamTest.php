<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * php artisan make:test //testing
 * php artisan make:test UserTest --unit //unit testing
 * .env.testing //testing env
 * phpunit.xml //overide env
 */
class TeamTest extends TestCase
{
    use RefreshDatabase; //refresh to original db state
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test */
     public function user_can_create_team()
    {
        // $this->withoutExceptionHandling(); //remove if test == ok    

        $this->actingAs(factory('App\User')->create());
        $attributes = ['name'=>'Acme'];
        $this->post('/teams',$attributes);
        $this->assertDatabaseHas('teams',$attributes);
    }
    
    public function guest_cant_create_team()
    {
        $this->post('/teams')->assertRedirect('/login');
    }

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

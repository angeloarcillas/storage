<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Carbon\Carbon;
use App\Models\Author;

class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_author_store()
    {
        $this->withoutExceptionHandling();
        $this->post('/authors', [
          'name' => 'Auth name',
          'dob' => '01/01/2001'
          ]);
        $author = Author::all();
        $this->assertCount(1, $author);
        $this->assertInstanceOf(Carbon::class, $author->first()->dob);
        // format dob using Carbon
        $this->assertEquals('1988/14/05', $author->first()->dob->format('Y/d/m'));
    }
}

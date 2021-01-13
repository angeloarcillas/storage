<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_store_to_library()
    {
        // more verbose error
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'title',
            'author' => 'admin'
        ]);

        // // assert success response
        // $response->assertSuccessful();

        // assert expected count of book
        $this->assertCount(1, Book::all());
        $book = Book::first();
        $response->assertRedirect('/books/'. $book->id);
    }

    public function test_title_is_required()
    {
        $response = $this->post('/books', [
            'title' => '',
            'author' => 'admin'
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_author_is_required()
    {
        // @store
        $response = $this->post('/books', [
            'title' => 'foo',
            'author' => ''
        ]);

        $response->assertSessionHasErrors('author');
    }

    public function test_book_update()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'title',
            'author' => 'author'
        ]);


        // @update
        $response = $this->patch('/books/'.Book::first()->id, [
            'title' => 'new title',
            'author' => 'new author'
            ]);

        $book = Book::first();
        $this->assertEquals('new title', $book->title);
        $this->assertEquals('new author', $book->author);

        $response->assertRedirect('/books/'.$book->fresh()->id);
    }

    public function test_book_delete()
    {
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'title',
            'author' => 'admin'
        ]);

        $book = Book::first();
        // @delete
        $response = $this->delete('/books/'.$book->id);
        $this->assertCount(0, Book::all());
        $response->assertRedirect('/books');
    }
}

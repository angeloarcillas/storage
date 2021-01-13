<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function store(Request $request)
    {
        $book = Book::create(
            $this->validateRequest($request)
          );
        return redirect($book->path('show'));
    }

    public function update(Request $request, Book $book)
    {
        $book->update($this->validateRequest($request));
        return redirect($book->path('show'));
    }

    public function destroy(Book $book)
    {
        $book->delete($book);
        return redirect('/books');
    }

    private function validateRequest(Request $request) {
        return $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }
}

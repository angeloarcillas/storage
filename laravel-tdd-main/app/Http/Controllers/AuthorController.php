<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    //
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'dob' => 'required'
        ]);
        Author::create($attributes);
    }
}

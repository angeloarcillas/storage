<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
    public function index()
    {
        return view('welcome',[
            'foo' => 'foobar',
            'tasks' => ['task 1','task 2','task 3']
        ]);
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    public function show()
    {
        //
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }
    
    public function destroy()
    {
        //
    }
}

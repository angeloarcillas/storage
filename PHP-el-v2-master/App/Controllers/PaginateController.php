<?php

namespace App\Controllers;

class PaginateController
{
    public function index()
    {
        $db = new \Core\Database\QueryBuilder(APP['database']);
        $paginate = $db->paginate("users");

        return view("users/index", $paginate);
    }

    /**
     *
     */
    public function create()
    {
    }

    /**
    *
    */
    public function store()
    {
    }

    /**
    *
    */
    public function show()
    {
    }

    /**
    *
    */
    public function edit()
    {
    }

    /**
    *
    */
    public function update()
    {
    }

    /**
    *
    */
    public function destroy()
    {
    }
}

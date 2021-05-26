<?php

class UsersController
{
    public function index()
    {
       $users = User::getAllUsers($table);
       return view('users/index',compact('users'));
    }
}

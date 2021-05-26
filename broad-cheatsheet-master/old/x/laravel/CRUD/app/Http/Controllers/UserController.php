<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Scholar;

class UserController extends Controller
{
    public function index()
  {
    $users = User::paginate(1);

    return view('index', compact('users'));
  }

  // public function index()
  // {
  //   $users = Scholar::paginate(1);
  //
  //   return view('index', compact('users'));
  // }
}

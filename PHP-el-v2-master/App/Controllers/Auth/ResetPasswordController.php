<?php
namespace App\Controllers\Auth;

class ResetPasswordController
{
  public function showResetForm($token)
  {
    if ($token !== Auth::verifyToken()) {
      return view("error/401")
      
    }
    return view("auth/reset");
  }
  function
}

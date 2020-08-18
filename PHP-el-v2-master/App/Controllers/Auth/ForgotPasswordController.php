<?php
namespace App\Controllers\Auth;

use Core\Request;
use App\Models\Auth;
class ForgotPasswordController
{
  public function showRequestResetForm()
  {
    return view("auth/forgot");
  }

  public function sendEmailResetLink()
  {
    $request = Request::request();
    $email = $request['email'];

    if (!Auth::validateEmail($email)) {
      throw new \Exception("Email Not Found");
    }

    Auth::sendResetLink($email);
    redirect("success");
  }
}

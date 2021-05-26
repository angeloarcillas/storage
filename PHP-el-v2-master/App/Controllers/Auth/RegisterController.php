<?php
namespace App\Controllers\Auth;

use Core\Request;
use App\Models\Auth;
use Exception;

class RegisterController
{
    public function showRegistrationForm()
    {
        return view("auth/register");
    }

    public function register()
    {
        $request = Request::request();
        $username = $request['username'];
        $password = $request['password'];
        $confirmPassword = $request['confirmPassword'];
        
        if ($password !== $confirmPassword) {
            $_SESSION['msg']= ['error' => "password and confirm password mismatch"];
            redirect("auth/register");
        }

        if (Auth::validateUsername($username)) {
            $_SESSION['msg']= ['error' => "username aleady exist"];
            redirect("auth/register");
        }
        
        if (Auth::register($username, $password) && Auth::sendVerification($username)) {
            $_SESSION['msg']= ['success' => "Success"];
            redirect("auth/register");
        }

        throw new Exception("Error processing request");
    }


    public function resendVerifyEmail($email)
    {
        // USE AJAX
        if (Auth::sendVerification($email)) {
            $_SESSION['msg']= ['success' => "Success"];
        };
        throw new Exception("Error processing request");
    }
}

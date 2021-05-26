<?php
namespace App\Controllers\Auth;

use Core\Request;
use App\Models\Auth;

class LoginController
{
    public function showLoginForm()
    {
        return view("auth/login");
    }

    public function login()
    {
        $request = Request::request();
        $username = $request['username'];
        $password = $request['password'];
        $rememberMe = $request['rememberMe'] ?? null;

        if (empty($username) || empty($password)) {
            $_SESSION["msg"]= ["error" => "username and password is required"];
            redirect("auth/login");
        }

        // add time left
        if (isset($_SESSION["auth"]["halt"]) && (time() - $_SESSION["auth"]["halt"] < 10)) {
            $_SESSION["msg"]= ["error" => "try again after 5mins"];
            redirect("auth/login");
        }
        
        if (!Auth::login($username, $password)) {
            $_SESSION["msg"]["error"] = "Incorrect username or password {$_SESSION["auth"]["attempt"]}";
            $this->attempt();
            redirect("auth/login");
        }
    
        if (isset($rememberMe)) {
            // set cookie
            echo $rememberMe;
            exit;
        }

        return view("home");
    }

    public function logout()
    {
        if (!Auth::logout()) {
            throw new \Exception("Error Processing Request");
        }

        session_unset();
        session_destroy();

        redirect("about");
    }

    public function attempt(): void
    {
        $_SESSION["auth"]["attempt"]++;
        if (isset($_SESSION["auth"]["attempt"]) && $_SESSION["auth"]["attempt"] >= 3) {
            $_SESSION["msg"]["error"] = "Too many attemps, try again after 5mins";
            $_SESSION["auth"]["halt"] = time();
            unset($_SESSION["auth"]["attempt"]);
        }
    }
}

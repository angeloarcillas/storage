<?php
namespace App\Models;

use \Exception;
use Core\Database\QueryBuilder;

class Auth extends QueryBuilder
{
    public static function login($username, $password)
    {
        $db = new QueryBuilder(APP['database']);
        $sql = "SELECT `username`, `password` FROM users WHERE `username` = ? LIMIT 1";
        $user = $db->querySelect($sql, [$username]);

        if ($user) {
            return password_verify($password, $user->password);
        }
     
        return false;
        // throw new Exception("username doesnt exist");
    }
    public static function register($username, $password)
    {
        $db = new QueryBuilder(APP['database']);
        $sql = "INSERT INTO users (`id`, `username`, `password`) VALUES (?, ?, ?)";
        $id = static::getID();
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $db->query($sql, [$id, $username, $password]);
    }
    public static function validateUsername($username)
    {
        $db = new QueryBuilder(APP['database']);
        $sql = "SELECT `username` FROM users WHERE `username` = ? LIMIT 1";
        return $db->querySelect($sql, [$username]);
    }

    public static function sendVerification($email)
    {
        //validate fake email
        //clean headers
        //create token
        //send mail
        return true;
    }

    public static function validateEmail($email)
    {
        $db = new QueryBuilder(APP['database']);
        $sql = "SELECT `email` FROM users WHERE email = ? LIMIT 1";
        return $db->querySelect($sql, [$email]);
    }

    public function sendResetLink($email)
    {
        //validate fake email
        //clean headers
        //create token
        //send mail
        return true;
    }

    public static function logout()
    {
        // $db = new QueryBuilder(APP['database']);
        // $sql = "UPDATE users SET `logged_out` = ? WHERE `id` = ?";
        // $time = date("Y-m-d H:i:s");
        // return $user = $db->querySelect($sql, [$time, $id]);
        return true;
    }
    private static function getID()
    {
        $db = new QueryBuilder(APP['database']);
        $sql = "SELECT `id` FROM users ORDER BY `id` DESC LIMIT 1";
        $user = $db->querySelect($sql);
  
        if (!$user->id) {
            return "Acct-10000";
        }

        $hold = explode("-", $user->id);
        $id = $hold[1]+1;

        return "Acct-{$id}";
    }
}

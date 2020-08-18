<?php
/**
 * Session
 */
session_start(); // start session

// check session status
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

$_session['id'] = "foo"; // set session

unset($_SESSION['id']); // unset $_SESSION['id']

/**
 * Cookie
 */

// Set cookie
setcookie("key", "value", time() + 60); // expire in 1 min

// Delete setcookie
setcookie("key", "value", time() - 1); // delete cookie

setrawcookie() // w/out url encoding
echo $_COOKIE["key"]; // show cookie
unset($_COOKIE["key"]); // unset cookie

if(count($_COOKIE) > 0) {
    echo "enabled";
} else {
    echo "disabled";
}


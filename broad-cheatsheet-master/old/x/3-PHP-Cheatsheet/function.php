<?php

fn ($x) => $x + 1; // arrow function

/**
 * Generate random number
 */
mt_rand();

/**
 * Redirect
 */

//redirect using echo
echo "<meta http-equiv='refresh' content='5;url=index.php'>";

//redirect using header
header('location:index.php?q=php');

// return included files
get_included_files();


/**
 * Identifies polluted cookies and returns an array of them
 * or false if none present. Requires $_SERVER['HTTP_COOKIE']
 **/
function rogueCookies($httpCookie)
{
    $hold = explode(';', $httpCookie);
    $affected  = [];
  
    foreach ($hold as $value) {
        $value  = trim($value);
        $value = substr($value, 0, strpos($value, '=', 0));
  
        // Null byte check
        if (strpos($value, '%00', 0) !== false) {
            $affected[] = $value;
            continue;
        }
  
        // Rogue [ check
        if (substr_count($value, '[') != substr_count($value, ']')) {
            $affected[] = $value;
            continue;
        }
    }
  
    if (count($affected) > 0) {
        return $affected;
    }
  
    return false;
}
  
$rogue = rogueCookies("h=1; user[id=2; user_id=1; h%00x=2");

// Do setcookie NULL for each entry in $x here.
if (!$rogue) 
    foreach ($rogue as $value) 
    setcookie($value, NULL);
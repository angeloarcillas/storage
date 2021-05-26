<?php

/**
 * Password hashing
 * 
 * @param string $password
 */
$hashed = password_hash($password, PASSWORD_DEFAULT);

// compare password and hashed password :bool
password_verify($password, $hashed);
password_get_info($hashed);

/**
 * Clean input values
 */

function sanitize($data)
{
    //remove special characters (!@#$%^&*()_+{}|:"<>?[]\';/.,")
    $value = preg_replace('/[^-a-zA-Z0-9@ ]/', "", strip_tags($data));
    return $value;
}

/**
 * Filter function
 */

FILTER / SANITIZE
htmlspecialchars
filter_val
 -FILTER_SANITIZE_EMAIL => remove invalid char from email address
 -FILTER_SANITIZE_ENCODE => encode into valid url
 -FILTER_SANITIZE_MAGIC_QUOTES => escape embeded qoutes
 -FILTER_SANITIZE_NUMBER_FLOAT => remove chars except digits/floats symbol
 -FILTER_SANITIZE_NUMBER_INT => remove chars except digits/integer
 -FILTER_SANITIZE_SPECIAL_CHARS => remove special chars
 -FILTER_SANITIZE_FULL_SPECIAL_CHARS => same as htmlspecialchars()
 -FILTER_SANITIZE_STRING => remove html tag
 -FILTER_SANITIZE_STRIPPED => remove html tag
 -FILTER_SANITIZE_URL => remove invalid url char
 -FILTER_UNSAFE_RAW => default

 -FILTER_VALIDATE_BOOLEAN => valid boolean
 -FILTER_VALIDATE_EMAIL => valid email
 -FILTER_VALIDATE_FLOAT => valid float
 -FILTER_VALIDATE_INT => valid int
 -FILTER_VALIDATE_IP => valid ip address
 -FILTER_VALIDATE_MAC => valid mac address
 -FILTER_VALIDATE_REGEX => matched specified regex
 -FILTER_VALIDATE_URL => valid url
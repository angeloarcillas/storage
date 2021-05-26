<?php

addslashes()
 -Adds an escape character (backslash) in front of single quote, double quote, backslash, and NULL characters.
chop - remove white space from string
htmlentities  - html codes into html tags
htmlspecialchars  - html tags embedded in string into html codes
ucfirst - uppercase first char of string
lcfirst  - lowercase first char on string
ltrim - remove white space from start of string
money_format  - monetary string value into currency format
nl2br - new line to <br>
number_format - specify format to display number value
rtrim - remove all whitespace char from the end of string
str_replace  - replace string into another string
strip_tags - remove html/php tags from string
strtolower  - string to lowercase
strtoupper  - string to uppercase
trim  - remove all whitespace char from start to end of string

STRING FUNCTION
is_bool - boolean
is_float - float
is_int - integer
is_null - null
is_numeric - valid number or numeric string 1/"1"

str_word_count - return number of words in a string/array of words
strcasecmp - case insensitive comparison
strcmp - 2 strings comparison
strlen - string character length
strncmp - first n charater of 2 strings comparison



HTTP COOKIES TYPE
HttpOnly - http only not js
Persistent - expires sat specific time
SameSite - only sent in request from same origin as target domain
Secure - https only
Session - expire when brower closed
Supercookie - uses top level domain as origin, allowing multiple website access
Third-party - uses domain that doesnt match the url domain for the webpage
setcookie( name [, value] [, expire] [, path] [, domain] [, secure] [, httponly] )

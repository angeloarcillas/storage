<?php
# PHP
file_exist($path);  ##check if file exist
spl_autoload_register('funcName'); ##autoload function

String - https://www.php.net/manual/en/language.types.string.php
	- double-quotes ( " ) to interpret escape string
	- forward-slash (\) to escape string ex.  \n \r \t
instanceof - determine if its an instance of a class
	- instanceof  - " interface
if statement - https://www.php.net/manual/en/control-structures.if.php
	- statement ? execute if true : execute if false
break - break ends the current execution
continue - skip the rest of the current loop then loop again
goto - go to
self / ::  - used for static/const

# Session - https://www.php.net/manual/en/intro.session.php
[ Start Session ]
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
or
if(session_status() === PHP_SESSION_NONE) session_start();


# session management-securty
-https://www.php.net/manual/en/features.session.security.management.php
- https://www.php.net/manual/en/session.security.ini.php
- session.use_strict_mode
- session_regenerate_id()
- session_create_id()
- @session_start() -> suppress the php notice

# Cookies
setcookie()
setrawcookie()
$_COOKIE

setcookie("cookie",time()+1) // set cookie
echo $_COOKIE["cookie-name"] // show cookie
unset($_COOKIE["cookie-name"]) // unset cookie
setcookie("cookie",time()-1) // unset cookie

# Abstract
abstract class classname {}

# Reference Counting - https://www.php.net/manual/en/features.gc.performance-considerations.php
zval - https://www.php.net/manual/en/features.gc.refcounting-basics.php
xdebug_debug_zval()

# Performance Considerations
memory_get_usage()
memory_get_peak_usage()


=====================

# Error Reporting
It is not uncommon for a php developer to use show_source(), highlight_string(), or highlight_file() as a debugging measure error_reporting()
@ -> suppress error notice


# Security

# CSRF (Cross-Site Request Forgeries) attacks
output_add_rewrite_var() //resolve read note:




# Reference
CLI -https://www.php.net/manual/en/features.commandline.php
variable scope - https://www.php.net/manual/en/language.variables.scope.php
constants - https://www.php.net/manual/en/language.constants.php
error control - https://www.php.net/manual/en/language.operators.errorcontrol.php
	-the stfu operator
execution operator - https://www.php.net/manual/en/language.operators.execution.php
foreach - https://www.php.net/manual/en/control-structures.foreach.php
declare - https://www.php.net/manual/en/control-structures.declare.php
connection handling - https://www.php.net/manual/en/features.connection-handling.php
Functions restricted/disabled by safe mode - https://www.php.net/manual/en/features.safe-mode.functions.php
Collecting Cycles - https://www.php.net/manual/en/features.gc.collecting-cycles.php
Affecting PHP's Behaviour - https://www.php.net/manual/en/refs.basic.php.php
Audio Formats Manipulation - https://www.php.net/manual/en/refs.utilspec.audio.php

# PHP - HyperText Preprocessor
//ORM -  Object Relational Mapper (ORM) -https://www.doctrine-project.org/ - used by laravel/other frameworks

==============VARIABLES================
[ Var Scope ]
local scope -> fun() { $x='foo'... } //
global  scope -> $x='foo';    fun() { ... }
    -$GLOBALS['x'] -> access global var on function
    -global keyword -> access global var on function // global $x,$y;

static -> static keyword // static value of local var

[ Superglobal Varibles ] -https://www.w3schools.com/php/php_superglobals.asp

$GLOBALS -> access global var anywhere the script
$_SERVER -> holds information about headers, paths, and script locations
$_REQUEST -> collect data from html form
$_POST
$_GET
$_FILES
$_ENV
$_COOKIE
$_SESSION


[ Data Types ]

String
Integer
    -formats: decimal (10-based), hexadecimal (16-based - prefixed with 0x) or octal (8-based - prefixed with 0)
Float (floating point numbers - also called double)
Boolean
Array
    -$x = array("one", "two", 3, 4);
    -operator: + -union | == -equality | === -identity | !=/<> -inequality | !=== -!non-identity
    - =>
    -https://www.w3schools.com/php/php_arrays_multi.asp
Object | NULL |Resource

[ For Each ]
foreach ($array as $key) //loop through each key/value in array
    -useful for Associative array("key"=>value)
foreach ($array as $key => $value) { echo $key and $value    }

============METHODS===============
-https://www.w3schools.com/php/php_ref_string.asp

var_dump(x) -> return data types & value
strlen(x) -> return string length
str_word_count(x) -> count number of words
strrev(x) -> reverse string
strtolower(x) -> return lowercase
strpos(string, x) -> search x position
str_replace(selector, newStr, string) -> replace string
define(name, value, case-insensitive) -> define constant //constant are global
    -define(x, "string", true) | default case-in is false


count(x) -> return array length
sort() -> ascending
rsort() -> descending

[ Associative Arrays ]
asort() -  ascending by value
ksort() - ascending by key
arsort() - descending by value
krsort() - descending by key

[ Date ] -https://www.w3schools.com/php/php_date.asp
date() -> return current date/time of server
    -d -(01-31) | m -(01-12) | y -(xxxx) |-'L' -(day of week)
    -H -(00-23) | h -(01-12) | i-minutes -(00-59) | s -seconds -(00-59) | a -(am/pm)

    -date_default_timezone_set("timezone"); //Asia/Manila
    -mktime(hour,minute,second,month,day,year)  -> return unix timestamp
    -strtotime(time, now) -> conver string time to unix time

[ Files ] -https://www.w3schools.com/php/php_file_open.asp
-readfile(x) -> output file
-fopen(name, mode) -> open file
    -r -read | w -write | x+ - r/w return error if file exist
-fread($file, filesize()) -> read open file
-fwrite($file, string)
-fclose(x) -> close file
-fgets(x) -> read single line
-fgetc(x) -> read single character
-feof(x) -> check if end of the file reached

[ File Upload ] - https://www.w3schools.com/php/php_file_upload.asp
//print_r(x) input-file -> associative array
-enctype="multipart/form-data" -> specify content-type

-file_exists(x)

[ Cookies  | Session]
-setcookie(name, value, expire, path, domain, secure, httponly);
-https://www.w3schools.com/php/php_sessions.asp
-count($_COOKIE) > 0 //check if cookie is enabled

-session_start() -> start session
-session_unset() -> unset session
session_destroy()  -> destroy session

[ Filter ]
-https://www.w3schools.com/php/php_filter.asp
-https://www.w3schools.com/php/php_filter_advanced.asp
-https://www.w3schools.com/php/php_ref_filter.asp

-filter_list() -> list possible filter file extension
-filter_var($x, type) -> validate & sanitize data
    -FILTER_SANITIZE_STRING
    -FILTER_VALIDATE_INT //problem w/ 0 read ref
    -FILTER_VALIDATE_IP
    -FILTER_SANITIZE_EMAIL
    -FILTER_VALIDATE_EMAIL
    -FILTER_SANITIZE_URL
    -FILTER_VALIDATE_URL

[ Error Handling ] -https://www.w3schools.com/php/php_error.asp
-die("comment")
-read ref for more

[ Exeption ] -https://www.w3schools.com/php/php_exception.asp
-try | throw | catch
    -throw new Exception("string");

[ Ternary Operator ]
print (condition ? 'true' : 'false'); //if .. else

===========RESOURCE========
-https://www.w3schools.com/php/php_form_url_email.asp

[ Clean Values ]
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

=================learninxminute===========
[ Function Return Function ]
function bar ($x, $y) {
    return function ($z) use ($x, $y) { // USE -> access outside var
        foo($x, $y, $z);
    };
}

$bar = bar('A', 'B');
$bar('C'); // Prints "A - B - C"

[ ... ]
// You can call named functions using strings
$function_name = 'add';
echo $function_name(1, 2); // => 3
// Useful for programatically determining which function to run.
// Or, use call_user_func(callable $callback [, $parameter [, ... ]]);

[ ... ]
func_num_args()
func_get_arg()

final class/func() { ... } // final keyword cannot be extends | override

[ ... ]
class foo implements foo1,bar2 // class can implement more than one interface

[ sprintf() ] - https://www.w3schools.com/php/func_string_sprintf.asp
```
$number = 123;
$str = "somewhere";
$txt = sprintf("There are %u million bicycles in %s.", $number,$str);
	-%u -> Unsigned decimal number
	-&s -> string
echo $txt;
```

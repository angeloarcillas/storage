<?php
$GLOBALS // access global var anywhere the script
$_SERVER // holds information about headers, paths, and script locations
$_REQUEST // collect data from html form
$_POST  // get data from POST method
$_GET // get data from GET method
$_FILES // get data from input type="file"
$_ENV // environment .env?
$_COOKIE // access cookies
$_SESSION // access session

int
bool
float
array
string
object

// Numeric literal separator
6.674_083e-11; // float
299_792_458;   // decimal
0xCAFE_F00D;   // hexadecimal
0b0101_1111;   // binary

// Null coalescing assignment operator
$foo ??= "foo"; // if(!isset($foo)) $foo = "foo";
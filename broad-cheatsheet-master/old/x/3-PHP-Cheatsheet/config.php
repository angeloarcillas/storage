<?php
// define .env
define('__ROOT__', dirname(dirname(__FILE__)));

// include .env
require_once(__ROOT__.'/config.php');


/**
 * Alternative
 */
// index.php
$app[] = require "config.php";

// config.php
return [
    'database' =>[
        'foo' => 'foofoo',
        'bar' => 'barbar',
        'foobar' => "barfoo";
    ]
];
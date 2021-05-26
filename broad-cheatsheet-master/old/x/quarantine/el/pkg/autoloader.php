<?php
spl_autoload_register('autoLoader');

function autoLoader($className)
{
    
    // strtolower($className);
    $path = "controller/$className.php";
    if (file_exists($path)) {
        require_once $path;

    } 
    $path = "../controller/$className.php";
    if (file_exists($path)) {
        require_once $path;
    }

    $path = "../../controller/$className.php";
    if (file_exists($path)) {
        require_once $path;
    }
    else {
        return false;
    }
}
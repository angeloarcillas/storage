<?php
/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
if (! function_exists("view")) {
    function view($name, $data = [])
    {
        extract($data);
        
        return require "App/Views/{$name}.view.php";
    }
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
if (! function_exists("redirect")) {
    function redirect($path)
    {
        header("Location: /{$path}");
    }
}

/**
 * throw new exception
 *
 * @param string $msg
 */
if (! function_exists("error")) {
    function error($msg)
    {
        throw new \Exception($msg);
    }
}

/**
 * get all request
 *
 * @return array
 */
if (! function_exists("request")) {
    function request()
    {
        return \Core\Request::request();
    }
}

/**
 * dump and die
 *
 * @return mixed
 */
if (! function_exists("dd")) {
    function dd(...$params)
    {
        var_dump($params);
        exit;
    }
}

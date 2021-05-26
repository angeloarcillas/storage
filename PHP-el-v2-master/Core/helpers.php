<?php
/**
 * Require a view.
 *
 * @param  string $name
 * @param  array  $data
 */
function view($name, $data = [])
{
  extract($data);
  
  return require "App/Views/{$name}.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /PHP-el-v2/{$path}");
    exit;
}

/**
 * Set assets path
 *
 * @param  string $path
 */
function assets($path)
{
    echo "/PHP-el-v2/App/assets/{$path}";
}

function csrf_token()
{
  $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
  $_SESSION["csrf_lifespan"] = time() + 3600;
  echo $_SESSION["csrf_token"];
}

function csrf_field()
{
  echo '<input type="hidden" name="_csrf" value="' . csrf_token() . '">';
}

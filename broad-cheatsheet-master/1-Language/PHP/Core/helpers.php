<?php
if (! function_exists('csrf_token')) {
  function csrf_token()
  {
    // hash_equals($token, $input)
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
    $_SESSION["csrf_lifespan"] = time() + 3600;
    return $_SESSION["csrf_token"];
  }
}

if (! function_exists('csrf_field')) {
    function csrf_field()
    {
        echo new HtmlString('<input type="hidden" name="_csrf" value="'. csrf_token() .'">');
    }
}

if (! function_exists('method_field')) {
    function method_field($method)
    {
        return new HtmlString('<input type="hidden" name="_method" value="'. $method .'">');
    }
}

if (! function_exists('asset')) {

    function asset($path)
    {
       echo "/App/Assets/$path";
    }
}

if (! function_exists('view')) {
    function view($view = null, $data = [])
    {
      extract($data);

      return require "App/Views/{$view}.view.php";
    }
}

if (! function_exists('redirect')) {
    function redirect($to = null, $status = 302, $headers = [])
    {
      if (count($headers) > 0) {
        foreach ($headers as $header) {
          header($header);
        }
      }

        header("location:{$to},TRUE,{$status}");
        exit;
    }
}

if (! function_exists('class_basename')) {
  function class_basename($class)
  {
      $class = is_object($class) ? get_class($class) : $class;
      return basename(str_replace('\\', '/', $class));
  }
}

if (! function_exists('error')) {
  function error($msg)
  {
      throw new \Exception($msg);
  }
}
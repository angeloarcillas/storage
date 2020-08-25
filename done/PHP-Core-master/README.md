# PHP-Core

## Request
**Usage**
```php
Request::uri();            // return request uri
Request::method();         // return request method
Request::request();        // return all request
Request::query($key);      // return all query string or specified
```

## Router
**Init**
```php
Router::load('App/routes.php')
    ->direct(Request::uri(), Request::method());
```

**Usage**
```php
$router->get('/', 'PagesController@home');
$router->get('/about', 'PagesController@about');
$router->get('/user/{foo}/post/{bar}','PagesController@create');
$router->post('/foo/bar','PagesController@destroy');


$router->get('/',function(){
  echo "Home";
});
```

## Mail
**Usage**
```php
 Mail::to("example@mail.com")->subject("Hi")->line("Hello User")->send();
 Mail::to("example@mail.com")->subject("Hello")->view("template/message")->send();
 ```

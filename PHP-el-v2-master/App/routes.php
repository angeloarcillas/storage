<?php
// date("Y-m-d H:i:s") // mysql datetime format



/**
 *
 */

$router->get('PHP-el-v2', 'PagesController@home');
$router->get('PHP-el-v2/about', 'PagesController@about');

$router->get('PHP-el-v2/user/{foo}/post/{bar}', function(){
    return view('home');
});


/**
 * AUTH
 */

// Login & Logout
$router->get('PHP-el-v2/auth/login', 'Auth\LoginController@showLoginForm');
$router->post('PHP-el-v2/auth/login', 'Auth\LoginController@login');
$router->post('PHP-el-v2/auth/logout', 'Auth\LoginController@logout');

// Register
$router->get('PHP-el-v2/auth/register', 'Auth\RegisterController@showRegistrationForm');
$router->post('PHP-el-v2/auth/register', 'Auth\RegisterController@register');
$router->get('PHP-el-v2/auth/email/verify', 'Auth\RegisterController@showVerifyPage');
$router->get('PHP-el-v2/auth/email/verify/{token}', 'Auth\RegisterController@verifyEmail');
$router->post('PHP-el-v2/auth/email/resend', 'Auth\RegisterController@resendVerifyEmail');

// Forgot
$router->get('PHP-el-v2/auth/forgot-password', 'Auth\ForgotPasswordController@showRequestResetForm');
$router->post('PHP-el-v2/auth/forgot-password/{token}', 'Auth\ForgotPasswordController@sendEmailResetLink');

// Reset
$router->get('/auth/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$router->post('/auth/password/reset', 'Auth\ResetPasswordController@reset');


// PAGINATE
$router->get('PHP-el-v2/paginate', 'PaginateController@index');

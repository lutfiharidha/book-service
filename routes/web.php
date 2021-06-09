<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => 'auth','prefix' => 'api'], function ($router) 
{
    $router->get('me', 'AuthController@me');
    $router->get('books', 'BookController@index');
    $router->get('book/collections', 'BookServiceController@index');
    $router->post('book/collection/add', 'BookServiceController@store');
    $router->delete('book/collection/delete/{id}', 'BookServiceController@destroy');
});
$router->group(['middleware' => ['auth', 'admin'],'prefix' => 'api'], function ($router) 
{
    $router->post('book/create', 'BookController@store');
    $router->put('book/update/{id}', 'BookController@update');  
    $router->delete('book/delete/{id}', 'BookController@destroy');
});

$router->group(['prefix' => 'api'], function () use ($router) 
{
   $router->post('register', 'AuthController@register');
   $router->post('login', 'AuthController@login');
});

<?php

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
    return view('welcome');
});

$router->get('/user/password/change', 'User\UserDataPasswordController@index');
$router->post('/user/password/change', [
                'as' => 'user/password/change',
                'uses' => 'User\UserDataPasswordController@resetPasswordWeb'
            ]);
$router->get('/public/request', 'PublicAccessController@requestView');
$router->post('/public/request', [
                 'as' => '/public/request',
                 'uses' => 'PublicAccessController@requestSubmit'
            ]);
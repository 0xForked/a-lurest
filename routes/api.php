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

//user auth
$router->post('/v1/user/auth/signin', 'User\UserAuthLoginController@index');
$router->post('/v1/user/auth/signup', 'User\UserAuthRegisterController@index');
$router->get('/v1/user/data/detail', [
                'middleware' => 'auth',
                'uses' =>  'User\UserDataDetailController@index'
            ]);
$router->post('/v1/user/data/password/change', [
                'middleware' => 'auth',
                'uses' =>  'User\UserDataPasswordController@passwordChangeAPI'
            ]);
$router->get('/v1/user/data/password/reset', 'User\UserDataPasswordController@passwordForgotAPI');

//Asmit Web API
$router->get('/v1/asmitweb/data/article', 'AsmitWeb\ArticleController@showList');
$router->get('/v1/asmitweb/data/article/detail', 'AsmitWeb\ArticleController@showDetail');

$router->get('/v1/asmitweb/data/category', 'AsmitWeb\CategoryController@showList');
$router->get('/v1/asmitweb/data/category/detail', 'AsmitWeb\CategoryController@showDetail');

$router->get('/v1/asmitweb/data/project', 'AsmitWeb\ProjectController@showList');
$router->get('/v1/asmitweb/data/project/detail', 'AsmitWeb\ProjectController@showDetail');

$router->get('/v1/asmitweb/data/message', 'AsmitWeb\MessageController@showList');
$router->get('/v1/asmitweb/data/message/detail', 'AsmitWeb\MessageController@showDetail');

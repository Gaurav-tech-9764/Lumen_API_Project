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
        return $router->app->version();
});


    $router->group(['prefix' => 'api'], function () use ($router) {
        $router->get('Showusers',  ['uses' => 'UserController@showAlluser']);
    
        $router->get('user/{id}', ['uses' => 'UserController@showOneuser']);
    
        $router->post('Createusers', ['as' => 'Create', 'uses' => 'UserController@create']);
    
        $router->get('Deleteusers/{id}', ['uses' => 'UserController@delete']);
    
        $router->post('Updateusers/{id}', ['uses' => 'UserController@update']);
});
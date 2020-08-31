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

$router->get('/app/pastries', 'PastriesController@getAll');

$router->group(['prefix' => '/app/pastry'], function() use ($router) {
    $router->get('/{id}', "PastriesController@get");
    $router->post('/', "PastriesController@store");
    $router->put('/{id}', "PastriesController@update");
    $router->delete('/{id}', "PastriesController@delete");
});

$router->get('/app/clients', 'ClientsController@getAll');

$router->group(['prefix' => '/app/client'], function() use ($router) {
    $router->get('/{id}', "ClientsController@get");
    $router->post('/', "ClientsController@store");
    $router->put('/{id}', "ClientsController@update");
    $router->delete('/{id}', "ClientsController@delete");
});

$router->group(['prefix' => '/app/order'], function() use ($router) {
    $router->get('/{client_id}', 'OrdersController@get');
    $router->post('/{client_id}', 'OrdersController@store');
    $router->put('/{client_id}/{pastry_id}', 'OrdersController@update');
    $router->delete('/{client_id}/{pastry_id}', 'OrdersController@delete');
});

$router->get('/app/checkout/{client_id}', 'CheckoutController@checkout');

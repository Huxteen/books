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
    return '<center>Congratulation!!! your book API endpoints is running successfully.</center>';
});


// Query External Services
// Requirements 1
// http://localhost:8080/api/external-books?name=:nameOfABook
$router->get('/api/external-books', 'BookController@externalService');


// Internal Routes
// Requirements 2
$router->get('/api/v1/books', 'BookController@index');
$router->post('/api/v1/books', 'BookController@store');

$router->get('/api/v1/books/{id}', 'BookController@show');
$router->put('/api/v1/books/{id}', 'BookController@update');
$router->patch('/api/v1/books/{id}', 'BookController@update');
$router->delete('/api/v1/books/{id}', 'BookController@destroy');





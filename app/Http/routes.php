<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('produtos', 'ProductsController@index');
Route::get('produtos/inserir', 'ProductsController@showForm');
Route::post('produtos', 'ProductsController@create');

Route::get('encomendas', 'OrdersController@index');
Route::get('encomendas/inserir', 'OrdersController@showForm');
Route::post('encomendas', 'OrdersController@create');

Route::get('producoes', function() {
	return view('todo');
});

Route::get('caixa', function() {
	return view('todo');
});

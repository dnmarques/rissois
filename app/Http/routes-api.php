<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	// obter lista de produtos
	$api->get('produtos', 'App\Http\Controllers\Api\V1\ProductsController@index');

	// inserir um novo produto
	$api->post('produtos', 'App\Http\Controllers\Api\V1\ProductsController@create');

	// eliminar um produto
	$api->delete('produtos/{product_id}', 'App\Http\Controllers\Api\V1\ProductsController@destroy');

	// editar um produto
	$api->put('produtos/{product_id}', 'App\Http\Controllers\Api\V1\ProductsController@update');

	// obter lista de encomendas
	$api->get('encomendas', 'App\Http\Controllers\Api\V1\OrdersController@index');

	// inserir uma nova encomenda (vazia)
	$api->post('encomendas', 'App\Http\Controllers\Api\V1\OrdersController@create');

	// editar uma encomenda
	$api->put('encomendas/{order_id}', 'App\Http\Controllers\Api\V1\OrdersController@update');

	// eliminar uma encomenda
	$api->delete('encomendas/{order_id}', 'App\Http\Controllers\Api\V1\OrdersController@destroy');
});

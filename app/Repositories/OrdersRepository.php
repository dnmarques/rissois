<?php

namespace App\Repositories;

use App\Order;
use App\Product;
use App\OrderProduct;

class OrdersRepository {

	function create($data) {
		return Order::create($data);
	}

	function all() {
		return Order::all();
	}
	
	function addProduct($order_id, $data) {
		OrderProduct::create([
			'product_id' => $data['product_id'],
			'order_id' => $order_id,
			'amount' => $data['amount'],
		]);
	}

	function getProducts($order_id) {
		return OrderProduct::select('product_id', 'name', 'size', 'amount')
					->where('order_id', $order_id)
					->join('products', 'products.id', '=', 'order_product.product_id')
					->get();
	}

	function getAllOrders() {
		return Order::select('id', 'client_name', 'date')->get();
	}

	function update($order_id, $data, $currentProducts) {
		// eliminar produtos
		OrderProduct::where('order_id', $order_id)->delete();

		// criar novos produtos
		foreach($currentProducts as $product) {
			$this->addProduct($order_id, $product);
		}

		// editar informacao da encomenda
		return Order::where('id', $order_id)->update($data);
	}

	function destroy($order_id) {
		return Order::where('id', $order_id)->delete();
	}
}
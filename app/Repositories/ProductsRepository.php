<?php

namespace App\Repositories;

use App\Product;

class ProductsRepository {

	public function getList() {
		return Product::all();
	}

	public function getWithOrdersInfo() {
		return Product::join('order_product', 'products.id', '=', 'order_product.product_id')->get();
	}

	public function create($data) {
		return Product::create($data);
	}

	public function numProducts() {
		return Product::max('id');
	}

	public function update($product_id, $data) {
		return Product::where('id', $product_id)->update($data);
	}

	public function destroy($product_id) {
		return Product::where('id', $product_id)->delete();
	}
}
<?php

namespace App\Repositories;

use App\Product;

class ProductsRepository {

	public function getList() {
		// TODO fazer cache
		return Product::all();
	}

	public function create($data) {
		return Product::create($data);
	}
}
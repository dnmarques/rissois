<?php

namespace App\Repositories;

use App\Product;

class ProductsRepository {

	public function getList() {
		return Product::all();
	}
}
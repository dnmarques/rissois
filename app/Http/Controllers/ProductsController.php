<?php

namespace App\Http\Controllers;

use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class ProductsController extends Controller
{
    protected $products;

    public function __construct(ProductsRepository $products) {
    	$this->products = $products;
    }

    public function index() {
    	$data['products'] = $this->products->getList();
    	return view('products.index', $data);
    }
}

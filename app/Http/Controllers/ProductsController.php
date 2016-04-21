<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\User;

class ProductsController extends Controller
{
    protected $products;

    public function __construct(ProductsRepository $products) {
    	$this->middleware('auth');
    	$this->products = $products;
    }

    public function index() {
    	$data['products'] = $this->products->getList();
    	return view('products.index', $data);
    }

    public function showForm() {
    	return view('products.form');
    }

    // TODO fazer tratamento dos dados da form
    public function create(Request $request) {
    	$data = [
				'name' => $request->name,
				'size' => $request->size,
				'user_id' => $request->user()->id,
                'base_price' => $request->price
			];
    	$this->products->create($data);
    	// TODO fazer tratamento de erros
    	// TODO na view o que fazer se nao existirem produtos?
    	return Redirect::to('produtos');
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\ProductsRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\User;

class ProductsController extends BaseController {
    protected $products;

    public function __construct(ProductsRepository $products) {
    	// $this->middleware('auth'); TODO
    	$this->products = $products;
    }

    public function create(Request $request) {
        // TODO onde validar informacao do JSON?
        
        $products = $request->json('products');
        foreach($products as $product) {
            $data = [
                'name' => $product['name'],
                'size' => $product['size'],
                'user_id' => $product['user_id'],
                'base_price' => $product['base_price']
            ];
            $this->products->create($data);
        }
    	return $this->response->created();
    }

	public function index() {
    	return $this->products->getList();
    }

    public function update(Request $request, $product_id) {
    	$data = [
				'name' => $request['name'],
				'size' => $request['size'],
                'base_price' => $request['base_price'],
                'user_id' => $request['user_id'],
			];
		$this->products->update($product_id, $data);
		$this->response->noContent();
    }

    public function destroy($product_id) {
    	return $this->products->destroy($product_id);
    }
}

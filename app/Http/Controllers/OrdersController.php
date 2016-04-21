<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Repositories\ProductsRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;

class OrdersController extends Controller {
	protected $products;
	protected $orders;

    function __construct(ProductsRepository $products, OrdersRepository $orders) {
    	$this->middleware('auth');
    	$this->products = $products;
    	$this->orders = $orders;
    }

    function index() {
        $data['orders'] = $this->orders->all();
        $data['order_products'] = $this->products->getWithOrdersInfo();
    	return view('orders.index', $data);
    }

    function showForm() {
    	$data['products'] = $this->products->getList();
    	return view('orders.form', $data);
    }

    // TODO fazer tratamento da request
    function create(Request $request) {
        // create order
        $data = [
            'client_name' => $request->client_name,
            'date' => $request->order_date,
        ];
        $order = $this->orders->create($data);

        // add products to order
        $num_products = $this->products->numProducts();
        for($i = 1; $i < $num_products + 1; $i++) {
            $key = 'product-' . $i;
            if($request[$key] != null) {
                $this->orders->addProduct($order->id, $i, $request[$key]);
            } 
        }
        Redirect::to('encomendas');
    }
}

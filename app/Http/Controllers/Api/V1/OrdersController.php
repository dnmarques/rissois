<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Redirect;
use App\Repositories\ProductsRepository;
use App\Repositories\OrdersRepository;
use App\Http\Requests\AddOrderRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Order;

class OrdersController extends BaseController {
	protected $products;
	protected $orders;

    function __construct(ProductsRepository $products, OrdersRepository $orders) {
    	//$this->middleware('auth');
    	$this->products = $products;
    	$this->orders = $orders;
    }

    // Bug na listagem de produtos das encomendas (nome do produto está errado)
    function index() {
        $orders = $this->orders->getAllOrders();
        foreach($orders as $order) {
            $order['products'] = $this->orders->getProducts($order->id);
        }
        return $orders;
    }

    function create(Request $request) {
        $orders = $request->json('encomendas');
        foreach($orders as $order) {
            // criar encomenda
            $data = [
                'client_name' => $order['client_name'],
                'date' => $order['order_date']
            ];
            $newOrder = $this->orders->create($data);

            // adicionar produtos a esta encomenda
            $order_products = $order['produtos'];
            foreach($order_products as $product) {
                $data = [
                    'product_id' => $product['product_id'],
                    'amount' => $product['amount']
                ];
                $this->orders->addProduct($newOrder->id, $data);
            }
        }
        return $this->response->created();
    }

    function update(Request $request, $order_id) {
        $data = [
            'client_name' => $request['client_name'],
            'date' => $request['order_date'],
        ];
        $this->orders->update($order_id, $data, $request['produtos']);
        $this->response->noContent();
    }

    function destroy($order_id) {
        $this->orders->destroy($order_id);
        $this->response->noContent();
    }
}

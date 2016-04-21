<div class="panel panel-default">
    <div class="panel-heading">Lista de encomendas</div>
    <div class="panel-body">
        <table class="table">
            @foreach($orders as $order)
            	<tr>
            		<td>ID: {{ $order->id }}</td>
            		<td>NOME: {{ $order->client_name }}</td>
            		<td>DATA: {{ $order->date }}</td>
            	</tr>
				@foreach($order_products as $product)
					@if($product->order_id == $order->id)
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->amount }}</td>
							<td>{{ $product->amount * $product->base_price }}</td>
						</tr>
					@endif
				@endforeach
			@endforeach
        </table>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">Lista de produtos</div>
    <div class="panel-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>TAMANHO</th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->size }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
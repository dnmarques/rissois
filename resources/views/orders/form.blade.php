@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar uma encomenda</div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <div class="panel-body">
                    <form action="{{ url('encomendas') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nome do cliente</label>

                            <div class="col-sm-6">
                                <input type="text" name="client_name" id="client_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Data</label>

                            <div class="col-sm-6">
                                <input type="date" name="order_date" id="order_date" class="form-control">
                            </div>
                        </div>
                        @foreach($products as $product)
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ $product->name }}, {{ $product->size }}</label>

                                <div class="col-sm-6">
                                    <input type="number" name="product-{{ $product->id }}" id="product-{{ $product->id }}" class="form-control">
                                </div>
                            </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Adicionar Encomenda
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

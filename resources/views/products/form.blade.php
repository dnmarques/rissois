@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Adicionar um produto</div>
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <div class="panel-body">
                    <form action="{{ url('produtos') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nome</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="product_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tamanho</label>

                            <div class="col-sm-6">
                                <input type="radio" name="size" value="G" checked> Grande
                                <input type="radio" name="size" value="P"> Pequeno
                                <input type="radio" name="size" value="N"> Normal
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Adicionar Produto
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

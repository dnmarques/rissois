@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('orders.actions')

            @include('orders.list')
        </div>
    </div>
</div>
@endsection

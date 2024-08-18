@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                View all Orders
            </h1>
        </div>
    </div>
    <div class="row">
        @foreach($orders as $order)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <p class="card-title">Quantity: {{ $order->quantity }}</p>
                    <p class="card-text">Customer Name: </p>
                    <p class="card-text">{{ $order->customer->fname }} {{ $order->customer->lname }}</p>
                    <p class="card-text">Order: {{ $order->product->product_name }} </p>
                    <a href="{{ route('orders.edit', $order->id) }}" class="card-link">Edit</a>
                    <a href="{{ route('orders.trash', $order->id) }}" class="card-link">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

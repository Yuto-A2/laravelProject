@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                Manage Your Order
            </h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('orders.update', $order -> id) }}" method="POST">
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="quantity" value="{{ $order->quantity  }}">
            </div>
            <div class="mb-3">
                <label for="product" class="form-label">Product</label>
                <input type="text" class="form-control" id="product" name="product" aria-describedby="product" value="{{ $order->product->product_name }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

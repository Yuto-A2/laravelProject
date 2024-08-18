@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                Add Your Order
            </h1>
        </div>
    </div>
    <div class="row">
        <form action="{{ route('orders.store') }}" method="post">
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
                <input type="text" class="form-control" id="quantity" name="quantity" aria-describedby="quantity">
            </div>
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" aria-describedby="product_name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <h2>Choose your Order</h2>
    <div class="productContainer">
        @foreach($products as $product)
                    <h3 class="header3">{{ $product -> product_name }}</h3>
                    <img src="{{ asset('img/' . $product->img) }}" alt="{{ $product->product_name }}" />
                    <p>{{ $product -> price }}</p>

                </div>
        @endforeach
    </div>
@endsection

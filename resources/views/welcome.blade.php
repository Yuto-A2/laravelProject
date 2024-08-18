@extends('layouts/admin')
@section('content')
    
            <h2 class="header2">
               PCBuilder
            </h2>
        </div>
    </div>
    <div class="productContainer">
        @foreach($products as $product)
                    <h3 class="header3">{{ $product -> product_name }}</h3>
                    <img src="{{ asset('img/' . $product->img) }}" alt="{{ $product->product_name }}" />
                    <p>{{ $product -> price }}</p>

                </div>
        @endforeach
    </div>
@endsection
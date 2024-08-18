@extends('layouts/admin')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="display-2">
                View all Customers
            </h1>
        </div>
    </div>
    <div class="row">
        @foreach($customers as $customer)
        <div class="col-md-4  mb-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $customer -> fname }} {{ $customer -> lname }}</h5>
                    <a href="{{ route('customers.edit', $customer -> id ) }}" class="card-link">Edit</a>
                    <a href="{{ route('customers.trash', $customer -> id )}}" class="card-link">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

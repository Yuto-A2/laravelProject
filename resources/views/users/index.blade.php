@extends('layouts.admin')

@section('content')
    <h2 class="userHeader">
        User Add Page
    </h2>

    <div class="productContainer">
       <form action="{{ route('users.store') }}" method="POST">
         @csrf
         <label for="user_name">User Name:</label>
         <input type="text" name="user_name" id="user_name" value="">

         <label for="email">Email:</label>
         <input type="email" name="email" id="email" value="">

         <label for="password">Password:</label>
         <input type="password" name="password" id="password">

         <br>
         <input type="submit" value="Add User">
       </form>
    </div>
@endsection

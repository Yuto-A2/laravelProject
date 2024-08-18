@extends('layouts/admin')
@section('content')
    <h1 class="addUser">
        Add User Information
    </h1>
      
   <div class="userAddForm">
     <form action="{{ route('users.store') }}" method="post">
        @if ($errors->any())
            <div class="addContainer">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            </div><!-- addContainer -->
    </div><!-- userAddForm -->
            @endif
            {{ csrf_field() }}
            <div class="addContainer2">
                <label for="name" class="form-label">User Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="addContainer3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
                @error('email')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="addContainer4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="password">
                @error('password')
                    <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection


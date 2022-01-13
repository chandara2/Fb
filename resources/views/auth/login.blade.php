@extends('layout.guest')
@section('title', 'LOGIN')
@section('style')
    <style>
        #login_custom{
            width:100%;
            max-width:330px;
            padding:15px;
            margin:250px auto;
        }
    </style>
@endsection

@section('content')

    <div class="shadow" id="login_custom">
        <h1 class="text-center">Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control mb-3">
            <span class="text-danger">@error('username'){{$message}}@enderror</span>
            <input type="text" name="password" placeholder="Password" class="form-control mb-3">
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
            <select name="gid" class="form-select mb-3">
                <option value="3">User</option>
                <option value="2">Agency</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" class="btn brand_btn3 w-100 mb-3">Login</button>
            <span class="text-danger bg-warning">@error('errmsg'){{$message}}@enderror</span>
        </form>
    </div>

@endsection
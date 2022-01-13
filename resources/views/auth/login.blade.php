@extends('layout.guest')
@section('title', 'LOGIN')

@section('content')
    
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="username" value="{{ old('username') }}" placeholder="Username">
        <span class="text-danger">@error('username'){{$message}}@enderror</span>
        <input type="text" name="password" placeholder="Password">
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
        <select name="gid">
            <option value="3">User</option>
            <option value="2">Agency</option>
            <option value="1">Admin</option>
        </select>
        <button type="submit">Login</button>
        <span class="text-danger bg-warning">@error('errmsg'){{$message}}@enderror</span>
    </form>
@endsection
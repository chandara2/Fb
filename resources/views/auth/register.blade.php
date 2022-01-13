@extends('layout.guest')
@section('title', 'REGISTER')
@section('style')
    <style>
        #register_custom{
            width:100%;
            max-width:330px;
            padding:15px;
            margin:250px auto;
        }
    </style>
@endsection

@section('content')
    <div class="shadow" id="register_custom">
        <h1 class="text-center">Register</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <input type="text" name="fname" value="{{ old('fname') }}" autofocus placeholder="Family Name">
            <input type="text" name="gname" value="{{ old('gname') }}" placeholder="Given Name">
            <input type="text" name="username" value="{{ old('username') }}" placeholder="Username">
            <span class="text-danger">@error('username'){{$message}}@enderror</span>
            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number">
            <input type="text" name="password" placeholder="Password">
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
            <input type="text" name="password_confirmation" placeholder="Confirm Password">
            <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
            <select name="gid">
                <option value="3">User</option>
                <option value="2">Agency</option>
            </select>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
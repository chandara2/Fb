@extends('layout.layout_guest')
@section('title', 'LOGIN')
@section('content')
    <div class="d-flex justify-content-center align-items-center w-100 vh-100 fadeLogin">
        <div class="shadow p-3 rounded" style="width: 380px;">
            <h1 class="text-center mb-3">Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control mt-3" autofocus>
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                <input type="password" name="password" placeholder="Password" class="form-control mt-3">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                <select name="gid" class="form-select mt-3">
                    @foreach ($usergroups as $usergroup)
                        <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary w-100 my-3">Login</button>
                <div class="text-center text-danger bg-warning px-3 mb-3 rounded">@error('errmsg'){{$message}}@enderror</div>
                <div class="text-center text-danger bg-warning px-3 rounded">@error('inactivemsg'){{$message}}@enderror</div>
                <div class="text-center">Not a member? <a href="{{ route('showregister') }}" class="text-decoration-none">Register</a></div>
            </form>
        </div>
    </div>
@endsection
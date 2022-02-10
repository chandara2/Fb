@extends('layout.layout_guest')
@section('title', 'LOGIN')

@section('content')

    <div class="d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="shadow rounded p-3" style="width: 330px;">
            <h1 class="text-center mb-3">Login</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control mt-3" autofocus>
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                <input type="text" name="password" placeholder="Password" class="form-control mt-3">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                <select name="gid" class="form-select mt-3">
                    @foreach ($usergroups as $usergroup)
                        <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn brand_btn3 w-100 my-3">Login</button>
                <span class="text-danger bg-warning">@error('errmsg'){{$message}}@enderror</span>
            </form>
        </div>
    </div>

@endsection
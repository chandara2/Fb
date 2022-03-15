@extends('layout.layout_guest')
@section('title', 'REGISTER')
@section('content')
    <div class="d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="shadow p-3 rounded" style="width: 380px;">
            <h1 class="text-center mb-3">Register</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div  class="row mt-3">
                    <div class="col-lg">
                        <input type="text" name="fname" value="{{ old('fname') }}" placeholder="Family Name" class="form-control" autofocus>
                    </div>
                    <div class="col-lg">
                        <input type="text" name="gname" value="{{ old('gname') }}" placeholder="Given Name" class="form-control">
                    </div>
                </div>
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control mt-3">
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control mt-3">
                <input type="password" name="password" placeholder="Password" class="form-control mt-3">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control mt-3">
                <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                <select name="group_member" class="form-select mt-3">
                    @foreach ($usergroups as $usergroup)
                        <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary w-100 my-3">Register</button>
                <div class="text-center">Already a member? <a href="{{ route('showlogin') }}" class="text-decoration-none">Login</a></div>
            </form>
        </div>
    </div>

@endsection
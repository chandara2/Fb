@extends('layout.layout_guest')
@section('title', 'REGISTER')
@section('content')
    <div class="d-flex justify-content-center align-items-center w-100 vh-100">
        <div class="shadow p-3 rounded" style="width: 380px;">
            <h1 class="text-center mb-3">Register</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <input type="text" name="fname" value="{{ old('fname') }}" placeholder="Family Name" class="form-control mt-3" autofocus>
                <input type="text" name="gname" value="{{ old('gname') }}" placeholder="Given Name" class="form-control mt-3">
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" class="form-control mt-3">
                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number" class="form-control mt-3">
                <input type="text" name="password" placeholder="Password" class="form-control mt-3">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                <input type="text" name="password_confirmation" placeholder="Confirm Password" class="form-control mt-3">
                <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                <select name="group_member" class="form-select mt-3">
                    @foreach ($usergroups as $usergroup)
                        <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn brand_btn3 w-100 my-3">Register</button>
            </form>
        </div>
    </div>

@endsection
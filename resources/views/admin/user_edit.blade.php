@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')

<!-- Update User -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.user.update', $userid->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header brand-bg4">
                    <h4 class="modal-title text-white" id="myCenterModalLabel">Edit User</h4>
                    <a href="{{ route('admin.user.index') }}">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </a>
                </div>
                <div class="px-3">
                    <input type="text" name="fname" value="{{ $userid->fname }}" placeholder="Family Name" class="form-control mt-3" autofocus>
                    <input type="text" name="gname" value="{{ $userid->gname }}" placeholder="Given Name" class="form-control mt-3">
                    <input type="text" name="username" value="{{ $userid->username }}" placeholder="Username" class="form-control mt-3">
                    <span class="text-danger">@error('username'){{$message}}@enderror</span>
                    <input type="text" name="phone" value="{{ $userid->phone }}" placeholder="Phone Number" class="form-control mt-3">
                    <input type="password" name="password" class="form-control mt-3" value="********">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    <input type="password" name="password_confirmation" class="form-control mt-3" value="********">
                    <span class="text-danger">@error('password_confirmation'){{$message}}@enderror</span>
                    <select name="gid" class="form-select my-3">
                        <option value="{{ $userid->gid }}">
                            @if ($userid->gid==1) Admin
                            @elseif($userid->gid==2) Agency
                            @else User
                            @endif
                        </option>
                        @foreach ($usergroups as $usergroup)
                            <option value="{{ $usergroup->id }}">{{ $usergroup->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.user.index') }}">
                        <button type="button" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                    </a>
                    <button type="submit" class="btn brand_btn4">Update</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

@endsection
@extends('layout.layout_admin')
@section('title', 'ADMIN USER')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';" class="mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">User</li>
                <li class="breadcrumb-item"><a href="{{ route('admin.user.create') }}" class="text-decoration-none">New User</a></li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        @if (session('userdelete'))
            <div class="alert alert-success">{{session('userdelete')}}</div>
        @endif
        
        <table class="customdatatable table table-hover table-bordered" style="width:100%">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Family Name</th>
                    <th>Given Name</th>
                    <th>Userame</th>
                    <th>Phone Number</th>
                    <th>Member</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $i => $user)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$user->fname}}</td>
                    <td>{{$user->gname}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->phone}}</td>
                    @if($user->gid==1)
                    <td class="text-danger">Admin</td>
                    @elseif($user->gid==2)
                    <td>Agency</td>
                    @else
                    <td>User</td>
                    @endif
                    <td>
                        <a href="/admin/user/{{ $user->id }}/edit" title="Edit"><i class="bi bi-pencil-square text-primary"></i></a>
                        @if($user->gid!=1)
                        <form action="/admin/user/{{ $user->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                            @csrf
                            @method('delete')
                            <button type="submit" title="Delete" class="btn btn-sm"><i class="bi bi-trash text-danger"></i></button>
                        </form>
                        @else
                        <i class="bi bi-trash text-danger btn btn-sm" style="cursor: not-allowed;" title="Impossible to delete Admin!"></i>
                        @endif
                        <a href="#"><i class="bi bi-eye text-success"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Family Name</th>
                    <th>Given Name</th>
                    <th>Userame</th>
                    <th>Phone Number</th>
                    <th>Member</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>

    </div>

@endsection
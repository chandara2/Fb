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
        <h1>This is Company Info</h1>
    </div>

@endsection
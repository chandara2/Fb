@extends('layout.layout_admin')
@section('title', 'ADMIN DB')

@section('content')

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-md-5 col-12 align-self-center">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-people display-5 text-primary"></i>
                        <h4 class="text-muted">User</h4>
                        <h4 class="text-muted">123</h4>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-briefcase display-5 text-primary"></i>
                        <h4 class="text-muted">Job Announcement</h4>
                        <h4 class="text-muted">123</h4>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card">
                    <div class="card-body text-center">
                        <i class="bi bi-boxes display-5 text-primary"></i>
                        <h4 class="text-muted">Curriculum Vitae</h4>
                        <h4 class="text-muted">123</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
@endsection
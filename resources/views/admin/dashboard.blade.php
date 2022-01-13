@extends('layout.admin')
@section('title', 'ADMIN DB')

@section('content')

    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-info">
                                <i class="ti-wallet"></i>
                            </div>
                            <div class="ml-2 align-self-center">
                                <h3 class="mb-0 font-weight-light">$3249</h3>
                                <h5 class="text-muted mb-0">Total Revenue</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-warning">
                                <i class="mdi mdi-cellphone-link"></i></div>
                            <div class="ml-2 align-self-center">
                                <h3 class="mb-0 font-weight-light">$2376</h3>
                                <h5 class="text-muted mb-0">Online Revenue</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-primary">
                                <i class="mdi mdi-cart-outline"></i></div>
                            <div class="ml-2 align-self-center">
                                <h3 class="mb-0 font-weight-light">$1795</h3>
                                <h5 class="text-muted mb-0">Offline Revenue</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="round round-lg text-white d-inline-block text-center rounded-circle bg-danger">
                                <i class="mdi mdi-bullseye"></i></div>
                            <div class="ml-2 align-self-center">
                                <h3 class="mb-0 font-weight-light">$687</h3>
                                <h5 class="text-muted mb-0">Ad. Expense</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
    
@endsection
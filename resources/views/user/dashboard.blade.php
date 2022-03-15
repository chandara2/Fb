@extends('layout.layout_user')
@section('title', 'USER DASHBOARD')

@section('content_user')
    <h4 class="text-center">User Dashboard</h4>
    <div class="row mt-3 justify-content-center text-center">
        <div class="col-lg-3 my-2">
            <div class="card pt-3">
                <i class='bx bx-bar-chart-alt-2 h1'></i>
                <div class="card-body">
                    <h5 class="card-title">FACEBOOK</h5>
                    <p class="card-text">{{ $fbs }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
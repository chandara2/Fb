@extends('layout.layout_supervisor')
@section('title', 'SUPERVISOR DASHBOARD')

@section('content_supervisor')
    <h4 class="text-center">Supervisor Dashboard</h4>
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
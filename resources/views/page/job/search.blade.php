@extends('layout.layout_app')
@section('title', 'JOB')

@section('content')

<div class="container my-3">
    
    <button class="btn btn-danger">Related Job</button>

    <ul class="list-group list-group-flush">
        @foreach ($jobs as $j)
        <li class="list-group-item py-3">
            {{ $j->title }}
        </li>
        @endforeach
    </ul>

</div>

@endsection
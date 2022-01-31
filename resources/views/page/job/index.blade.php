@extends('layout.layout_app')
@section('title', 'JOB')
@section('style')
    <style>
        .class_jobs{
            color: blue;
        }
    </style>
@endsection
@section('content')

<div class="container">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>

<div class="container my-3">
    <button class="btn btn-danger">Related Job</button>
</div>

@endsection
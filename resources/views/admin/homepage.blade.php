@extends('layout.layout_admin')
@section('title', 'ADMIN INFO')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3">
            <h1 class="text-center text-uppercase" style="text-decoration: underline 3px solid pink">Homepage</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <a href="{{ route('admin.homepage.create') }}"><button type="submit">Add Slide</button></a>
        </div>

        <div class="row">
            <ul class="list-group list-group-flush">
                @forelse ($homepageslides as $slide)
                <li class="list-group-item bg-light ps-0">
                    <img src="{{asset('upload/homepageslide/')}}/{{$slide->slide}}" alt="slide" width="100" height="100">
                    <form action="/admin/homepage/{{ $slide->id }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure? You won\'t be able to revert this!')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                    </form>
                </li>
                @empty
                    <p class="text-center bg-info">No slide to show</p>
                @endforelse
            </ul>
        </div>
    </div>

@endsection
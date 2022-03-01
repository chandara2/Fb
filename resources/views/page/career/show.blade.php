@extends('layout.layout_app')
@section('title', 'CAREER')
@section('style')
    <style>
        /* Use for color menu */
        .class_career{
            color: #1EA4D9;
        }
    </style>
@endsection
@section('content')

    <div class="container mt-5">
        <div class="px-3">
            <div class="row gx-5">
                @foreach ( $careers as $career )
                <div class="col-md-8 bg-white">
                    <h2 class="my-3">
                        @if (app()->getLocale() == 'ch')
                            {{ $career->title_ch }}
                        @elseif (app()->getLocale() == 'en')
                            {{ $career->title_en }}
                        @elseif (app()->getLocale() == 'kh')
                            {{ $career->title_kh }}
                        @else
                            {{ $career->title_th }}
                        @endif
                    </h2>
                    <img src="{{asset('upload/blogpost/')}}/{{$career->post_img}}" alt="" width="100%" height="350" style="object-fit: contain;">
                    <div class="my-3">
                        @if (app()->getLocale() == 'ch')
                            @php
                                echo $career->post_ch
                            @endphp
                        @elseif (app()->getLocale() == 'en')
                            @php
                                echo $career->post_en
                            @endphp
                        @elseif (app()->getLocale() == 'kh')
                            @php
                                echo $career->post_kh
                            @endphp
                        @else
                            @php
                                echo $career->post_th
                            @endphp
                        @endif
                    </div>
                </div>
                @endforeach

                <div class="col-md-4">
                    <div class="bg-white">
                        <p class="ms-3 pt-3 fw-bold h5">{{ __('text.Popular_article') }}</p>
                        <ul class="list-group list-group-flush">
                            @foreach ( $careers_last as $last )
                            <li class="list-group-item">
                                <a href="/career/{{ $last->id }}" class="text-decoration-none text_hover">
                                    @if (app()->getLocale() == 'ch')
                                        {{ $last->title_ch }}   
                                    @elseif (app()->getLocale() == 'en')
                                        {{ $last->title_en }}   
                                    @elseif (app()->getLocale() == 'kh')
                                        {{ $last->title_kh }}   
                                    @else
                                        {{ $last->title_th }}   
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 mb-5">
        <div class="row">
            <div class="col-md-8 bg-white py-3 ps-4">
                <p class="underline_highlight">Next</p>
                @foreach ($careers_next as $next)
                    <a href="/career/{{ $next->id }}" class="text-decoration-none h2 text_hover">
                        @if (app()->getLocale() == 'ch')
                            {{ $next->title_ch }}   
                        @elseif (app()->getLocale() == 'en')
                            {{ $next->title_en }}   
                        @elseif (app()->getLocale() == 'kh')
                            {{ $next->title_kh }}   
                        @else
                            {{ $next->title_th }} 
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection


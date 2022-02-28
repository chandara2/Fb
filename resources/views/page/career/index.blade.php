@extends('layout.layout_app')
@section('title', 'CAREER')
@section('style')
    <style>
        .class_career{
            color: #1EA4D9;
        }
    </style>
@endsection
@section('content')

    <div class="position-relative">
        <img src="{{asset('asset/image/slide2.jpg')}}" alt="Career Resource" width="100%" height="400" style="object-fit: cover; filter: brightness(0.30);">
        <span class="position-absolute top-50 start-50 translate-middle h1 text-light text-center" style="text-shadow: 2px 2px #000;">{{__('text.Camjobs38_resources')}}</span>
    </div>

    <div class="container my-5 bg-white">
        <div class="px-3">
            <ul class="list-group list-group-flush">
                @forelse ( $careers as $career )
                <li class="list-group-item">
                    <div class="row my-3">
                        <div class="col-xl-3 col-lg-3">
                            <img src="{{asset('upload/blogpost/')}}/{{$career->post_img}}" alt="" width="200" height="120">
                        </div>
                        <div class="col-xl-9 col-lg-9 mt-lg-0 mt-3">
                            <a href="career/{{ $career->id }}" class="text-decoration-none text-dark h4">
                                @if (app()->getLocale() == 'ch')
                                    {{ $career->title_ch }}
                                @elseif (app()->getLocale() == 'en')
                                    {{ $career->title_en }}
                                @elseif (app()->getLocale() == 'kh')
                                    {{ $career->title_kh }}
                                @else
                                    {{ $career->title_th }}
                                @endif
                            </a>
                            <div class="mt-3">
                                @if (app()->getLocale() == 'ch')
                                    @php
                                        echo substr($career->post_ch, 0, 400)
                                    @endphp
                                @elseif (app()->getLocale() == 'en')
                                    @php
                                        echo substr($career->post_en, 0, 400)
                                    @endphp
                                @elseif (app()->getLocale() == 'kh')
                                    @php
                                        echo substr($career->post_kh, 0, 400)
                                    @endphp
                                @else
                                    @php
                                        echo substr($career->post_th, 0, 400)
                                    @endphp
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                    <p class="text-center">No career us info. to show</p>
                @endforelse
            </ul>
        </div>

    </div>

    

@endsection
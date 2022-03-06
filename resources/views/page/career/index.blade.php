@extends('layout.layout_app')
@section('title', 'CAREER')
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
                            <img src="{{asset('upload/blogpost/')}}/{{$career->post_img}}" alt="" width="200" height="120" style="object-fit: cover;">
                        </div>
                        <div class="col-xl-9 col-lg-9 mt-lg-0 mt-3">
                            <a href="career/{{ $career->id }}" class="text-decoration-none h4 text_hover">
                                @if (app()->getLocale() == 'ch')
                                    {{ $career->title_ch }}
                                    @if($career->title_ch == null)
                                        {{ $career->title_en }}
                                    @endif
                                @elseif (app()->getLocale() == 'en')
                                    {{ $career->title_en }}
                                @elseif (app()->getLocale() == 'kh')
                                    {{ $career->title_kh }}
                                    @if($career->title_kh == null)
                                        {{ $career->title_en }}
                                    @endif
                                @elseif(app()->getLocale() == 'th')
                                    {{ $career->title_th }}
                                    @if($career->title_th == null)
                                        {{ $career->title_en }}
                                    @endif
                                @else
                                @endif
                            </a>
                            <div class="mt-3">
                                <div style="overflow: hidden;">
                                    @if (app()->getLocale() == 'ch')
                                        @php echo substr($career->post_ch, 0, 500) @endphp
                                        @if($career->post_ch == null)
                                            @php echo substr($career->post_en, 0, 500) @endphp
                                        @endif
                                    @elseif (app()->getLocale() == 'en')
                                        @php echo substr($career->post_en, 0, 500) @endphp
                                    @elseif (app()->getLocale() == 'kh')
                                        @php echo substr($career->post_kh, 0, 500) @endphp
                                        @if($career->post_kh == null)
                                            @php echo substr($career->post_en, 0, 500) @endphp
                                        @endif
                                    @elseif(app()->getLocale() == 'th')
                                        @php echo substr($career->post_th, 0, 500) @endphp
                                        @if($career->post_th == null)
                                            @php echo substr($career->post_en, 0, 500) @endphp
                                        @endif
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                    <p class="text-center">No career us info. to show</p>
                @endforelse
            </ul>
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-md-end justify-content-sm-center mt-2">
            {{ $careers->links() }}
        </div>

    </div>

    

@endsection
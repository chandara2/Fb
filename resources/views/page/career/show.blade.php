@extends('layout.layout_app')
@section('title', 'CAREER')
@section('content')

    <div class="container mt-5">
        <div class="px-3">
            <div class="row gx-5">
                @foreach ( $careers as $career )
                <div class="col-md-8 bg-white">
                    <h2 class="my-3">
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
                    </h2>
                    <img src="{{asset('upload/blogpost/')}}/{{$career->post_img}}" alt="" width="100%" height="350" style="object-fit: contain;">
                    <div class="my-3">
                        @if (app()->getLocale() == 'ch')
                            @php echo $career->post_ch @endphp
                            @if($career->post_ch == null)
                                @php echo $career->post_en @endphp
                            @endif
                        @elseif (app()->getLocale() == 'en')
                            @php echo $career->post_en @endphp
                        @elseif (app()->getLocale() == 'kh')
                            @php echo $career->post_kh @endphp
                            @if($career->post_kh == null)
                                @php echo $career->post_en @endphp
                            @endif
                        @elseif(app()->getLocale() == 'th')
                            @php echo $career->post_th @endphp
                            @if($career->post_th == null)
                                @php echo $career->post_en @endphp
                            @endif
                        @else
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
                                        @if($last->title_ch == null)
                                            {{ $last->title_en }}
                                        @endif
                                    @elseif (app()->getLocale() == 'en')
                                        {{ $last->title_en }}
                                    @elseif (app()->getLocale() == 'kh')
                                        {{ $last->title_kh }}
                                        @if($last->title_kh == null)
                                            {{ $last->title_en }}
                                        @endif
                                    @elseif(app()->getLocale() == 'th')
                                        {{ $last->title_th }}
                                        @if($last->title_th == null)
                                            {{ $last->title_en }}
                                        @endif
                                    @else
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
                            @if($next->title_ch == null)
                                {{ $next->title_en }}
                            @endif
                        @elseif (app()->getLocale() == 'en')
                            {{ $next->title_en }}
                        @elseif (app()->getLocale() == 'kh')
                            {{ $next->title_kh }}
                            @if($next->title_kh == null)
                                {{ $next->title_en }}
                            @endif
                        @elseif(app()->getLocale() == 'th')
                            {{ $next->title_th }}
                            @if($next->title_th == null)
                                {{ $next->title_en }}
                            @endif
                        @else
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection


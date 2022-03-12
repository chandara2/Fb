@extends('layout.layout_app')
@section('title', 'ABOUT US')
@section('content')

@forelse ( $abouts as $about )
<section>
    <div class="position-relative">
        <img src="{{asset('upload/aboutsbanner/')}}/{{$about->banner}}" alt="Banner" width="100%" height="400" style="object-fit: cover; filter: brightness(0.30);">
        <span class="position-absolute top-50 start-50 translate-middle h1 text-light text-center" style="text-shadow: 2px 2px #000;">{{__('text.n1jic')}}</span>
    </div>
</section>

<div class="container my-5">

    @if (app()->getLocale() == 'ch')
        @php echo ($about->aboutus_ch) @endphp
        @if($about->aboutus_ch == null)
            @php echo ($about->aboutus_en) @endphp
        @endif
    @elseif (app()->getLocale() == 'en')
        @php echo ($about->aboutus_en) @endphp
    @elseif (app()->getLocale() == 'kh')
        @php echo ($about->aboutus_kh) @endphp
        @if($about->aboutus_kh == null)
            @php echo ($about->aboutus_en) @endphp
        @endif
    @elseif(app()->getLocale() == 'th')
        @php echo ($about->aboutus_th) @endphp
        @if($about->aboutus_th == null)
            @php echo ($about->aboutus_en) @endphp
        @endif
    @else
    @endif

</div>

@empty
<p class="text-center">No About us info. to show</p>
@endforelse

@endsection
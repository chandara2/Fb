<footer class="brand-bg5 py-5">
    <div class="container">
        <div class="row">
            @forelse ($footercontact as $contact)
            <div class="col-md-4">
                <h3 class="text-decoration-underline">{{ __('text.About_us') }}</h3>
                @if (app()->getLocale() == 'ch')
                    <!-- Summernote -->
                    @php
                        echo $contact->contact_ch
                    @endphp
                    <!-- Summernote -->
                @elseif(app()->getLocale() == 'en')
                    @php
                        echo $contact->contact_en
                    @endphp
                @elseif(app()->getLocale() == 'kh')
                    @php
                        echo $contact->contact_kh
                    @endphp
                @else
                    @php
                        echo $contact->contact_th
                    @endphp             
                @endif
            </div>
            <div class="col-md-4 mt-md-0 mt-sm-3">
                <h3 class="text-decoration-underline">Camjobs38</h3>
                <div>
                    <a href="/about" class="text-decoration-none text-dark">{{ __('text.About_us') }}</a>
                </div>
                <div class="mb-3">
                    <a href="/about" class="text-decoration-none text-dark">{{ __('text.Contact_us') }}</a>
                </div>
                <div class="h4">
                    @forelse ($footersm as $sm)
                        <a href="{{ $sm->social_media_link }}" target="_blank"><img src="{{asset('upload/socialmedia/')}}/{{$sm->social_media}}" alt="Social Media Logo" class="me-1" width="32"></a>
                    @empty
                        <p class="text-center">No Social Media to show</p>
                    @endforelse
                </div>
            </div>
            <div class="col-md-4 mt-md-0 mt-sm-3">
                <h3 class="text-decoration-underline">Camjob38 know your worth</h3>
                <div class="row">
                    @forelse ($footerqrcode as $qrcode)
                        <div class="col-xl-4 col-lg-6">
                            <p class="mb-lg-1 mb-1">{{ $qrcode->app_title }}</p>
                            <a href="{{ $qrcode->qrcode_link }}" target="_blank"><img src="{{asset('upload/qrcode/')}}/{{$qrcode->qrcode}}" alt="Qrcode Logo" class="mb-md-3 mb-3" width="65"></a>
                        </div>
                    @empty
                        <p class="text-center">No Qrcode to show</p>
                    @endforelse
                </div>
            </div>
            @empty
                <p class="text-center">No Footer to show</p>
            @endforelse
        </div>
    </div>
</footer>

<!-- BackToTop Button -->
<a href="javascript:void(0);" id="scroll" style="display: none;">Top<span></span></a>
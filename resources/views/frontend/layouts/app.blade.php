<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
</head>

@if (env('APP_ENV') == 'production')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-45N073QGGQ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-45N073QGGQ');
    </script>

    @if (env('ENABLE_PIXEL'))
        @include('frontend.includes.tags.pixel')
    @endif
@endif

<body class="bg-white">
    @include('includes.partials.read-only')
    @include('includes.partials.logged-in-as')
    @include('includes.partials.announcements')
    @include('includes.partials.profile-completion')

    <div id="app">
        <div>
            @include('frontend.includes.nav')

            <x-frontend.main-section>

                <x-slot name="content">
                    @yield('content')
                </x-slot>

            </x-frontend.main-section>

            @include('frontend.includes.footer')

        </div>
    </div>
    <!--app-->

    <div class="modal fade" id="buyNowModal" tabindex="-1" role="dialog" aria-labelledby="buyNowModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="text-dark-green font-weight-bold">Beli Greenfields di e-commerce <br> kesayanganmu</h2>
                    <div class="social-app-container">
                        @php
                            $configs = config('greenfields.online_stores');
                        @endphp

                        @foreach ($configs as $config)
                        <div class="row">
                            <div class="col-md-3"><img alt="tokopedia" src="{{$config['image']}}" width="1000" height="0" decoding="async" data-nimg="1" loading="lazy" style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">{{$config['title']}}</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center">
                                <a target="_blank" href="{{$config['url']}}" rel="noopener noreferrer">
                                    <button class="btn btn-dark-green" tabindex="0" type="button">Visit
                                        <span class="MuiTouchRipple-root mui-style-w0pj6f"></span>
                                    </button>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('frontend.includes.modals.upload-receipt')

    @stack('before-scripts')
    <livewire:scripts />
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/frontend.js') }}"></script>
    @stack('after-scripts')
</body>

</html>

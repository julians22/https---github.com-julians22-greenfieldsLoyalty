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
                        <div class="row">
                            <div class="col-md-3"><img alt="tokopedia"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1672395480683.png"
                                    width="1000" height="0" decoding="async" data-nimg="1" loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Greenfields
                                    Official Store</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank"
                                    href="https://www.tokopedia.com/greenfields/product"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="Astro"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1673248776929.png"
                                    width="1000" height="0" decoding="async" data-nimg="1" loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Astro</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href="https://astroid.link/3ATKzDaFRtb"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="Japfa best online"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1675275484683.png"
                                    width="1000" height="0" decoding="async" data-nimg="1" loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Japfa best
                                    online</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href="https://linktr.ee/japfabestonline"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="Bananas"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1676257594719.jpg"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Bananas</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href="https://www.bananas.id/"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="shopee"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1672395498499.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Shopee</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank"
                                    href="https://shopee.co.id/mall/search?keyword=greenfields&amp;shop=379357698&amp;trackingId=searchhint-1637205374-e305af3d-481d-11ec-b754-2cea7f471917"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="blibli"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1672395524300.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Greenfields
                                    Official Store</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank"
                                    href="https://www.blibli.com/brand/greenfields-official-store?page=1&amp;start=0&amp;intent=true&amp;brandName=greenfields-official-store&amp;multiCategory=true&amp;sort=7"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="Indomaret Klik"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1672395561020.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Indomaret Klik
                                </p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank"
                                    href="https://www.klikindomaret.com/search/?key=greenfields"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="harnic heles"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1672395592777.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Greenfields
                                    Store</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href="https://harnic.id/url/greenfield"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="sayur-box"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1672395625942.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Sayur Box</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank"
                                    href="https://www.sayurbox.com/search?q=greenfields"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="segari"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1675275507392.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Segari</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href=""
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="Tokonow"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1675275526630.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Tokonow</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href=""
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="grab mart kilat"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1675275545949.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Grabmart kilat
                                </p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href=""
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"><img alt="alfagift"
                                    src="https://greenfields-prod.s3.ap-southeast-1.amazonaws.com/ecommerce/large/1675275615212.png"
                                    width="1000" height="0" decoding="async" data-nimg="1"
                                    loading="lazy"
                                    style="color: transparent; width: 90%; height: auto; object-fit: cover;"></div>
                            <div class="col-md-6 d-flex align-items-center">
                                <p class="m-0">Alfagift</p>
                            </div>
                            <div class="col-md-3 d-flex align-items-center"><a target="_blank" href="https://alfagift.id/find/Greenfields"
                                    rel="noopener noreferrer"><button
                                        class="btn btn-dark-green"
                                        tabindex="0" type="button">Visit<span
                                            class="MuiTouchRipple-root mui-style-w0pj6f"></span></button></a></div>
                        </div>
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

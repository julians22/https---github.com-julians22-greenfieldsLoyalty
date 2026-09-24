@php
    $fixedStyle = "";
    $fixedStyleSecond = "position-relative";
@endphp
@guest
@php
$fixedStyle = "position-fixed w-100";
@endphp
@push('after-scripts')
    <script>
        $(document).ready(function(){
            const white_nav_height = $('#white-navbar').innerHeight();
            $('#main-single-nav').css('paddingTop', `${white_nav_height}px`)
        })
    </script>
@endpush
@else
@php
$fixedStyleSecond = "position-sticky w-100";
@endphp
@endguest

<nav class="navbar navbar-expand-md navbar-light bg-white py-1 py-md-2 {{ $fixedStyle }}" style="z-index: 2;" id="white-navbar">
    <div class="container-fluid">
        <div class="navbar-brand">
            <div class="position-relative d-flex items-center">
                <div class="d-inline-flex align-items-center mr-1">
                    <img src="{{ asset('img/brand/Greenfields Logo_Green.png') }}" alt="" width="180" height="51">
                </div>
                <x-utils.link
                    class="ml-2 text-dark stretched-link"
                    :href="route('frontend.index')">
                    <div class="d-md-inline-block d-none" style="line-height: 1;">
                        KLUB IBU EXTRA <br> <strong>LOYALTY PROGRAM</strong>
                    </div>
                </x-utils.link>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('Toggle navigation')">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="ml-auto navbar-nav">
                @guest
                    @if (
                        Route::is('frontend.index')
                        )
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.pages.terms')"
                                :active="activeClass(Route::is('frontend.pages.terms'))"
                                :text="__('Syarat & Ketentuan')"
                                class="mr-2 nav-link" />
                        </li>
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.pages.privacy')"
                                :active="activeClass(Route::is('frontend.pages.privacy'))"
                                :text="__('Kebijakan Privasi')"
                                class="mr-2 nav-link" />
                        </li>
                    @endif
                @endguest
                @guest
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.auth.login')"
                            :active="activeClass(Route::is('frontend.auth.login'))"
                            :text="__('Login')"
                            class="mr-2 nav-link" />
                    </li>

                    @if (config('boilerplate.access.user.registration'))
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.auth.register')"
                                :active="activeClass(Route::is('frontend.auth.register'))"
                                :text="__('Register')"
                                class="nav-link" />
                        </li>
                    @endif
                @else
                    <li class="mobile-nav-item nav-item {{ activeClass(Route::is('frontend.user.dashboard')) }}">
                        <a class="nav-link" href="{{ route('frontend.user.dashboard') }}">Beranda</a>
                    </li>
                    <li class="mobile-nav-item nav-item {{ activeClass(Route::is('frontend.redeem.index')) }}">
                        <a class="nav-link" href="{{ route('frontend.redeem.index') }}">Tukar Hadiah</a>
                    </li>
                    <li class="mobile-nav-item nav-item {{ activeClass(Route::is('frontend.promo.index')) }}">
                        <a class="nav-link" href="{{ route('frontend.promo.index') }}">Promo &   Aktivitas</a>
                    </li>
                    <li class="mobile-nav-item nav-item {{ activeClass(Route::is('frontend.pages.faq')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.faq') }}">FAQ</a>
                    </li>
                    <li class="mobile-nav-item nav-item {{ activeClass(Route::is('frontend.pages.terms')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.terms') }}">Syarat & Ketentuan</a>
                    </li>
                    <li class="mobile-nav-item nav-item {{ activeClass(Route::is('frontend.pages.privacy')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.privacy') }}">Kebijakan Privasi</a>
                    </li>
                    <li class="mobile-nav-item nav-item">
                        <a data-toggle="modal" data-target="#buyNowModal" class="nav-link" href="#beli-sekarang">Beli Sekarang</a>
                    </li>
                    <li class="mobile-nav-item nav-item">
                        <x-utils.link
                            :href="route('frontend.user.account')"
                            :active="activeClass(Route::is('frontend.user.account'))"
                            :text="__('Profile')"
                            class="btn-block mr-2 btn-rounded btn btn-dark-green" />
                    </li>


                    <li class="mobile-nav-item nav-item">
                        <x-utils.link
                            :text="__('Logout')"
                            class="btn-block my-2 my-sm-0 btn-rounded btn btn-dark-green"
                            onclick="event.preventDefault();document.getElementById('logout-form-mobile').submit();">
                            <x-slot name="text">
                                @lang('Logout')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form-mobile" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                    </li>
                    <li class="desktop-nav-item nav-item">
                        <a class="nav-link" href="#">
                            Selamat datang, {{ $logged_in_user->name }}
                        </a>
                    </li>

                    @if ($logged_in_user->isAdmin())
                        <li class="desktop-nav-item nav-item">
                            <x-utils.link
                                :href="route('admin.dashboard')"
                                :active="false"
                                :text="__('Admin Dashboard')"
                                class="mr-2 btn-rounded btn btn-dark-green" />
                        </li>
                    @else
                        <li class="desktop-nav-item nav-item">
                            <x-utils.link
                                :href="route('frontend.user.account')"
                                :active="activeClass(Route::is('frontend.user.account'))"
                                :text="__('Profile')"
                                class="mr-2 btn-rounded btn btn-dark-green" />
                        </li>
                    @endif



                    <li class="desktop-nav-item nav-item">
                        <x-utils.link
                            :text="__('Logout')"
                            class="my-2 my-sm-0 btn-rounded btn btn-dark-green"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Logout')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                    </li>

                    <div class="point-card-wrapper">
                        <div class="card-wrapper">
                            <div class="header">
                                <div></div>
                                <div></div>
                            </div>

                            <div class="body">

                            </div>
                        </div>
                    </div>
                @endguest
            </ul>
        </div><!--navbar-collapse-->
        @auth
        <div class="point-wrapper-mobile">
            <div class="bg-dark-green p-2 rounded-lg">
                <div class="text-center point">
                    <p class="mb-1 text-white"><strong>POIN KAMU</strong></p>
                    <p class="text-gold h1"><strong>{{ number_format($logged_in_user->point, 0, ".", ".") }}</strong></p>
                </div>
                @if ($logged_in_user->isUser())
                    <button class="btn-block btn-rounded font-weight-bold text-white btn btn-gold" data-toggle="modal" data-target="#uploadReceiptModal" type="button">UPLOAD STRUK & TUKARKAN HADIAH</button>
                @endif
            </div>
        </div>
        @endauth

    </div><!--container-->
</nav>

@auth

<div style="z-index: 2; top: 0;" class="shadow-lg  d-none d-md-block {{ $fixedStyleSecond }}">
    <nav class="py-0 navbar navbar-expand-md navbar-light navbar-stack">

        <div class="justify-content-between container-fluid">
            {{-- <div class="d-flex"> --}}
                <ul class="navbar-nav">
                    <li class="nav-item {{ activeClass(Route::is('frontend.user.dashboard')) }}">
                        <a class="nav-link" href="{{ route('frontend.user.dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.redeem.index')) }}">
                        <a class="nav-link" href="{{ route('frontend.redeem.index') }}">Tukar<br>Hadiah</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.promo.index')) }}">
                        <a class="nav-link" href="{{ route('frontend.promo.index') }}">Promo & <br> Aktivitas</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.pages.faq')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.faq') }}">FAQ</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.pages.terms')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.terms') }}">Syarat &<br>Ketentuan</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.pages.privacy')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.privacy') }}">Kebijakan<br>Privasi</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="modal" data-target="#buyNowModal" class="nav-link" href="#beli-sekarang">Beli<br>Sekarang</a>
                    </li>
                </ul>

                <div class="point-card-wrapper">
                    <div class="card-wrapper">
                        <div class="header">
                            <div></div>
                            <div>POIN KAMU</div>
                            <div></div>
                        </div>

                        <div class="body">
                            <div class="point">
                                {{ number_format($logged_in_user->point, 0, ".", ".") }}
                            </div>
                            @if ($logged_in_user->isUser() && $logged_in_user->isHasDetail() && $logged_in_user->isWhatsappVerified())
                                <button class="btn-rounded font-weight-bold text-white btn btn-gold" data-toggle="modal" data-target="#uploadReceiptModal" type="button">UPLOAD STRUK & <br> TUKARKAN HADIAH</button>
                            @else
                                <button class="btn-rounded font-weight-bold text-white btn btn-gold disabled" type="button">UPLOAD STRUK & <br> TUKARKAN HADIAH</button>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- </div> --}}

        </div> <!-- container -->
    </nav>

    <div class="nav-border"></div>
</div>
@endauth


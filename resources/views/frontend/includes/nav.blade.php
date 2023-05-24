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
            <div class="d-flex items-center position-relative">
                <div class="d-inline-flex align-items-center mr-1">
                    <img src="{{ asset('img/brand/1x/Logo.png') }}" alt="" width="160" height="36">
                </div>
                <x-utils.link
                    class="stretched-link text-dark ml-2"
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
            <ul class="navbar-nav ml-auto">
                @guest
                    @if (
                        Route::is('frontend.index')
                        )
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.pages.terms')"
                                :active="activeClass(Route::is('frontend.pages.terms'))"
                                :text="__('Syarat & Ketentuan')"
                                class="nav-link mr-2" />
                        </li>
                        <li class="nav-item">
                            <x-utils.link
                                :href="route('frontend.pages.privacy')"
                                :active="activeClass(Route::is('frontend.pages.privacy'))"
                                :text="__('Kebijakan Privasi')"
                                class="nav-link mr-2" />
                        </li>
                    @endif
                @endguest
                @guest
                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.auth.login')"
                            :active="activeClass(Route::is('frontend.auth.login'))"
                            :text="__('Login')"
                            class="nav-link mr-2" />
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Selamat datang, {{ $logged_in_user->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.user.account')"
                            :active="activeClass(Route::is('frontend.user.account'))"
                            :text="__('Profile')"
                            class="btn btn-dark-green btn-rounded mr-2" />
                    </li>


                    <li class="nav-item">
                        <x-utils.link
                            :text="__('Logout')"
                            class="btn btn-dark-green my-2 my-sm-0 btn-rounded"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Logout')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                    </li>
                @endguest
            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>

@auth

<div style="z-index: 2; top: 0;" class="shadow-lg  d-none d-md-block {{ $fixedStyleSecond }}">
    <nav class="navbar navbar-expand-md navbar-light py-0 navbar-stack">

        <div class="container-fluid justify-content-between">
            {{-- <div class="d-flex "> --}}
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
                            <div>POINT KAMU</div>
                            <div></div>
                        </div>

                        <div class="body">
                            <div class="point">
                                8,000
                            </div>
                            <button class="btn btn-gold btn-rounded font-weight-bold text-white">UPLOAD STRUK & <br> TUKARKAN HADIAH</button>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}

        </div> <!-- container -->
    </nav>

    <div class="nav-border"></div>
</div>
@endauth


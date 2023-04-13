<nav class="navbar navbar-expand-md navbar-light bg-white py-md-4" style="z-index: 2;">
    <div class="container">
        <div class="navbar-brand">
            <div class="d-flex items-center position-relative">
                <div class="d-inline-flex align-items-center mr-1">
                    <img src="{{ asset('img/brand/1x/Logo.png') }}" alt="" width="160" height="36">
                </div>
                <x-utils.link
                    class="stretched-link text-dark ml-2"
                    :href="route('frontend.index')">
                    <div class="d-inline-block" style="line-height: 1;">
                        LOYALTY <br>PROGRAM
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
                        <a class="nav-link" href="javascript.void()">
                            Selamat datang, {{ $logged_in_user->name }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <x-utils.link
                            :href="route('frontend.user.account')"
                            :active="activeClass(Route::is('frontend.user.account'))"
                            :text="__('My Account')"
                            class="btn btn-secondary mr-2 rounded-0" />
                    </li>


                    <li class="nav-item">
                        <x-utils.link
                            :text="__('Logout')"
                            class="btn btn-cyan my-2 my-sm-0 rounded-0"
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

<div style="z-index: 1;" class="shadow-lg position-relative">
    <nav class="navbar navbar-expand-md navbar-light py-0 navbar-stack">

        <div class="container justify-content-between">
            {{-- <div class="d-flex "> --}}
                <ul class="navbar-nav">
                    <li class="nav-item {{ activeClass(Route::is('frontend.user.dashboard')) }}">
                        <a class="nav-link" href="{{ route('frontend.user.dashboard') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aktivitas</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.redeem.index')) }}">
                        <a class="nav-link" href="{{ route('frontend.redeem.index') }}">Tukar <br>Hadiah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item {{ activeClass(Route::is('frontend.pages.terms')) }}">
                        <a class="nav-link" href="{{ route('frontend.pages.terms') }}">Syarat & <br>Ketentuan</a>
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
                            <button class="btn btn-cyan rounded-0">UPLOAD STRUK</button>
                        </div>
                    </div>
                </div>
            {{-- </div> --}}

        </div> <!-- container -->
    </nav>

    <div class="nav-border"></div>
</div>

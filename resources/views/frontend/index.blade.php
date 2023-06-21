@extends('frontend.layouts.app')

@section('title', __('Greenfields Klub Ibu Extra'))

@section('content')
<div class="position-relative">
    @include('frontend.includes.banner')

    <div class="welcome-text">
        <img src="{{ asset('img/decorations/welcome_text.png') }}" alt="">

        <p class="text-center font-weight-bolder h3 mt-n4 welcome-item">
            Raih banyak keuntungan eksklusif yang sayang untuk dilewatkan!
        </p>
    </div>
</div>

<div>

    <div class="container-fluid landing-deck">
        <div class="row justify-content-center">
            <div class="col-md-7 col-12">
                @auth
                @if ($logged_in_user->isHasDetail() && $logged_in_user->isHasAddressData() && $logged_in_user->isWhatsappVerified())
                    <div class="alert alert-dark-green heartbeat">
                        Kamu berhak mendapatkan promo khusus anggota baru: <strong>{{ $logged_in_user->voucher->code }}</strong>.  <a href="{{ route('frontend.pages.terms') }}">Cek syarat & ketentuan disini.</a>
                    </div>
                @else
                    <div class="alert alert-warning">
                        Ayo, lengkapi profil kamu sekarang untuk mendapatkan promo khusus anggota baru dari greenfields! <a href="{{ route('frontend.user.edit-account') }}">Klik disini</a>
                    </div>
                @endif
                @endauth
                <div class="d-flex flex-md-row flex-column justify-content-around w-100">
                    <img class="deck-icon" src="{{ asset('img/decorations/exchange_icon.png') }}" alt="">
                    <img class="deck-icon" src="{{ asset('img/decorations/promo_icon.png') }}" alt="">
                    <img class="deck-icon" src="{{ asset('img/decorations/special_icon.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-7">
                @guest
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card bg-gray-light border-0 shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-col justify-content-center align-content-center" style="height: 5rem;">
                                        <p class="text-center h4 font-weight-bold">Sudah menjadi anggota Greenfields Klub Ibu Extra?</p>
                                    </div>
                                    <div class="text-center">
                                        <x-utils.link
                                            :href="route('frontend.auth.login')"
                                            :active="activeClass(Route::is('frontend.auth.login'))"
                                            :text="__('Login')"
                                            class="btn btn-rounded btn-green" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-gray-light border-0 shadow">
                                <div class="card-body">
                                    <div class="d-flex flex-col justify-content-center align-content-center" style="height: 5rem;">
                                        <p class="text-center h4 font-weight-bold">Belum Punya akun?</p>
                                    </div>
                                    <div class="text-center">
                                        <x-utils.link
                                            :href="route('frontend.auth.register')"
                                            :active="activeClass(Route::is('frontend.auth.register'))"
                                            :text="__('Register')"
                                            class="btn btn-rounded btn-green" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest

            </div>
        </div>
        @include('frontend.includes.about-us')
    </div>

</div>
@endsection

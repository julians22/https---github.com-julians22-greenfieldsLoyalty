@extends('frontend.layouts.app')

@section('title', __('Welcome'))

@section('content')
<div class="position-relative">
    @include('frontend.includes.banner')

    <div class="position-absolute welcome-text">
        <img src="{{ asset('img/decorations/welcome_text.png') }}" alt="">

        <p class="text-center font-weight-bolder h3 mt-n4">
            Raih banyak keuntungan eksklusif yang sayang untuk dilewatkan!
        </p>
    </div>
</div>

<div>

    <div class="container-fluid landing-deck">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="d-flex justify-content-around w-100">
                    <img class="deck-icon" src="{{ asset('img/decorations/exchange_icon.png') }}" alt="">
                    <img class="deck-icon" src="{{ asset('img/decorations/promo_icon.png') }}" alt="">
                    <img class="deck-icon" src="{{ asset('img/decorations/special_icon.png') }}" alt="">
                </div>

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
    </div>
</div>
@endsection

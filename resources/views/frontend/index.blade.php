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
            <div class="col-md-7 col-10">
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
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 text-center text-dark-green">
                    <h2>
                        <div class="page_title">
                            <img src="{{ asset('img/decorations/about_titletext.png') }}" alt="">
                        </div>
                    </h2>
                    <p class="font-weight-bold text-center">
                        Greenfields Klub Ibu Extra merupakan loyalty program yang diselenggarakan oleh PT Greenfields Dairy Indonesia sebagai bentuk apresiasi bagi para ibu Indonesia yang sudah setia memilih Greenfields sebagai pilihan nutrisi keluarga.

                        Kami juga berdedikasi untuk mengedukasi para ibu Indonesia supaya lebih bijak dalam memilih susu berkualitas terbaik dengan menyediakan berbagai aktivitas menarik, mulai dari artikel yang dapat diakses serta program Webinar/Kulwap. Yuk #StartFresh dengan Greenfields!

                        Kumpulkan poin sebanyak-banyaknya & dapatkan hadiah favoritmu.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

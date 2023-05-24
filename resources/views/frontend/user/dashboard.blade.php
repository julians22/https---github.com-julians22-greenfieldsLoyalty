@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="position-relative">
    @include('frontend.includes.banner')

    <div class="welcome-text">
        <img src="{{ asset('img/decorations/welcome_user_text.png') }}" alt="">

        <p class="mt-n4 welcome-item">
            Raih banyak keuntungan eksklusif yang sayang untuk dilewatkan!
        </p>
    </div>
</div>

<div>

    <div class="container-fluid landing-deck">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex flex-md-column flex-lg-row flex-column justify-content-center w-100">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="step_box">
                            <img src="{{ asset('img/decorations/steps/step_'.$i.'_icon.png') }}" alt="" class="illustration illustration-{{$i}}">
                            <div class="description">
                                <img src="{{ asset('img/decorations/steps/step_'.$i.'_text.png') }}" alt="">
                                @switch($i)
                                    @case(1)
                                        <p>Isi data diri kamu di website www.loyalty.greenfieldsdairy.com atau di Whatsapp 0878-8259-6040</p>
                                        @break
                                    @case(2)
                                        <p>Untuk setiap pembelanjaan produk Greenfields akan mendapatkan poin tertentu</p>
                                        @break
                                    @case(3)
                                        <p>Tukar dengan hadiah menarik sesuai poin yang ditentukan</p>
                                        @break
                                    @default
                                @endswitch
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="row justify-content-center mb-3">
                    <div class="col-md-3 text-center">
                        <a href="{{ route('frontend.redeem.index') }}" class="btn-green btn py-1 px-5 rounded-pill text-white font-weight-bold">Tukar Poin Sekarang</a>
                    </div>
                </div>
                <div id="katalog-carousel" class="splide splide-b" aria-label="Katalog Produk">
                    <div class="splide__track">
                          <div class="splide__list">
                            @foreach ($rewards as $reward)
                                <div class="splide__slide">
                                    <div class="card card-reward">
                                        <div class="card-body">
                                            <div class="reward-img-wrapper">
                                                <img src="{{ asset('img/'.$reward->image) }}" alt="{{ $reward->name }}" class="reward-img">
                                            </div>

                                            <div class="reward-detail-wrapper">
                                                <h4 class="card-title text-center">{{ $reward->name }}</h4>
                                                <p class="point">{{$reward->point}}pts</p>
                                            </div>
                                            <a class="btn mb-3 btn-rounded  {{ $reward->point > $logged_in_user->point ? 'disabled btn-secondary' : 'btn-green' }}" href="#">TUKAR HADIAH</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                          </div>
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
    </div>
</div>
@endsection

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
                                                <img src="{{ $reward->image }}" alt="{{ $reward->name }}" class="reward-img">
                                            </div>

                                            <div class="reward-detail-wrapper">
                                                <h4 class="card-title text-center">{{ $reward->name }}</h4>
                                                <p class="point">{{$reward->point}}pts</p>
                                            </div>
                                            @if ($reward->point > $logged_in_user->point)
                                                <a class="btn mb-3 btn-rounded disabled btn-secondary btn-green" href="javascript:void(0)">TUKAR HADIAH</a>
                                            @else
                                                <a class="btn mb-3 btn-rounded btn-green" href="#"
                                                    data-toggle="modal"
                                                    data-target="#redeemModal"
                                                    data-reward-id="{{ $reward->id }}"
                                                    data-reward-image="{{ asset('img/'.$reward->image) }}" alt="{{ $reward->name }}"
                                                    data-reward-name="{{ $reward->name }}"
                                                    data-reward-current-point="{{ $logged_in_user->point }}"
                                                    data-reward-point="{{ $reward->point }}">TUKAR HADIAH</a>
                                            @endif
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

@push('before-scripts')
<div class="modal fade" id="redeemModal" data-backdrop="static" tabindex="-1" aria-labelledby="redeemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="page_title text-center">
                        <img src="{{ asset('img/decorations/grats_titletext.png') }}" alt="">
                        <h4 class="text-black">Kamu bisa menukarkan poinmu dengan</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-reward">
                        <div class="card-body">
                            <div class="reward-img-wrapper">
                                <img src="" class="reward-img">
                            </div>

                            <div class="reward-detail-wrapper">
                                <h4 class="card-title text-center"></h4>
                                <p class="point"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center mt-4">
                <div class="text-black font-weight-bold px-4 text-center reedem_cur_user_point"></div>
                <div class="text-black font-weight-bold px-4 text-center"> - </div>
                <div class="text-black font-weight-bold px-4 text-center reedem_reward_point"></div>
                <div class="text-black font-weight-bold px-4 text-center reedem_"> = </div>
                <div class="text-black font-weight-bold px-4 text-center reedem_total_user_point"></div>
            </div>

            <div class="row pb-5">
                <div class="col-md-12">
                    <h4 class="text-black text-center">Hadiah akan dikirim ke alamat:</h4>
                    <input type="hidden" name="address_id">
                </div>
            </div>

            <div class="row d-flex justify-content-between">
                <div class="col-md-2">
                    <button data-dismiss="modal" class="btn btn-secondary btn-rounded">Batal</button>
                </div>
                <div class="col-md-2 text-right">
                    <button class="btn btn-dark-green btn-rounded">Setuju</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endpush

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
            <div class="col-12 col-xl-10">
                @if ($logged_in_user->isUser())
                    @if ($logged_in_user->isHasDetail() && $logged_in_user->isHasAddressData() && $logged_in_user->isWhatsappVerified())
                        @if ($logged_in_user->isWebUser() || $logged_in_user->isWhatsappUser())
                            @if ($logged_in_user->voucher)
                            <div class="alert alert-dark-green heartbeat">
                                Kamu berhak mendapatkan promo khusus anggota baru: <strong>{{ $logged_in_user->voucher->code }}</strong>.  <a href="{{ route('frontend.promo.index') }}?show=promo-khusus-anggota-baru">Cek syarat & ketentuan disini.</a>
                            </div>
                            @endif
                        @elseif ($logged_in_user->isWebQrUser())
                            @if ($logged_in_user->offline_reward)
                            <div class="alert alert-dark-green heartbeat">
                                Kamu berhak mendapatkan hadiah khusus anggota baru berupa <strong>{{ $logged_in_user->offline_reward->reward->name }}</strong>.  Akan dikirim ke alamat kamu dalam 14x24 jam (Hari kerja).
                            </div>
                            @endif
                        @endif
                    @else
                        <div class="alert alert-warning">
                            Ayo, lengkapi profil kamu sekarang untuk mendapatkan promo khusus anggota baru dari greenfields! <a href="{{ route('frontend.user.edit-account') }}">Klik disini</a>
                        </div>
                    @endif
                @endif
                <div class="d-flex flex-md-column flex-lg-row flex-column justify-content-between w-100">
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="step_box">
                            <img src="{{ asset('img/decorations/steps/step_'.$i.'_icon.png') }}" alt="" class="illustration illustration-{{$i}}">
                            <div class="description">
                                <img src="{{ asset('img/decorations/steps/step_'.$i.'_text.png') }}" alt="">
                                @switch($i)
                                    @case(1)
                                        <p>Isi data diri kamu di situs <a href="https://www.klubibuextra.greenfields.id">www.klubibuextra.greenfields.id</a> atau di Whatsapp 0851-7210-0967</p>
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
                        <a href="{{ route('frontend.redeem.index') }}" class="btn-dark-green btn py-1 px-5 rounded-pill text-white font-weight-bold">Tukar Poin Sekarang</a>
                    </div>
                </div>
                <div id="katalog-carousel" class="splide splide-c" aria-label="Katalog Produk">
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
                                                <p class="point">{{number_format($reward->point, 0, ".", ".")}} poin</p>
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

                @include('frontend.includes.about-us')
            </div>
        </div>
    </div>
</div>
@endsection

@push('before-scripts')
<div class="modal fade" id="redeemModal" data-backdrop="static" tabindex="-1" aria-labelledby="redeemModalLabel" aria-hidden="true" wire:ignore>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page_title text-center">
                            <h1 class="title_text" title="Selamat">Selamat</h1>
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

                <div class="d-flex flex-column flex-md-row justify-content-center align-items-center mt-4">
                    <div class="text-black font-weight-bold px-4 text-center reedem_cur_user_point"></div>
                    <div class="text-black font-weight-bold px-4 text-center"> - </div>
                    <div class="text-black font-weight-bold px-4 text-center reedem_reward_point"></div>
                    <div class="text-black font-weight-bold px-4 text-center reedem_"> = </div>
                    <div class="text-black font-weight-bold px-4 text-center reedem_total_user_point"></div>
                </div>

                @if (!empty($address_data))

                <div class="row pb-5">
                    <div class="col-md-12">
                        <h5 class="text-black text-center">Hadiah akan dikirim ke alamat:</h5>
                        <input type="hidden" name="address_id" id="current_address_id" value="{{ $address_data->id }}">
                        <input type="hidden" name="redeem_id" id="current_redeem_id">
                        <div class="row mt-2">
                            <div class="col-md-6 offset-md-3">
                                <p id="current_address" class="text-black font-weight-bold text-center mb-0">{{ $address_data->address }},</p>
                                <p id="current_province" class="text-black font-weight-bold text-center mb-0">{{ $address_data->rel_province->name }},</p>
                                <p id="current_city" class="text-black font-weight-bold text-center mb-0">{{ $address_data->rel_city->name }},</p>
                                <p id="current_district" class="text-black font-weight-bold text-center mb-0">{{ $address_data->rel_district->name }},</p>
                                <p id="current_postcode" class="text-black font-weight-bold text-center">{{ $address_data->postal_code }}</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="{{ route('frontend.user.edit-account') }}?from=redeem" class="btn btn-secondary rounded-pill">Ubah Alamat Pengiriman</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-between">
                    <div class="col-6 col-md-2">
                        <button data-dismiss="modal" class="btn btn-secondary btn-rounded">Batal</button>
                    </div>
                    <div class="col-6 col-md-2 text-right">
                        <button class="btn btn-dark-green btn-rounded" id="submit-reward" data-submit-url="{{ route('frontend.ajax.redeem.store') }}">Setuju</button>
                    </div>
                </div>
                @else
                    <div class="col-md-12 text-center">
                        <a href="{{ route('frontend.user.edit-account') }}?from=redeem" class="btn btn-dark-green shadow rounded-pill">Ayo lengkapi alamat kamu untuk melanjutkan penukaran hadiah</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div class="img-header d-flex align-items-center">

                    <h3 class="text-center text-dark-green mx-auto" style="width: 75%">Terima kasih telah melakukan penukaran hadiah. Mohon menunggu 14x24 jam (Hari Kerja) untuk pengiriman hadiah langsung ke rumahmu ya.</h3>

                    <div class="remaining-points-wrapper">
                        <div class="d-flex flex-column flex-md-row align-items-center">SISA POIN KAMU SAAT INI: <span id="remaining-poin"></span> Poin</div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="row pt-5 justify-content-center">
                    <div class="col-md-12">
                        <h4 class="text-center">Yuk tukarkan poin dengan produk lainnya</h4>
                    </div>
                    <div class="col-md-10">
                        <div id="katalog-carousel" class="splide splide-b" aria-label="Katalog Produk">
                            <div class="splide__track">
                                  <div class="splide__list">
                                    @foreach ($rewardsRecommendation as $reward)
                                        <div class="splide__slide">
                                            <div class="card card-reward">
                                                <div class="card-body">
                                                    <div class="reward-img-wrapper">
                                                        <img src="{{ $reward->image }}" alt="{{ $reward->name }}" class="reward-img">
                                                    </div>

                                                    <div class="reward-detail-wrapper">
                                                        <h4 class="card-title text-center" style="font-size: 16px">{{ $reward->name }}</h4>
                                                        <p class="point" style="font-size: 12px">{{number_format($reward->point, 0, '.', '.')}} poin</p>
                                                    </div>
                                                    <a class="btn btn-sm mb-3 btn-rounded btn-secondary btn-green" href="{{ route('frontend.redeem.index') }}">TUKAR HADIAH</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endpush

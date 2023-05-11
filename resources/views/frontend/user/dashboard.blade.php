@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="position-relative">
    @include('frontend.includes.banner')

    <div class="position-absolute welcome-text">
        <img src="{{ asset('img/decorations/welcome_user_text.png') }}" alt="">

        <p class="text-center font-weight-bolder h3 mt-n4">
            Raih banyak keuntungan eksklusif yang sayang untuk dilewatkan!
        </p>
    </div>
</div>

<div>

    <div class="container-fluid landing-deck">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="d-flex justify-content-center w-100">
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
    </div>
</div>
@endsection

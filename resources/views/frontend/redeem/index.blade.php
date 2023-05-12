@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="page_title">
                <img src="{{ asset('img/decorations/redeem_titletext.png') }}" alt="">
            </div>
            <div class="row">
                <div class="col-md-12 greenfields-form">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <select name="category" id="category" class="form-control">
                                <option value="" disabled selected>Kategori Produk</option>
                                @for ($i = 1; $i < 5; $i++)
                                    <option value="cat-{{$i}}">Kategori {{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-md-4">
                            <input type="text" name="terms" placeholder="Masukkan Pencarian" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-md-3">
                @foreach ($rewards as $reward)
                    <div class="col mb-4">
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
</div>
@endsection

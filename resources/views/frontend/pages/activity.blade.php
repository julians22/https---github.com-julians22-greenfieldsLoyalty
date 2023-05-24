@extends('frontend.layouts.app')

@section('title', __('Promo & Activities'))

@section('content')
    <div class="container-fluid pt-5 pb-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="page_title">
                    <img src="{{ asset('img/decorations/promo_titletext.png') }}" alt="">
                </div>

                <div class="row row-cols-md-3">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="col mb-4">
                            <div class="card card-activity" data-target="{{$i}}" data-toggle="activity-popup">
                                <div class="card-body">
                                    <div class="activity-img-wrapper">
                                        <img src="{{ asset('dummy/activities/act-1.jpg') }}" class="activity-img">
                                    </div>

                                    <div class="activity-detail-wrapper">
                                        <h4 class="card-title">Webinar</h4>
                                        <span class="badge badge-dark-green schedule-badge">Coming Soon</span>
                                        <p class="excerpt">
                                            @php
                                                $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, veritatis cupiditate harum dolores laudantium, dolorem quia in saepe sed unde ex culpa provident qui hic molestias amet recusandae ea tempore.';
                                            @endphp
                                            {{ Str::limit($text, 110, '...') }}
                                        </p>
                                    </div>
                                    {{-- <a class="btn mb-3 btn-rounded  {{ $reward->point > $logged_in_user->point ? 'disabled btn-secondary' : 'btn-green' }}" href="#">TUKAR HADIAH</a> --}}
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <div class="activity-popup">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div id="activity-carousel" class="splide splide-activity" aria-label="Activity Carousel">
                    <div class="splide__track">
                        <div class="splide__list">
                            @for ($i = 0; $i < 4; $i++)
                            <div class="splide__slide">
                                <div class="activity-item">
                                    <span class="h4 text-white close-activity">
                                        <i class="fas fa-close"></i>
                                    </span>
                                    <div class="card card-activity">
                                        <div class="card-body">

                                            <div class="activity-detail-wrapper">
                                                <h1 class="card-title">Webinar {{$i}}</h1>
                                                <span class="badge badge-dark-green schedule-badge">Coming Soon</span>
                                                <p class="excerpt">
                                                    @php
                                                        $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, veritatis cupiditate harum dolores laudantium, dolorem quia in saepe sed unde ex culpa provident qui hic molestias amet recusandae ea tempore.';
                                                    @endphp
                                                    {{ $text }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

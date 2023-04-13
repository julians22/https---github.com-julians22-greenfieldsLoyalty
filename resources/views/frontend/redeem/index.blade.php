@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
    <div class="container pb-4 pt-5">
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($rewards as $reward)
                <div class="col mb-4">
                    <div class="card card-reward">
                        <div class="card-body">
                            <div class="reward-panel">
                                <img src="{{ asset('img/sample-reward.png') }}" alt="{{ $reward->name }}" class="reward-img">

                                <div class="point-badge">
                                    <h3>
                                        {{$reward->point}}
                                    </h3>
                                    <small>pts</small>
                                </div>
                            </div>
                            <h4 class="card-title text-center">{{ $reward->name }}</h4>
                            <a class="btn mb-3 rounded-0 {{ $reward->point > $logged_in_user->point ? 'disabled btn-secondary' : 'btn-cyan' }}" href="#">TUKAR HADIAH</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('frontend.layouts.app')

@section('title', __('Terms & Conditions'))

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="page_title">
                <img src="{{ asset('img/decorations/redeem_titletext.png') }}" alt="">
            </div>
            @livewire('frontend.redeem-component')
        </div>
    </div>
</div>
@endsection

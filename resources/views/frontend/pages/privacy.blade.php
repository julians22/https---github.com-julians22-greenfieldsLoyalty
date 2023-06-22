@extends('frontend.layouts.app')

@section('title', __('Kebijakan Privasi'))

@section('content')
    <div class="container-fluid pt-5 pb-4">
        <div class="row">
            <div class="col-md-10 ml-0 ml-md-5">
                <x-frontend.card>
                    <x-slot name="body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="page_title">
                                    <img src="{{ asset('img/decorations/privacy_titletext.png') }}" alt="">
                                </div>
                                {!! $privacy->long_text_value !!}
                            </div>
                        </div>
                    </x-slot>
                </x-frontend.card>
            </div>
        </div>
        <!--row-->
    </div>
    <!--container-->
@endsection

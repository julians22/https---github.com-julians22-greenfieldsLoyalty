@extends('frontend.layouts.app')

@section('title', __('FAQ'))

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="row">
        <div class="col-md-10 ml-0 ml-md-5">
            <x-frontend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/faq_titletext.png') }}" alt="">
                            </div>
                            <div class="accordion" id="accordionFaq">
                                @foreach ($faqs as $faq)
                                    <div class="card-faq">
                                        <div class="question-wrapper" id="heading{{$faq->id}}">
                                            <h2 class="mb-0" style="max-width: 70%">
                                                {{$faq->title}}
                                            </h2>
                                            <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}"
                                                aria-expanded="true" aria-controls="collapse{{$faq->id}}">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>

                                        <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}"
                                            data-parent="#accordionFaq">
                                            <div class="card-body">
                                                <h4 class="text-dark-green">{{ $faq->question }}</h4>
                                                <div class="answer-content">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>
@endsection

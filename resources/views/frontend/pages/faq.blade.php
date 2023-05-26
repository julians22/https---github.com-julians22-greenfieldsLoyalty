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
                                @for ($i = 0; $i < 5; $i++)
                                    <div class="card-faq">
                                        <div class="question-wrapper" id="heading{{$i}}">
                                            <h2 class="mb-0" style="max-width: 70%">
                                                Collapsible Group Item #{{$i}}
                                            </h2>
                                            <button class="collapsed shadow" type="button" data-toggle="collapse" data-target="#collapse{{$i}}"
                                                aria-expanded="true" aria-controls="collapse{{$i}}">
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </div>

                                        <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}"
                                            data-parent="#accordionFaq">
                                            <div class="card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                                                squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                                single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                                                lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                                                probably haven't heard of them accusamus labore sustainable VHS.
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>
@endsection

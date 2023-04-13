@extends('frontend.layouts.app')

@section('title', __('FAQ'))

@section('content')
    <div class="container pb-4 pt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionFaq">
                    <div class="card-faq">
                        <div class="question-wrapper" id="headingOne">
                            <h2 class="mb-0" style="max-width: 70%">
                                Collapsible Group Item #1
                            </h2>
                            <button class="btn btn-link ml-auto" type="button" data-toggle="collapse" data-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
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
                </div>
            </div>
        </div>
    </div>
@endsection

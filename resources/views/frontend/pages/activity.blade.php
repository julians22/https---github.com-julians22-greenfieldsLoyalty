@extends('frontend.layouts.app')

@section('title', __('Promo & Aktivitas'))

@section('content')
    <div class="container-fluid pt-md-5 pb-md-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="page_title">
                    <img src="{{ asset('img/decorations/promo_titletext.png') }}" alt="">
                </div>

                <div class="row row-cols-1 row-cols-md-3">
                    @for ($i = 0; $i < 4; $i++)
                        @php
                            $text = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel blanditiis pariatur excepturi corporis debitis aut voluptatibus harum saepe dolore, velit, illum nobis. Suscipit, officia! Totam doloribus quibusdam ducimus placeat tempore! Nemo quidem repellat eos vitae dolorem nostrum delectus quo amet quibusdam voluptate pariatur, veniam dolor porro, tempora consectetur possimus quam?';
                        @endphp
                        <div class="col mb-4">
                            <div class="card card-activity" data-title="Webinar" data-times="Coming Soon" data-content="{{$text}}">
                                <div class="card-body">
                                    <div class="activity-img-wrapper">
                                        <img src="{{ asset('dummy/activities/act-1.jpg') }}" class="activity-img">
                                    </div>

                                    <div class="activity-detail-wrapper">
                                        <h4 class="card-title">Webinar</h4>
                                        <span class="badge badge-dark-green schedule-badge">Coming Soon</span>
                                        <p class="excerpt">
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
@endsection

@push('before-scripts')
<div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-10">
                    <div class="page_title mb-1">
                        <h1 class="title_text" title="Activity">Activity</h1>
                    </div>
                </div>
                <div class="col">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div id="times" class="mb-2"></div>
                    <div id="content">

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endpush

@push('after-scripts')
    <script>
        $('.card-activity').on('click', function(event){
            $('#activityModal').modal('show');
            const card = $(event.delegateTarget);
            const content = $(card).data('content');
            const times = $(card).data('times');
            const title = $(card).data('title');

            const ModalItem = $('#activityModal');

            $(ModalItem).find('.title_text').text(`${title}`).attr('title', title)
            $(ModalItem).find('#content').html(`${content}`)
            $(ModalItem).find('#times').html(`<span class="badge badge-dark-green schedule-badge">${times}</span>`)
            console.log(content);

        })
    </script>
@endpush

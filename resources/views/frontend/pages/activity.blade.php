@extends('frontend.layouts.app')

@section('title', __('Promo & Aktivitas'))

@section('content')
    <div class="container-fluid pt-5 pb-md-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="page_title">
                    {{-- <img src="{{ asset('img/decorations/promo_titletext.png') }}" alt=""> --}}
                    <h1 class="title_text" title="Nikmati Promo & Aktivitas Menarik Kami">Nikmati Promo & Aktivitas Menarik Kami</h1>

                </div>

                <div class="row row-cols-1 row-cols-md-3">
                    @foreach ($activities as $item)
                    <div class="col mb-4">
                        <div class="card card-activity" data-slug="{{$item->slug}}" data-title="{{$item->title}}" data-times="{{$item->isComingSoon() ? 'Coming soon' : $item->date_ranges }}" data-content="{{$item->content}}">
                            <div class="card-body">
                                <div class="activity-img-wrapper">
                                    <img src="{{ asset($item->thumbnail_image) }}" class="activity-img">
                                </div>

                                <div class="activity-detail-wrapper">
                                    <h4 class="card-title">{{ $item->title }}</h4>
                                    @if ($item->isComingSoon())
                                        <span class="badge badge-dark-green schedule-badge">Coming Soon</span>
                                    @else
                                        <span class="badge badge-dark-green schedule-badge">{{$item->date_ranges}}</span>
                                    @endif
                                    <p class="excerpt">
                                        {{ Str::limit($item->excerpt, 110, '...') }}
                                    </p>
                                </div>
                                {{-- <a class="btn mb-3 btn-rounded  {{ $reward->point > $logged_in_user->point ? 'disabled btn-secondary' : 'btn-green' }}" href="#">TUKAR HADIAH</a> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('before-scripts')
<div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
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

                    <div id="times" class="mb-4"></div>
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
        })

        $(document).ready(function () {
            let searchParams = new URLSearchParams(window.location.search)

            if (searchParams.has('show')) {
                let param = searchParams.get('show')

                if (param == 'promo-khusus-anggota-baru') {
                    $('#activityModal').modal('show');
                    const card = $('.card-activity[data-slug="promo-khusus-anggota-baru"]');
                    console.log(card);
                    const content = $(card).data('content');
                    const times = $(card).data('times');
                    const title = $(card).data('title');

                    const ModalItem = $('#activityModal');

                    $(ModalItem).find('.title_text').text(`${title}`).attr('title', title)
                    $(ModalItem).find('#content').html(`${content}`)
                    $(ModalItem).find('#times').html(`<span class="badge badge-dark-green schedule-badge">${times}</span>`)
                }

            }
        })
    </script>
@endpush

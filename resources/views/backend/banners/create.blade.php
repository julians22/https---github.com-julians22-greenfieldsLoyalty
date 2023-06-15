@extends('backend.layouts.app')

@section('title', __('Create New Banner'))

@section('content')
    <x-forms.post :action="route('admin.banner.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create New Banner')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.banner.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">@lang('Desktop Banner Image')</label>
                            <small class="text-success">Image Size: 1530 × 428 px</small>
                            <div class="input-group mb-3">
                                <input required type="text" id="desktopBanner" name="desktopBanner" value="{{ old('desktopBanner') }}" class="form-control" placeholder="" aria-label="Image" readonly aria-describedby="lfm">
                                <div class="input-group-append">
                                    <button id="lfmdesktopBanner" data-input="desktopBanner" data-preview="desktopBannerholder" class="btn btn-secondary" type="button">@lang('Select Image')</button>
                                </div>
                            </div>
                            <div id="desktopBannerholder" class="preview-image-wrapper" data-url="{{ old('desktopBanner') }}"></div>
                        </div>
                        <div class="form-group">
                            <label for="name">@lang('Mobile Banner Image')</label>
                            <small class="text-success">Image Size: 200 × 200 px</small>
                            <div class="input-group mb-3">
                                <input required type="text" id="mobileBanner" name="mobileBanner" value="{{ old('mobileBanner') }}" class="form-control" placeholder="" aria-label="Image" readonly aria-describedby="lfm">
                                <div class="input-group-append">
                                  <button id="lfmmobileBanner" data-input="mobileBanner" data-preview="mobileBannerholder" class="btn btn-secondary" type="button">@lang('Select Image')</button>
                                </div>
                            </div>
                            <div id="mobileBannerholder" class="preview-image-wrapper" data-url="{{ old('mobileBanner') }}"></div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Banner')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

@push('after-scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    var route_prefix = "{{ env('APP_URL') }}/admin/laravel-filemanager";

    $('#lfmdesktopBanner').filemanager('image');

    $('#lfmdesktopBanner').filemanager('image', {prefix: route_prefix});

    $('#lfmmobileBanner').filemanager('image');

    $('#lfmmobileBanner').filemanager('image', {prefix: route_prefix});

    $(document).ready(() => {
        const desktop_image_url = $('#desktopBannerholder').data('url');
        if (desktop_image_url) {
            $('#desktopBannerholder').append(
                $('<img>').attr('src', desktop_image_url)
            )
        }

        const mobile_image_url = $('#mobileBannerholder').data('url');
        if (mobile_image_url) {
            $('#mobileBannerholder').append(
                $('<img>').attr('src', mobile_image_url)
            )
        }
    })
</script>
@endpush

@extends('backend.layouts.app')

@section('title', __('Edit Activity'))

@section('content')
    <x-forms.patch :action="route('admin.activity.update', $activity)">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Activity')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.faq.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="title">@lang('Activity Title')</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') ?? $activity->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="name">@lang('Penjelasan Singkat Aktivitas')</label>
                            <div class="col-md-10">
                                <textarea name="excerpt" id="excerpt" rows="2" class="form-control">{{ old('excerpt') ?? $activity->excerpt }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="name">@lang('Content')</label>
                            <div class="col-md-10">
                                <textarea name="content" id="content" rows="2" class="form-control">{!! old('content') ?? $activity->content !!}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="name">@lang('Thumbnail Image')</label>
                            <div class="input-group mb-3">
                                <input type="text" id="thumbnail_image" name="thumbnail_image" value="{{ old('thumbnail_image') ?? $activity->thumbnail_image }}" class="form-control" readonly placeholder="" aria-label="Image" aria-describedby="lfm">
                                <div class="input-group-append">
                                  <button id="lfm" data-input="thumbnail_image" data-preview="thumbnailImageholder" class="btn btn-secondary" type="button">@lang('Select Image')</button>
                                </div>
                            </div>
                            <div id="thumbnailImageholder" class="preview-image-wrapper" data-url="{{ old('image') ?? $activity->thumbnail_image  }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="start_date">@lang('Start Date')</label>
                            <input class="form-control" type="date" name="start_date" id="start_date" value="{{ old('start_date') ?? $activity->start_date->format('Y-m-d') }}" required >
                        </div>

                        <div class="form-group">
                            <label for="end_date">@lang('End Date')</label>
                            <input class="form-control" type="date" name="end_date" id="end_date" value="{{ old('end_date') ?? $activity->end_date->format('Y-m-d') }}" required>
                        </div>



                        <div class="form-group">
                            <label for="publish">Publish:</label>
                            <div>
                                <label class="c-switch c-switch-pill c-switch-label c-switch-success">
                                    <input type="checkbox" name="publish" class="c-switch-input" {{ $activity->publish ? 'checked' : '' }}>
                                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Activity')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection

@push('after-scripts')

@include('backend.includes.filemanager')

    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
         var editor_config = {
            path_absolute : "/",
            selector: 'textarea#content',
            relative_urls: false,
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'admin/laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
            }
        };
        tinymce.init(editor_config);
    </script>
@endpush

@extends('backend.layouts.app')

@section('title', __('Edit Faq'))

@section('content')
    <x-forms.patch :action="route('admin.faq.update', ['faq' => $faq])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit Faq')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.faq.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="title">@lang('Faq Title')</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') ?? $faq->title }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="name">@lang('Question')</label>
                            <div class="col-md-10">
                                <textarea name="question" id="question" rows="2" class="form-control">{{ old('question') ?? $faq->question }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="name">@lang('Answer')</label>
                            <div class="col-md-10">
                                <textarea name="answer" id="answer" rows="10" class="form-control">{!! old('answer') ?? $faq->answer !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update Faq')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection

@push('after-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
         var editor_config = {
            path_absolute : "/",
            selector: 'textarea#answer',
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

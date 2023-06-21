@extends('backend.layouts.app')

@section('title', __('Manage Top Up'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <x-forms.patch :action="route('admin.setting.update')">
                    @foreach ($settings as $item)
                        @if ($item->isLongText())
                            <div class="form-group mb-2">
                                <label class="h6" for="{{$item->key}}"><strong>@lang('string.inputs.label.'.$item->key)</strong></label>
                                <textarea name="{{$item->key}}" id="setting-{{$item->id}}" rows="10" class="form-control">{!! $item->long_text_value !!}</textarea>
                            </div>
                        @endif
                    @endforeach
                    <button class="btn btn-success" type="submit">@lang('Save Changes')</button>
                </x-forms.patch>

            </div>
        </div>
    </div>
</div>

@endsection

@push('after-scripts')
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
         var editor_config = {
            path_absolute : "/",
            selector: 'textarea.form-control',
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

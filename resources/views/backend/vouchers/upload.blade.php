@extends('backend.layouts.app')

@section('title', __('Upload Voucher'))

@section('content')
    <x-forms.post :action="route('admin.voucher.store')" enctype="multipart/form-data">
        <x-backend.card>
            <x-slot name="header">
                @lang('Upload Voucher')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.voucher.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="form-group">
                    <label for="file">Select File</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="file">
                        <label class="custom-file-label" for="file">Choose Voucher file</label>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Upload Voucher')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

@push('after-scripts')
    @include('backend.includes.filemanager')
@endpush

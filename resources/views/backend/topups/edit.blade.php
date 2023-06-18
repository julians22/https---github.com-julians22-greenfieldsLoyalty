@extends('backend.layouts.app')

@section('title', __('Manage Top Up'))

@section('content')

<div class="row">
    <div class="col-md-4">
        <x-backend.card>
            <x-slot name="header">
                @lang('Manage Top Up')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.topup.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="receipt">@lang('Struk yang di upload'):</label>
                            <div id="receipt" style="cursor: zoom-in">
                                <img src="{{ asset($topup->filepath) }}" alt="" class="w-100">
                            </div>
                            <div style="display: none">
                                <img id="receipt_image" src="{{ asset($topup->filepath) }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">@lang('Status'):</label>
                            <div>
                                @include('backend.topups.includes.status-button', ['topup' => $topup])
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>

        </x-backend.card>
    </div>

    <div class="col-md-8">
        <x-backend.card>
            <x-slot name="header">
                @lang('Detail Pengguna')
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Name')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->user->name }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Phone')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->user->phone }}" disabled>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="header">
                @lang('Aksi')
            </x-slot>

            <x-slot name="body">
                <div class="row">
                    @if ($topup->isProcessed())
                    <div class="col-md-6">
                        <x-forms.patch :action="route('admin.topup.update.accept', ['topup' => $topup])">
                            <h4>Fill This form to accept</h4>
                            <div class="form-group">
                                <label for="point">@lang('Point Calculated')</label>
                                <input type="number" class="form-control" name="point">
                            </div>
                            <div class="form-group">
                                <label for="note">@lang('Note') @lang('(Optional)')</label>
                                <textarea name="note" class="form-control" id="note" cols="" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">@lang('Accept & Finish Top Up')</button>
                        </x-forms.patch>
                    </div>
                        <div class="col-md-6">
                            <x-forms.patch :action="route('admin.topup.update.reject', ['topup' => $topup])">
                                <h4>Fill This form to reject</h4>
                                <div class="form-group">
                                    <label for="failed_reason">@lang('Failed Reason'):</label>
                                    <textarea name="failed_reason" class="form-control" id="failed_reason" cols="" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">@lang('Reject')</button>
                            </x-forms.patch>
                        </div>

                    @endif
                </div>
            </x-slot>

        </x-backend.card>
    </div>

</div>

@endsection

@push('after-scripts')
    <script>
        const $receipt = $('#receipt_image');
        $receipt.viewer({
            inline: true,
            viewed: function() {
                $image.viewer('zoomTo', 1);
            }
        });

        // Get the Viewer.js instance after initialized
        var viewer = $receipt.data('viewer');

        // View a list of images
        $('#receipt').viewer();
    </script>
@endpush

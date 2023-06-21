@extends('backend.layouts.app')

@section('title', __('Create New Reward'))

@section('content')
    <x-forms.post :action="route('admin.reward.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create New Reward')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.reward.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="name">@lang('Reward Title')</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="name">@lang('Description')</label>
                            <div class="col-md-10">
                                <textarea name="description" id="description" rows="10" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label" for="point">@lang('Reward Point')</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="point" id="point" value="{{ old('point') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">@lang('Reward Image')</label>
                            <div class="input-group mb-3">
                                <input type="text" id="image" name="image" value="{{ old('image') }}" class="form-control disabled" placeholder="" aria-label="Image" aria-describedby="lfm">
                                <div class="input-group-append">
                                  <button id="lfm" data-input="image" data-preview="imageholder" class="btn btn-secondary" type="button">@lang('Select Image')</button>
                                </div>
                            </div>
                            <div id="imageholder" class="preview-image-wrapper" data-url="{{ old('image') }}"></div>
                        </div>

                        <div class="form-group">
                            <label for="initial_stock">@lang('Initial Stock')</label>
                            <input type="number" name="initial_stock" id="initial_stock" class="form-control" value="{{old('initial_stock')}}">
                        </div>

                        <div class="form-group">
                            <label for="status">Publish:</label>
                            <div>
                                <label class="c-switch c-switch-pill c-switch-label c-switch-success">
                                    <input type="checkbox" name="status" class="c-switch-input">
                                    <span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Reward')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection

@push('after-scripts')
    @include('backend.includes.filemanager')
@endpush

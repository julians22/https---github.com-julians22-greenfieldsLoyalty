@extends('backend.layouts.app')

@section('title', __('Manage Top Up'))

@section('content')

<div class="row">
    <div class="col-md-4">
        <x-backend.card>
            <x-slot name="header">
                @lang('Manage Redeem')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.redeem.index')" :text="__('Back')" />
            </x-slot>

            <x-slot name="body">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="receipt">{{ $redeem->reward->name }}</label>
                            <img src="{{ asset($redeem->reward->image) }}" alt="" class="w-100">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">@lang('Status'):</label>
                            <div>
                                @include('backend.redeems.includes.status-button', ['redeem' => $redeem])
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
                <div style="height: 200px; overflow-x: hidden; overflow-y: auto; width: 100%">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('Name')</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="name" id="name" value="{{ $redeem->user->name }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('Phone')</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="name" id="name" value="{{ $redeem->user->phone }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('Address')</label>
                        <div class="col-md-8">
                            <textarea class="form-control" disabled name="address" id="address" rows="4">{{ $redeem->address->address }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('Province')</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $redeem->address->rel_province->name }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('City')</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $redeem->address->rel_city->name }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('District')</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $redeem->address->rel_district->name }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label" for="name">@lang('Postal Code')</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="{{ $redeem->address->postal_code }}" disabled>
                        </div>
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
                    @if ($redeem->isProcessed())
                    <div class="col-md-6">
                        <x-forms.patch :action="route('admin.redeem.update.send', ['redeem' => $redeem])">
                            <h4>Fill This form to send Gift</h4>
                            <div class="form-group">
                                <label for="point">@lang('Courier')</label>
                                <select class="form-control" name="courier" id="courier">
                                    @foreach ($couriers as $item)
                                        <option value="{{$item['value']}}">{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="point">@lang('Airwaybill Number')</label>
                                <input type="text" class="form-control" name="airwaybill">
                            </div>
                            <button type="submit" class="btn btn-primary">@lang('Send Claim')</button>
                        </x-forms.patch>
                    </div>
                        <div class="col-md-6">
                            <x-forms.patch :action="route('admin.redeem.update.reject', ['redeem' => $redeem])">
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

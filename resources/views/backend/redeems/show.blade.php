@extends('backend.layouts.app')

@section('title', __('Show Redeem'))

@section('content')

<div class="row">
    <div class="col-md-4">
        <x-backend.card>
            <x-slot name="header">
                @lang('Show Redeem')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.redeem.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="trans_code">@lang('Transaction Code')</label>
                            <input type="text" value="{{ $redeem->transaction_code }}" class="form-control" disabled>
                        </div>
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

                        @if ($redeem->isFailed())
                            <div class="form-group">
                                <label for="rejected">Item ini sudah di tolak pada @displayDate($redeem->failed_at) ({{ $redeem->failed_at->diffForHumans() }})</label>
                                <div>
                                    <label for="rejected">Dengan catatan:</label>
                                    <textarea name="note" id="note" rows="10" class="form-control">{{ $redeem->failed_reason }}</textarea>
                                </div>
                            </div>
                        @endif

                        @if ($redeem->isSend())
                            <div class="form-group">
                                <label for="successed">Item ini sudah di kirim pada tanggal {{$redeem->send_at->format('Y-m-d')}}</label>
                                <div>
                                    <label for="successed">Kurir:</label>
                                    <input type="text" name="point" id="point" class="form-control" disabled value="{{$redeem->courier}}">
                                </div>
                                <div>
                                    <label for="successed">Resi:</label>
                                    <input type="text" name="point" id="point" class="form-control" disabled value="{{$redeem->airwaybill}}">
                                </div>
                            </div>
                        @endif

                        @if ($redeem->isCompleted())
                            <div class="form-group">
                                <label for="successed">Item ini sudah di terima pada tanggal {{$redeem->success_at>format('Y-m-d')}}</label>
                                <div>
                                    <label for="successed">Dengan Jumlah Poin yang di berikan:</label>
                                    <input type="number" name="point" id="point" class="form-control" disabled value="{{$redeem->point}}">
                                </div>
                                <div>
                                    <label for="successed">Dengan catatan:</label>
                                    <textarea name="note" id="note" rows="10" class="form-control" disabled>{{ $redeem->note }}</textarea>
                                </div>
                            </div>
                        @endif
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
    </div>

</div>

@endsection

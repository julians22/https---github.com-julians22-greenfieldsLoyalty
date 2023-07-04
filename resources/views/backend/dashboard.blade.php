@inject('topup_model', '\App\Models\TopUp')

@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Welcome :Name', ['name' => $logged_in_user->name])
        </x-slot>

        <x-slot name="body">
            @lang('Welcome to the Dashboard')

            <div class="row">
                <div class="col-sm-2 col-md-3">
                    <x-backend.callout :count="$totalCustomer" title="Total Customer">
                        <x-slot name="link">
                            <a href="{{ route('admin.customer.index') }}" class="btn btn-sm btn-primary">More</a>
                        </x-slot>
                    </x-backend.callout>
                </div><!--/.col-->

                <div class="col-sm-2 col-md-3">
                    <x-backend.callout :count="$todayUploadReceipt" title="Today Upload Receipt">
                        <x-slot name="link">
                            <a href="{{ route('admin.topup.index') }}?filters[topup_date]={{$topup_model::STATUS_CREATED}}" class="btn btn-sm btn-primary">More</a>
                        </x-slot>
                    </x-backend.callout>
                </div><!--/.col-->

                <div class="col-sm-2 col-md-3">
                    <x-backend.callout :count="$totalUploadReceipt" title="Total Upload Receipt">
                        <x-slot name="link">
                            <a href="{{ route('admin.topup.index') }}" class="btn btn-sm btn-primary">More</a>
                        </x-slot>
                    </x-backend.callout>
                </div><!--/.col-->
                <div class="col-sm-2 col-md-3">
                    <x-backend.callout :count="$unprocessedReceipt" title="Unprocessed Receipt">
                        <x-slot name="link">
                            <a href="{{ route('admin.topup.index') }}?filters[status]=created" class="btn btn-sm btn-primary">More</a>
                        </x-slot>
                    </x-backend.callout>
                </div><!--/.col-->
            </div>
        </x-slot>
    </x-backend.card>
@endsection

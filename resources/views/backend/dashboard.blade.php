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
                <div class="col-sm-2">
                    <x-backend.callout :count="$totalCustomer" title="Total Customer">
                        <x-slot name="link">
                            <a href="{{ route('admin.customer.index') }}" class="btn btn-sm btn-primary">More</a>
                        </x-slot>
                    </x-backend.callout>
                </div><!--/.col-->
            </div>
        </x-slot>
    </x-backend.card>
@endsection

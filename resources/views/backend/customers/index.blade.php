@extends('backend.layouts.app')

@section('title', __('Customer Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Customer Management')
        </x-slot>

        <x-slot name="body">

            <div class="row">
                <div class="col-sm-2">
                    <x-backend.callout :count="$totalCustomer" title="Total Customer"/>
                </div><!--/.col-->
            </div>

            <div class="row mb-2">
                <div class="col-md-12">
                    @livewire('backend.utils.export-button-component', ['to' => 'backend.customers-table', 'event' => 'exportCustomerTable'])
                </div>
            </div>

            <livewire:backend.customers-table />
        </x-slot>
    </x-backend.card>
@endsection

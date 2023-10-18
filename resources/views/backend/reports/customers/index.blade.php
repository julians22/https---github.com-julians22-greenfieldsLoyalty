@extends('backend.layouts.app')

@section('title', __('Customer Reports'))

@section('content')
    <x-backend.card>

        <x-slot name="header">
            @lang('Customer Reports')
        </x-slot>

        <x-slot name="body">
            <div id="app">
                <customer-report-component :customers='@json($customerData)'/>
            </div>
        </x-slot>
    </x-backend.card>
@endsection

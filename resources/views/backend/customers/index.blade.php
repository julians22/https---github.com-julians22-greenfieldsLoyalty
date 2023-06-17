@extends('backend.layouts.app')

@section('title', __('Customer Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Customer Management')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.customers-table />
        </x-slot>
    </x-backend.card>
@endsection

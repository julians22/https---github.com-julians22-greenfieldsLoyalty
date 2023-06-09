@extends('backend.layouts.app')

@section('title', __('Redeem Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Redeem Management')
        </x-slot>

        <x-slot name="body">
            <livewire:backend.redeems-table />
        </x-slot>
    </x-backend.card>
@endsection

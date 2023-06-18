@extends('backend.layouts.app')

@section('title', __('Redeem Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Redeem Management')
        </x-slot>

        <x-slot name="body">
            <div class="row mb-2">
                <div class="col-md-12">
                    @livewire('backend.utils.export-button-component', ['to' => 'backend.redeems-table', 'event' => 'exportRedeemsTable'])
                </div>
            </div>
            <livewire:backend.redeems-table />
        </x-slot>
    </x-backend.card>
@endsection

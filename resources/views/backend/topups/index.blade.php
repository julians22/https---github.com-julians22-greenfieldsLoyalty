@extends('backend.layouts.app')

@section('title', __('Topup Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Topup Management')
        </x-slot>

        <x-slot name="body">
            <div class="row mb-2">
                <div class="col-md-12">
                    @livewire('backend.utils.export-button-component', ['to' => 'backend.topup-table', 'event' => 'exportTopUpTable'])
                </div>
            </div>

            <livewire:backend.topup-table />
        </x-slot>
    </x-backend.card>
@endsection

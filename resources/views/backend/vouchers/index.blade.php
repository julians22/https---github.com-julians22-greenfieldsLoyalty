@extends('backend.layouts.app')

@section('title', __('Voucher Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Voucher Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.voucher.upload')"
                :text="__('Import Voucher')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.voucher-table />
        </x-slot>
    </x-backend.card>
@endsection

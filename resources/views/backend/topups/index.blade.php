@extends('backend.layouts.app')

@section('title', __('Topup Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Topup Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.topup.create')"
                :text="__('Create New Topup')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.topup-table />
        </x-slot>
    </x-backend.card>
@endsection

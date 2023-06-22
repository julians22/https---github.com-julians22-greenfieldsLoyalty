@extends('backend.layouts.app')

@section('title', __('Banner Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Banner Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.banner.create')"
                :text="__('Create New Banner')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.banners-table />
        </x-slot>
    </x-backend.card>
@endsection

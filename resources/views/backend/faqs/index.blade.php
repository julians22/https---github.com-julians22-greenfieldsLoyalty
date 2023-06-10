@extends('backend.layouts.app')

@section('title', __('Faq Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Faq Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.faq.create')"
                :text="__('Create New Faq')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.faqs-table />
        </x-slot>
    </x-backend.card>
@endsection

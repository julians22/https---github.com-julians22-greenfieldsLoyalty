@extends('backend.layouts.app')

@section('title', __('Reward Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Reward Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.reward.create')"
                :text="__('Create New Reward')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.rewards-table />
        </x-slot>
    </x-backend.card>
@endsection

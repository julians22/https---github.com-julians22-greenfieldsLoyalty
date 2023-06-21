@extends('backend.layouts.app')

@section('title', __('Acitiies Management'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Activiies Management')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.activity.create')"
                :text="__('Create New Activity')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:backend.activities-table />
        </x-slot>
    </x-backend.card>
@endsection

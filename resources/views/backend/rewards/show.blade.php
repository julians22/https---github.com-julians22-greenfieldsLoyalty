@extends('backend.layouts.app')

@section('title', __('View Reward'))

@section('content')

<x-backend.card>
    <x-slot name="header">
        @lang('View Reward')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.reward.edit', ['reward' => $reward])" :text="__('Edit Reward')" />
        <x-utils.link class="card-header-action" :href="route('admin.reward.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Reward Title')</th>
                <td>{{ $reward->name }}</td>
            </tr>
            <tr>
                <th>@lang('Reward Point')</th>
                <td>{{ number_format($reward->point) }}</td>
            </tr>
            <tr>
                <th>@lang('Reward Description')</th>
                <td>{{ $reward->description }}</td>
            </tr>
            <tr>
                <th>@lang('Reward Status')</th>
                <td>@include('backend.rewards.includes.status', ['reward' => $reward])</td>
            </tr>
            <tr>
                <th>@lang('Reward Image')</th>
                <td>
                    <img src="{{ $reward->image }}" alt="">
                </td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Account Created'):</strong> @displayDate($reward->created_at) ({{ $reward->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($reward->updated_at) ({{ $reward->updated_at->diffForHumans() }})
        </small>
    </x-slot>

</x-backend.card>

@endsection

@extends('backend.layouts.app')

@section('title', __('View Activity'))

@section('content')

<x-backend.card>
    <x-slot name="header">
        @lang('View Activity')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.activity.edit', ['activity' => $activity])" :text="__('Edit Activity')" />
        <x-utils.link class="card-header-action" :href="route('admin.activity.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Title')</th>
                <td>{{ $activity->title }}</td>
            </tr>
            <tr>
                <th>@lang('Thumbnail Image')</th>
                <td>
                    <img src="{{ asset($activity->thumbnail_image) }}" alt="">
                </td>
            </tr>
            <tr>
                <th>@lang('Excerpt')</th>
                <td>{{ $activity->excerpt }}</td>
            </tr>
            <tr>
                <th>@lang('Content')</th>
                <td>{!! $activity->content !!}</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Created'):</strong> @displayDate($activity->created_at) ({{ $activity->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($activity->updated_at) ({{ $activity->updated_at->diffForHumans() }})
        </small>
    </x-slot>

</x-backend.card>

@endsection

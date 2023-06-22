@extends('backend.layouts.app')

@section('title', __('View Faq'))

@section('content')

<x-backend.card>
    <x-slot name="header">
        @lang('View Faq')
    </x-slot>

    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.faq.edit', ['faq' => $faq])" :text="__('Edit Faq')" />
        <x-utils.link class="card-header-action" :href="route('admin.faq.index')" :text="__('Back')" />
    </x-slot>

    <x-slot name="body">
        <table class="table table-hover">
            <tr>
                <th>@lang('Title')</th>
                <td>{{ $faq->title }}</td>
            </tr>
            <tr>
                <th>@lang('Question')</th>
                <td>{{ $faq->question }}</td>
            </tr>
            <tr>
                <th>@lang('Answer')</th>
                <td>{!! $faq->answer !!}</td>
            </tr>
        </table>
    </x-slot>

    <x-slot name="footer">
        <small class="float-right text-muted">
            <strong>@lang('Created'):</strong> @displayDate($faq->created_at) ({{ $faq->created_at->diffForHumans() }}),
            <strong>@lang('Last Updated'):</strong> @displayDate($faq->updated_at) ({{ $faq->updated_at->diffForHumans() }})
        </small>
    </x-slot>

</x-backend.card>

@endsection

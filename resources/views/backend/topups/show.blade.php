@extends('backend.layouts.app')

@section('title', __('Manage Top Up'))

@section('content')

<div class="row">
    <div class="col-md-4">
        <x-backend.card>
            <x-slot name="header">
                @lang('Manage Top Up')
            </x-slot>

            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.topup.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="receipt">@lang('Struk yang di upload'):</label>
                            <img src="{{ asset($topup->filepath) }}" alt="" class="w-100">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">@lang('Status'):</label>
                            <div>
                                @include('backend.topups.includes.status-button', ['topup' => $topup])
                            </div>
                        </div>

                        @if ($topup->isFailed())
                            <div class="form-group">
                                <label for="rejected">Item ini sudah di tolak pada @displayDate($topup->failed_at) ({{ $topup->failed_at->diffForHumans() }})</label>
                                <div>
                                    <label for="rejected">Dengan catatan:</label>
                                    <textarea name="note" id="note" rows="10" class="form-control">
                                        {{ $topup->failed_reason }}
                                    </textarea>
                                </div>
                            </div>
                        @endif

                        @if ($topup->isCompleted())
                            <div class="form-group">
                                <label for="successed">Item ini sudah di terima pada @displayDate($topup->success_at) ({{ $topup->success_at->diffForHumans() }})</label>
                                <div>
                                    <label for="successed">Dengan Jumlah Poin yang di berikan:</label>
                                    <input type="number" name="point" id="point" class="form-control" disabled value="{{$topup->point}}">
                                </div>
                                <div>
                                    <label for="successed">Dengan catatan:</label>
                                    <textarea name="note" id="note" rows="10" class="form-control" disabled value="{{$topup->failed_reason}}">
                                        {{-- {{ $topup->failed_reason }} --}}
                                    </textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </x-slot>

        </x-backend.card>
    </div>

    <div class="col-md-8">
        <x-backend.card>
            <x-slot name="header">
                @lang('Detail Pengguna')
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Name')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->user->name }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="phone">@lang('Phone')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="phone" id="phone" value="{{ $topup->user->phone }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="email">@lang('E-mail Address')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="email" id="email" value="{{ $topup->user->email }}" disabled>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>
    </div>

</div>

@endsection

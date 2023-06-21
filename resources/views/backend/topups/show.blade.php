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
                            <div id="receipt" style="cursor: zoom-in">
                                <img src="{{ asset($topup->filepath) }}" alt="" class="w-100">
                            </div>
                            <div style="display: none">
                                <img id="receipt_image" src="{{ asset($topup->filepath) }}" alt="">
                            </div>
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
                                    <textarea name="note" id="note" rows="4" class="form-control" disabled>{{ $topup->failed_reason }}</textarea>
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
                                    <textarea name="note" id="note" rows="4" class="form-control" disabled>{!! $topup->note !!}</textarea>
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

        @if ($topup->isCompleted())
        <x-backend.card>
            <x-slot name="header">
                @lang('Detail Struk')
            </x-slot>

            <x-slot name="body">
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Tanggal Struk')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->receipt_date }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Nomor Struk')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->receipt_number }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Channel')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->receipt_channel }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Subchannel')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->receipt_subchannel }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Daerah Toko')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->receipt_area }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="name">@lang('Nama Toko')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->receipt_storename }}" disabled>
                    </div>
                </div>

                @if ($topup->has('details'))
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <td>Kategori Produk</td>
                                    <td>Ukuran Kemasan</td>
                                    <td>Qty</td>
                                    <td>Harga</td>
                                    <td>Diskon</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topup->details as $detail)
                                    <tr>
                                        <td>{{$detail->product}}</td>
                                        <td>{{$detail->packsize}}</td>
                                        <td>{{$detail->qty}}</td>
                                        <td>{{$detail->price}}</td>
                                        <td>{{$detail->dicount_price}}</td>
                                        <td>{{$detail->price * $detail->qty - $detail->dicount_price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @endif

            </x-slot>
        </x-backend.card>
        @endif
    </div>

</div>

@endsection

@push('after-scripts')
    <script>
        const $receipt = $('#receipt_image');
        $receipt.viewer({
            inline: true,
            viewed: function() {
                $image.viewer('zoomTo', 1);
            }
        });

        // Get the Viewer.js instance after initialized
        var viewer = $receipt.data('viewer');

        // View a list of images
        $('#receipt').viewer();
    </script>
@endpush

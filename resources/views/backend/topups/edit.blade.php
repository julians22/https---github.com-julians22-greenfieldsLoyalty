@extends('backend.layouts.app')

@section('title', __('Manage Top Up'))

@section('content')

<div class="row">
    <div class="col-md-3">
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
                    </div>
                </div>
            </x-slot>

        </x-backend.card>
    </div>

    <div class="col-md-9">
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
                    <label class="col-md-2 col-form-label" for="name">@lang('Phone')</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{ $topup->user->phone }}" disabled>
                    </div>
                </div>
            </x-slot>
        </x-backend.card>

        <x-backend.card>
            <x-slot name="header">
                @lang('Aksi')
            </x-slot>

            <x-slot name="body">
                <div class="row" x-data="{show: 'accept'}">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{-- inline radio --}}
                            <div class="form-check form-check-inline">
                                <input @if ($topup->isCompleted()) disabled selected @endif class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioaccept" value="accept" x-model="show">
                                <label class="form-check-label" for="inlineRadioaccept">Accept</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input @if ($topup->isCompleted()) disabled @endif class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioreject" value="reject" x-model="show">
                                <label class="form-check-label" for="inlineRadioreject">Reject</label>
                            </div>
                        </div>
                    </div>
                    @if ($topup->isProcessed() || $topup->isCompleted())
                    @php
                        if (Route::is('admin.topup.edit')) {
                            $action = route('admin.topup.update.accept', ['topup' => $topup]);
                        } elseif (Route::is('admin.topup.modify')) {
                            $action = route('admin.topup.update.update', ['topup' => $topup]);
                        }else{
                            $action = null;
                        }
                    @endphp
                    <div class="col-md-12" x-show="show === 'accept'">
                        <x-forms.patch :action="$action">
                            <h5 class="card-title">Fill This form to accept</h5>
                            <div class="form-group">
                                <label for="receipt_date">@lang('Tanggal Struk')</label>
                                <input type="date" class="form-control" name="receipt_date" value="{{ old('receipt_date') ?? $topup->receipt_date }}">
                            </div>
                            <div class="form-group">
                                <label for="receipt_number">@lang('Nomor Struk')</label>
                                <input type="text" class="form-control" name="receipt_number" value="{{ old('receipt_number') ?? $topup->receipt_number }}">
                            </div>
                            <div class="form-group">
                                <label for="receipt_storename">@lang('Nama Toko')</label>
                                <input type="text" class="form-control" name="receipt_storename" value="{{ old('receipt_storename') ?? $topup->receipt_storename }}">
                            </div>
                            <div class="form-group">
                                <label for="receipt_channel">@lang('Channel & Subchannel')</label>
                                <select name="receipt_channel" id="receipt_channel" class="form-control">
                                    @php
                                        $selected_channel = old('receipt_channel') ?? $topup->receipt_subchannel
                                    @endphp
                                    @foreach ($channels as $key => $channel)
                                        <optgroup label="{{$key}}">
                                            @foreach ($channel as $item)
                                                @if ($selected_channel && $selected_channel == $item)
                                                    <option selected value="{{$item}}">{{$item}}</option>
                                                @else
                                                    <option value="{{$item}}">{{$item}}</option>
                                                @endif
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="receipt_area">@lang('Daerah Toko')</label>
                                <select name="receipt_area" id="receipt_area" class="form-control">
                                    @php
                                        $selected_area = old('receipt_area') ?? $topup->receipt_area
                                    @endphp
                                    @foreach ($provinces as $province)
                                        @if ($selected_area == $province->name)
                                            <option selected value="{{$province->name}}">{{$province->name}}</option>
                                        @else
                                            <option value="{{$province->name}}">{{$province->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            @php
                                $details = $topup->details ?? null;
                            @endphp
                            <div x-data="addRemove()">
                                <table class="table-sm table table-bordered">
                                    <tr>
                                        <th>Kategori</th>
                                        <th >Pack's</th>
                                        <th >QTY</th>
                                        <th>Flavour</th>
                                        <th>Normal Price</th>
                                        <th>Discount/Promo Price</th>
                                        <th>Total</th>
                                        <td >*</td>
                                    </tr>
                                    <template x-for="(field, index) in fields" :key="field.id">
                                        <tr>
                                            <td>
                                                <select x-model="field.product" :name=`details[${index}][product]` class="form-control form-control-sm">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category}}">{{$category}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select x-model="field.packsize" :name=`details[${index}][packsize]` class="form-control form-control-sm">
                                                    @foreach ($packsizes as $packsize)
                                                        <option value="{{$packsize}}">{{$packsize}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input x-model="field.qty" type="number" min="1" :name=`details[${index}][qty]` class="form-control form-control-sm">
                                            </td>
                                            <td>
                                                <select x-model="field.flavour" :name=`details[${index}][flavour]` class="form-control form-control-sm">
                                                    @foreach ($flavours as $flavour)
                                                        <option value="{{$flavour}}">{{$flavour}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input x-model="field.price" type="number" :name=`details[${index}][price]` class="form-control form-control-sm">
                                            </td>
                                            <td>
                                                <input x-model="field.dicount_price" type="number" :name=`details[${index}][discount]` class="form-control form-control-sm">
                                            </td>
                                            <td>
                                                <input x-model="field.total" type="number" :name=`details[${index}][total]` class="form-control form-control-sm">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" x-show="index != 0" @click="removeField(field)">&times;</button>
                                            </td>
                                        </tr>
                                    </template>
                                </table>
                                <button class="btn btn-sm btn-primary mb-2" type="button" @click="addNewField()">+ Produk</button>
                            </div>
                            <div class="form-group">
                                <label for="point">@lang('Point Calculated')</label>
                                <input @if ($topup->isCompleted()) disabled @endif type="number" class="form-control" name="point" value="{{ old('point') ?? $topup->point }}">
                            </div>
                            @if ($topup->isCompleted())
                                <div class="form-group">
                                    <label for="point">@lang('Update Point')</label>
                                    <input type="number" class="form-control" name="update_point" value="{{ old('update_point') ?? 0 }}">
                                    <ul>
                                        <li>
                                            <small>@lang('All points previously awarded to the user will be deducted')</small>
                                        </li>
                                        <li>
                                            <small>@lang('Update Point field, will be entered into user points')</small>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="note">@lang('Note') @lang('(Optional)'):</label>
                                <textarea name="note" class="form-control" id="note" cols="" rows="5">{{ old('note') ?? $topup->note }}</textarea>
                            </div>
                            @if ($topup->isCompleted())
                            <button type="submit" class="btn btn-primary">@lang('Update')</button>
                            @else
                            <button type="submit" class="btn btn-primary">@lang('Accept & Finish Top Up')</button>
                            @endif
                        </x-forms.patch>
                    </div>
                    <div class="col-md-12" x-show="show === 'reject'">
                        <x-forms.patch :action="route('admin.topup.update.reject', ['topup' => $topup])">
                            <h4>Fill This form to reject</h4>
                            <div class="form-group">
                                <label for="failed_reason">@lang('Failed Reason'):</label>
                                <textarea name="failed_reason" class="form-control" id="failed_reason" cols="" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger">@lang('Reject')</button>
                        </x-forms.patch>
                    </div>
                    @endif
                </div>
            </x-slot>

        </x-backend.card>
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

    <script>
        const fieldData = @json($details);
        function addRemove() {
            let fields = [
                {
                    id: new Date().getTime()
                }
            ];
            if (fieldData.length) {
                fields = [];
                fieldData.forEach(element => {
                    fields.push(element);
                });
            }
            return {
                fields: fields,
                addNewField() {
                    this.fields.push({id: new Date().getTime() + this.fields.length});
                },
                removeField(field) {
                    this.fields.splice(this.fields.indexOf(field), 1);
                }
            }
        }
    </script>
@endpush

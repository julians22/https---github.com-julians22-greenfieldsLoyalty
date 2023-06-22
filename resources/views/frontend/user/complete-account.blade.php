@extends('frontend.layouts.app')

@section('title', __('Edit Account'))

@section('content')

<div class="container-fluid pt-5 pb-4">
    <div class="row">
        <div class="col-md-12">
            <x-frontend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/complete_profile_titletext.png') }}" alt="">
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="alert alert-info">
                                        Lengkapi profil kamu untuk melanjutkan.
                                    </div>
                                    <x-forms.patch :action="route('frontend.user.completion-account-submit')" class="greenfields-form">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">{{ __('Name') }}</label>
                                                    <input type="text" name="name" id="name" class="form-control" value="{{ $logged_in_user->name }}" placeholder="{{ __('Name') }}" maxlength="100" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="child_name">{{ __('Child Name') }}</label>
                                                    <input type="text" name="child_name" id="child_name" class="form-control" placeholder="{{ __('Child Name') }}" maxlength="100" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_of_birth">{{ __('Date Of Birth') }}</label>
                                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"  required autocomplete="false">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="child_date_of_birth">{{ __('Child Date Of Birth') }}</label>
                                                    <input type="date"  name="child_date_of_birth" id="child_date_of_birth" class="form-control" placeholder="{{ __('Child Date Of Birth') }}" required autocomplete="false">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">No HP (sesuai nomor Whatsapp)</label>
                                                    <input type="phone" name="phone" id="phone" class="form-control" placeholder="0812345678" maxlength="15" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">{{ __('E-mail Address') }}</label>
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $logged_in_user->email }}" maxlength="255" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="address">{{__('Full Address')}}</label>
                                                    <textarea name="address" id="address" rows="1" class="form-control" placeholder="{{__('Full Address')}}" "></textarea>
                                                </div><!--form-group-->
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="provinve">{{__('Select Province')}}</label>
                                                    <select name="province" id="province" class="form-control select-province"  autocomplete="false">
                                                        <option value="">{{__('Select Province')}}</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->id }}">{{$province->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">{{__('Select City')}}</label>
                                                    <select name="city" id="city" class="form-control select-city" autocomplete="false">
                                                        <option value="">{{__('Select City')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="district">{{__('Select District')}}</label>
                                                    <select name="district" id="district" class="form-control select-district" autocomplete="false">
                                                        <option value="">{{__('Select District')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postal_code">{{ __('Postal Code') }}</label>
                                                    <input type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" required autocomplete="postal_code" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="history_milk_category"><p class="mb-0 font-weight-bold ml-md-2">Kategori produk yang dikonsumsi 3 bulan terakhir?</p></label>
                                            <select autocomplete="off" name="history_milk_category" id="history_milk_category" class="form-control select-category" data-placeholder="{{ __('Kategori produk yang dikonsumsi 3 bulan terakhir?') }}">
                                                <option value="" disabled selected>{{__('Kategori susu yang dikonsumsi 3 bulan terakhir?')}}</option>
                                                @foreach ($survey_categories as $category)
                                                    <option value="{{ $category }}">{{ $category }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="history_milk_product"><p class="mb-0 font-weight-bold ml-md-2">Brand susu yang dikonsumsi 3 bulan terakhir?</p></label>
                                            <select autocomplete="off" name="history_milk_product[]" id="history_milk_product" class="form-control select-brand" data-placeholder="{{__('Brand susu yang dikonsumsi 3 bulan terakhir')}}" multiple="multiple">
                                                @foreach ($survey_brands as $brand)
                                                <option value="{{ $brand }}">{{ $brand }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="history_milk_pack_size"><p class="mb-0 font-weight-bold ml-md-2">{{__('Packsize')}}</p></label>
                                            <select autocomplete="off" name="history_milk_packsize" id="history_milk_pack_size" class="form-control select-size" data-placeholder="{{__('Packsize')}}">
                                                <option value="" selected disabled>{{__('Packsize')}}</option>
                                                @foreach ($survey_packsizes as $packsize)
                                                    <option value="{{ $packsize }}">{{ $packsize }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="others_packsize" id="others_packsize" placeholder="Ukuran Kemasan lain" class="form-control">
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input type="checkbox" name="terms" value="1" id="terms" class="form-check-input" required>
                                                    <label class="form-check-label" for="terms">
                                                        @php
                                                            $tnc = '<a href="'.route('frontend.pages.terms').'" target="_blank">'.__('Terms & Conditions').'</a>';
                                                            $policy = '<a href="'.route('frontend.pages.privacy').'" target="_blank">'.__('Privacy Policy').'</a>';
                                                        @endphp
                                                        @lang('string.agree', [
                                                            'tnc' => $tnc,
                                                            'policy' => $policy
                                                        ])
                                                        {{-- @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}" target="_blank">@lang('Terms & Conditions')</a> --}}
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="col-md-6 text-right">
                                                <x-utils.link
                                                    class="btn btn-warning btn-rounded"
                                                    :href="route('frontend.user.account')"
                                                    :text="__('Back')"/>
                                                <button class="btn btn-rounded btn-green ml-2" type="submit">@lang('Save Changes')</button>
                                            </div>
                                        </div><!--form-group-->
                                    </x-forms.patch>
                                </div><!--col-md-10-->
                            </div><!--row-->
                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>

@endsection

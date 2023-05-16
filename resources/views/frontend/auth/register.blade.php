@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')
    @include('frontend.includes.banner')
    <div class="container mbb-4">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/decorations/title_register.png') }}" alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <x-forms.post :action="route('frontend.auth.register')" class="greenfields-form">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Name') }}" maxlength="100" required autofocus autocomplete="false" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="child_name" id="child_name" class="form-control" value="{{ old('child_name') }}" placeholder="{{ __('Child Name') }}" maxlength="100" required autocomplete="false" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" data-placeholder="{{ __('Date Of Birth') }}" required autocomplete="false">
                        </div>

                        <div class="col-md-6">
                            <input type="date" data-placeholder="Child Date of birth" name="child_date_of_birth" id="child_date_of_birth" class="form-control" value="{{ old('child_date_of_birth') }}" placeholder="{{ __('Child Date Of Birth') }}" required autocomplete="false date_of_birth">
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}" maxlength="15" required autocomplete="false" />
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autocomplete="false" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">

                        <div class="col-md-12">
                            <textarea name="address" id="address" rows="1" class="form-control" placeholder="{{__('Full Address')}}"></textarea>
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-6">
                            <select name="province" id="province" class="form-control select-province">
                                <option value="">{{__('Select Province')}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select name="city" id="city" class="form-control select-city">
                                <option value="">{{__('Select City')}}</option>
                            </select>
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-6">
                            <select name="district" id="district" class="form-control select-district">
                                <option value="">{{__('Select District')}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code') }}" required autocomplete="false" />
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row">
                        <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="false-password" />
                        </div>

                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="false-password" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">

                        <div class="col-md-4">
                            <select name="history_milk_category" id="history_milk_category" class="form-control select-category">
                                <option value="" disabled selected>{{__('Kategori susu yang dikonsumsi saat ini?')}}</option>
                                @foreach ($survey_categories as $category)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="history_milk_product[]" id="history_milk_product" class="form-control select-brand" data-placeholder="{{__('Brand susu yang dikonsumsi 3 bulan terakhir')}}" multiple="multiple">
                                @foreach ($survey_brands as $brand)
                                    <option value="{{ $brand }}">{{ $brand }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="history_milk_packsize" id="history_milk_pack_size" class="form-control select-size">
                                <option value="" selected disabled>{{__('Packsize susu')}}</option>
                                @foreach ($survey_packsizes as $packsize)
                                    <option value="{{ $packsize }}">{{ $packsize }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div><!--form-group-->

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
                            <button class="btn btn-rounded btn-green" type="submit">@lang('Register')</button>
                        </div>
                    </div><!--form-group-->

                    @if(config('boilerplate.access.captcha.registration'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                <input type="hidden" name="captcha_status" value="true" />
                            </div><!--col-->
                        </div><!--row-->
                    @endif
                </x-forms.post>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

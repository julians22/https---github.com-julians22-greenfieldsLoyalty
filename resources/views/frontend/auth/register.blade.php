@extends('frontend.layouts.app')

@section('title', __('Register'))

@section('content')
    @include('frontend.includes.banner')
    <div class="container mb-md-4">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <div class="page_title">
                    <img src="{{ asset('img/decorations/title_register.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <x-forms.post autocomplete="on" :action="route('frontend.auth.register')" class="greenfields-form register-form">
                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <input autocomplete="off" type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Full Name') }}" maxlength="100" required autofocus  />
                        </div>
                        <div class="col-md-6">
                            <input autocomplete="off" type="text" name="child_name" id="child_name" class="form-control" value="{{ old('child_name') }}" placeholder="{{ __('Child Full Name') }}" maxlength="100" required  />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <input autocomplete="off" type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" data-placeholder="{{ __('Date Of Birth') }}" required >
                        </div>

                        <div class="col-md-6">
                            <input autocomplete="off" type="date" data-placeholder="{{ __('Child Date Of Birth') }}" name="child_date_of_birth" id="child_date_of_birth" class="form-control" value="{{ old('child_date_of_birth') }}" placeholder="{{ __('Child Date Of Birth') }}" required>
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <input autocomplete="off" type="text" name="phone" id="phone" class="form-control" placeholder="No HP (sesuai nomor Whatsapp)" value="{{ old('phone') }}" maxlength="15" required  />
                        </div>
                        <div class="col-md-6">
                            <input autocomplete="off" type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required  />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">

                        <div class="col-md-12">
                            <textarea autocomplete="off" name="address" id="address" rows="1" class="form-control" placeholder="{{__('Full Address')}}"></textarea>
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <select autocomplete="off" name="province" id="province" class="form-control select-province">
                                <option value="">{{__('Select Province')}}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select autocomplete="off" name="city" id="city" class="form-control select-city">
                                <option value="">{{__('Select City')}}</option>
                            </select>
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <select autocomplete="off" name="district" id="district" class="form-control select-district">
                                <option value="">{{__('Select District')}}</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input autocomplete="off" type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code') }}" required  />
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <input autocomplete="off" type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="false-password" />
                        </div>

                        <div class="col-md-6">
                            <input autocomplete="off" type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="false-password" />
                        </div>
                    </div><!--form-group-->

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

                    <div class="row d-flex justify-content-center mb-2">
                        <div class="col-md-4">
                            <x-utils.link
                                :href="route('frontend.auth.social.login', 'facebook')"
                                class="btn btn-block btn-blue btn-login "
                                icon="fab fa-facebook"
                                :text="__('Login with Facebook')"
                                :hide="!config('services.facebook.active')" />
                        </div>
                        <div class="col-md-4">
                            <x-utils.link
                                :href="route('frontend.auth.social.login', 'google')"
                                class="btn btn-block btn-outline-dark btn-login "
                                icon="fab fa-google"
                                :text="__('Login with Google')"
                                :hide="!config('services.google.active')" />
                        </div>
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
                            <button class="btn btn-rounded btn-dark-green" type="submit">@lang('Register')</button>
                        </div>
                    </div><!--form-group-->
                </x-forms.post>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection


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
                            <label for="" class="d-block d-md-none">{{ __('Full Name') }}</label>
                            <input autocomplete="off" type="text" name="name" id="name" class="form-control {{$errors->register->has('name') ? 'is-invalid' : ''}}" value="{{ old('name') }}" placeholder="{{ __('Full Name') }}" maxlength="100" required autofocus  />
                            {{-- Error Message --}}
                            @if ($errors->register->has('name'))
                                <div id="nameFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Child Full Name') }}</label>
                            <input autocomplete="off" type="text" name="child_name" id="child_name" class="form-control {{$errors->register->has('child_name') ? 'is-invalid' : ''}}" value="{{ old('child_name') }}" placeholder="{{ __('Child Full Name') }}" maxlength="100" required  />
                            {{-- Error Message --}}
                            @if ($errors->register->has('child_name'))
                                <div id="child_nameFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('child_name') }}
                                </div>
                            @endif
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Date Of Birth') }}</label>
                            <input autocomplete="off" type="date" name="date_of_birth" id="date_of_birth" class="form-control {{$errors->register->has('date_of_birth') ? 'is-invalid' : ''}}" value="{{ old('date_of_birth') }}" data-placeholder="{{ __('Date Of Birth') }}" required >
                            {{-- Error Message --}}
                            @if ($errors->register->has('date_of_birth'))
                                <div id="date_of_birthFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('date_of_birth') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Child Date Of Birth') }}</label>
                            <input autocomplete="off" type="date" data-placeholder="{{ __('Child Date Of Birth') }}" name="child_date_of_birth" id="child_date_of_birth" class="form-control {{$errors->register->has('child_date_of_birth') ? 'is-invalid' : ''}}" value="{{ old('child_date_of_birth') }}" placeholder="{{ __('Child Date Of Birth') }}" required>
                            {{-- Error Message --}}
                            @if ($errors->register->has('child_date_of_birth'))
                                <div id="child_date_of_birthFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('child_date_of_birth') }}
                                </div>
                            @endif
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('No HP (sesuai nomor Whatsapp)') }}</label>
                            <input autocomplete="off" type="text" name="phone" id="phone" class="form-control {{($errors->register->has('phone') || $errors->register->has('phone_field')) ? 'is-invalid' : ''}}" placeholder="No HP (sesuai nomor Whatsapp)" value="{{ old('phone') }}" maxlength="20" required  />
                            {{-- Error Message --}}
                            @if ($errors->register->has('phone'))
                                <div id="phoneFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('phone') }}
                                </div>
                            @endif
                            @if ($errors->register->has('phone_field'))
                                <div id="phoneFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('phone_field') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('E-mail Address') }}</label>
                            <input
                                autocomplete="off"
                                type="email"
                                name="email"
                                id="email"
                                class="form-control disabled {{$errors->register->has('email') ? 'is-invalid' : ''}}"
                                placeholder="{{ __('E-mail Address') }}"
                                value="{{ old('email') }}"
                                maxlength="255"
                                required
                                />
                            {{-- Error Message --}}
                            @if ($errors->register->has('email'))
                                <div id="emailFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('email') }}
                                </div>
                            @endif
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">

                        <div class="col-md-12">
                            <label for="" class="d-block d-md-none">{{ __('Alamat Rumah Lengkap') }}</label>
                            <textarea autocomplete="off" name="address" id="address" rows="1" class="form-control {{$errors->register->has('address') ? 'is-invalid' : ''}}" placeholder="{{__('Alamat Rumah Lengkap')}}">{{ old('address') }}</textarea>
                            @if ($errors->register->has('address'))
                                <div id="addressFeedback" class="invalid-feedback">
                                    {{ $errors->register->first('address') }}
                                </div>
                            @endif
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Select Province') }}</label>
                            <select autocomplete="off" name="province" id="province" class="form-control select-province" data-current-value={{old('province')}}>
                                <option value="">{{__('Select Province')}}</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->register->has('province'))
                                <div class="text-danger">
                                    {{ $errors->register->first('province') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Select City') }}</label>
                            <select autocomplete="off" name="city" id="city" class="form-control select-city" data-current-value={{old('city')}}>
                                <option value="">{{__('Select City')}}</option>
                            </select>
                            @if ($errors->register->has('city'))
                                <div class="text-danger">
                                    {{ $errors->register->first('city') }}
                                </div>
                            @endif
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Select District') }}</label>
                            <select autocomplete="off" name="district" id="district" class="form-control select-district" data-current-value={{old('district')}}>
                                <option value="">{{__('Select District')}}</option>
                            </select>

                            @if ($errors->register->has('district'))
                                <div class="text-danger">
                                    {{ $errors->register->first('district') }}
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Postal Code') }}</label>
                            <input autocomplete="off" type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code') }}" required  />
                        </div>

                    </div><!--form-group-->

                    <div class="form-group row mb-md-3 mb-0">
                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Password') }}</label>
                            <input autocomplete="off" type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="false-password" />
                            <div class="form-check mt-2 mb-md-0 mb-2">
                                <input type="checkbox" id="password_show" class="form-check-input">
                                <label class="form-check-label" for="password_show">
                                    Tampilkan Kata Sandi
                                </label>
                            </div>
                            <small id="password-errors"></small>

                        </div>

                        <div class="col-md-6">
                            <label for="" class="d-block d-md-none">{{ __('Password Confirmation') }}</label>
                            <input autocomplete="off" type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" maxlength="100" required autocomplete="false-password" />
                        </div>
                    </div><!--form-group-->

                    <div class="form-group">
                        <label for="history_milk_category"><p class="mb-0 font-weight-bold ml-md-2">Kategori produk yang dikonsumsi 3 bulan terakhir?</p></label>
                        <select autocomplete="off" name="history_milk_category[]" id="history_milk_category" class="form-control select-category" data-current-value="{{ old('history_milk_category') ? json_encode(old('history_milk_category')) : '' }}" data-placeholder="{{ __('Kategori produk yang dikonsumsi 3 bulan terakhir?') }}" multiple="multiple">
                            @foreach ($survey_categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="history_milk_product"><p class="mb-0 font-weight-bold ml-md-2">Brand susu yang dikonsumsi 3 bulan terakhir?</p></label>
                        <select autocomplete="off" name="history_milk_product[]" id="history_milk_product" class="form-control select-brand" data-current-value="{{ old('history_milk_product') ? json_encode(old('history_milk_product')) : '' }}" data-placeholder="{{__('Brand susu yang dikonsumsi 3 bulan terakhir')}}" multiple="multiple">
                            @foreach ($survey_brands as $brand)
                            <option value="{{ $brand }}">{{ $brand }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="history_milk_packsize"><p class="mb-0 font-weight-bold ml-md-2">{{__('Packsize')}}</p></label>
                        <select autocomplete="off" name="history_milk_packsize" id="history_milk_packsize" class="form-control select-size" data-current-value="{{ old('history_milk_packsize') ? json_encode(old('history_milk_packsize')) : '' }}" data-placeholder="{{__('Packsize')}}" multiple="multiple">
                            {{-- <option value="" selected disabled>{{__('Packsize')}}</option> --}}
                            @foreach ($survey_packsizes as $packsize)
                                <option value="{{ $packsize }}">{{ $packsize }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" name="others_packsize" id="others_packsize" placeholder="Ukuran Kemasan lain" class="form-control">
                    </div>

                    <div class="form-group row mb-4">
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

                                    <br>

                                    Saya bersedia menerima segala penawaran, promosi, sampel dan komunikasi pemasaran terbaru lainnya melalui:
                                    <ul>
                                        <li>
                                            Newsletter dan email
                                        </li>
                                        <li>
                                            SMS
                                        </li>
                                        <li>
                                            Nomor telepon
                                        </li>
                                    </ul>
                                    {{-- @lang('I agree to the') <a href="{{ route('frontend.pages.terms') }}" target="_blank">@lang('Terms & Conditions')</a> --}}
                                </label>
                            </div>

                        </div>

                        <div class="col-md-6 text-right">
                            <button class="btn btn-rounded btn-dark-green" type="submit">@lang('Register')</button>
                        </div>
                    </div><!--form-group-->

                    {{-- <div class="row d-flex justify-content-center mb-2">
                        <div class="col-md-4 mb-2 mb-md-0">
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
                    </div> --}}
                </x-forms.post>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

@push('after-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#password').keyup(delay(function (e) {
            if ($('#password').val()) {
                $.ajax({
                    url: '/ajax/password-validate',
                    method: 'POST',
                    data: { 'password' : $('#password').val(), 'password_confirmation' : $('#password_confirmation').val() },
                    beforeSend: function(){
                        $('#password-errors').empty()
                        $('#password-errors').removeClass('text-danger')
                    },
                    success: function(result){
                        console.log(result);
                    },
                    error: function(xhr,status,error){
                        if (xhr.status == 422) {
                            const errors = xhr.responseJSON.errors.password;
                            $('#password-errors').addClass('text-danger').text(errors[0])
                        }
                    }
                })
            }
        }, 1000));

        $('#password_show').on('change', function(e){
            if(this.checked){
                $('#password').attr('type', 'text')
                $('#password_confirmation').attr('type', 'text')
            }else{
                $('#password').attr('type', 'password')
                $('#password_confirmation').attr('type', 'password')
            }
        });

        $('#password_confirmation').keyup(delay(function (e) {
            if ($('#password').val()) {
                $.ajax({
                    url: '/ajax/password-validate',
                    method: 'POST',
                    data: { 'password' : $('#password').val(), 'password_confirmation' : $('#password_confirmation').val() },
                    beforeSend: function(){
                        $('#password-errors').empty()
                        $('#password-errors').removeClass('text-danger')
                    },
                    success: function(result){
                        console.log(result);
                    },
                    error: function(xhr,status,error){
                        if (xhr.status == 422) {
                            const errors = xhr.responseJSON.errors.password;
                            $('#password-errors').addClass('text-danger').text(errors[0])
                        }
                    }

                })
            }
        }, 1000))

        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }
    </script>
@endpush


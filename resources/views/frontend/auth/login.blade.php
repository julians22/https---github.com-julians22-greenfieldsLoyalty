@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
@include('frontend.includes.banner')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img src="{{ asset('img/decorations/title_login.png') }}" alt="">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="login-container justify-content-between">
                    <div class="social-login">
                        @include('frontend.auth.includes.social')
                    </div>
                    <div class="borders">
                        <span class="line"></span>
                        <span class="round">OR</span>
                        <span class="line"></span>
                    </div>
                    <div class="form-login">
                        <x-forms.post :action="route('frontend.auth.login')" class="greenfields-form">
                            <div class="form-group">
                                <input type="phone" name="phone" id="phone" class="form-control" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') }}" required autofocus autocomplete="tel" />
                            </div><!--form-group-->

                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />
                            </div>

                            <div class="text-right">
                                <button class="btn btn-green btn-rounded" type="submit">@lang('Login')</button>
                            </div>
                        </x-forms.post>
                    </div>
                </div>
            </div><!--col-md-8-->
        </div><!--row-->

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-2 text-center">
                        <p class="mb-1">@lang('Belum mendaftar?') <a href="{{ route('frontend.auth.register') }}">@lang('Daftar Sekarang')</a></p>
                        <x-utils.link :href="route('frontend.auth.password.request')" class="btn btn-link" :text="__('Forgot Your Password?')" />
                    </div>
                </div><!--form-group-->
            </div>
        </div>
    </div><!--container-->
@endsection

@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')

<div class="container-fluid pt-5 pb-4">
    <div class="row">
        <div class="col-md-12">
            <x-frontend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/title_profile.png') }}" alt="">
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <x-forms.post :action="route('frontend.auth.register')" class="greenfields-form">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="text" name="name" id="name" class="form-control" value="{{ $logged_in_user->name }}" placeholder="{{ __('Name') }}" maxlength="100" required autocomplete="name" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="child_name" id="child_name" class="form-control" value="{{ $logged_in_user->child_name }}" placeholder="{{ __('Child Name') }}" maxlength="100" required autocomplete="child_name" />
                                            </div>
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $logged_in_user->date_of_birth }}" data-placeholder="{{ __('Date Of Birth') }}" required autocomplete="date_of_birth">
                                            </div>

                                            <div class="col-md-6">
                                                <input type="date" data-placeholder="Child Date of birth" name="child date_of_birth" id="child date_of_birth" class="form-control" value="{{ $logged_in_user->child_date_of_birth }}" placeholder="{{ __('Child Date Of Birth') }}" required autocomplete="child date_of_birth">
                                            </div>
                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="phone" name="phone" id="phone" class="form-control" placeholder="{{ __('Phone Number') }}" value="{{ $logged_in_user->phone }}" maxlength="15" required autocomplete="phone" />
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $logged_in_user->email }}" maxlength="255" required autocomplete="email" />
                                            </div>
                                        </div><!--form-group-->

                                        <div class="form-group row">

                                            <div class="col-md-12">
                                                <textarea name="address" id="address" rows="1" class="form-control" placeholder="{{__('Full Address')}}"></textarea>
                                            </div>

                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <select name="province" id="province" class="form-control">
                                                    <option value="">{{__('Select Province')}}</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <select name="city" id="city" class="form-control">
                                                    <option value="">{{__('Select City')}}</option>
                                                </select>
                                            </div>

                                        </div><!--form-group-->

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <select name="district" id="district" class="form-control">
                                                    <option value="">{{__('Select District')}}</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code') }}" required autocomplete="postal_code" />
                                            </div>

                                        </div><!--form-group-->

                                        <div class="form-group row">

                                            <div class="col-md-6 offset-md-6 text-right">
                                                <button class="btn btn-rounded btn-green" type="button">@lang('Change Password')</button>
                                                <button class="btn btn-rounded btn-green ml-2" type="submit">@lang('Change Profile')</button>
                                            </div>
                                        </div><!--form-group-->
                                    </x-forms.post>
                                </div><!--col-md-10-->
                            </div><!--row-->
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/title_activity.png') }}" alt="">
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/title_voucher.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>


    <div class="container py-4 d-none">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        @lang('My Account')
                    </x-slot>

                    <x-slot name="body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <x-utils.link
                                    :text="__('My Profile')"
                                    class="nav-link active"
                                    id="my-profile-tab"
                                    data-toggle="pill"
                                    href="#my-profile"
                                    role="tab"
                                    aria-controls="my-profile"
                                    aria-selected="true" />

                                <x-utils.link
                                    :text="__('Edit Information')"
                                    class="nav-link"
                                    id="information-tab"
                                    data-toggle="pill"
                                    href="#information"
                                    role="tab"
                                    aria-controls="information"
                                    aria-selected="false"/>

                                @if (! $logged_in_user->isSocial())
                                    <x-utils.link
                                        :text="__('Password')"
                                        class="nav-link"
                                        id="password-tab"
                                        data-toggle="pill"
                                        href="#password"
                                        role="tab"
                                        aria-controls="password"
                                        aria-selected="false" />
                                @endif

                                <x-utils.link
                                    :text="__('Two Factor Authentication')"
                                    class="nav-link"
                                    id="two-factor-authentication-tab"
                                    data-toggle="pill"
                                    href="#two-factor-authentication"
                                    role="tab"
                                    aria-controls="two-factor-authentication"
                                    aria-selected="false"/>
                            </div>
                        </nav>

                        <div class="tab-content" id="my-profile-tabsContent">
                            <div class="tab-pane fade pt-3 show active" id="my-profile" role="tabpanel" aria-labelledby="my-profile-tab">
                                <div class="mb-2">
                                    @include('includes.partials.profile-completion')
                                </div>
                                @include('frontend.user.account.tabs.profile')
                            </div><!--tab-profile-->

                            <div class="tab-pane fade pt-3" id="information" role="tabpanel" aria-labelledby="information-tab">
                                <div class="mb-2">
                                    @include('includes.partials.profile-completion')
                                </div>
                                @include('frontend.user.account.tabs.information')
                            </div><!--tab-information-->

                            @if (! $logged_in_user->isSocial())
                                <div class="tab-pane fade pt-3" id="password" role="tabpanel" aria-labelledby="password-tab">
                                    <div class="mb-2">
                                    @include('includes.partials.profile-completion')
                                    </div>
                                    @include('frontend.user.account.tabs.password')
                                </div><!--tab-password-->
                            @endif

                            <div class="tab-pane fade pt-3" id="two-factor-authentication" role="tabpanel" aria-labelledby="two-factor-authentication-tab">
                                @include('frontend.user.account.tabs.two-factor-authentication')
                            </div><!--tab-information-->
                        </div><!--tab-content-->
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-10-->
        </div><!--row-->
    </div><!--container-->
@endsection

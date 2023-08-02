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
                                <img src="{{ asset('img/decorations/title_profile.png') }}" alt="">
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <x-forms.patch :action="route('frontend.user.profile.update')" class="greenfields-form">
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
                                                    <input type="text" name="child_name" id="child_name" class="form-control" value="{{ $logged_in_user->child_name }}" placeholder="{{ __('Child Name') }}" maxlength="100" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="date_of_birth">{{ __('Date Of Birth') }}</label>
                                                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ $logged_in_user->date_of_birth }}"  required autocomplete="false">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="child_date_of_birth">{{ __('Child Date Of Birth') }}</label>
                                                    <input type="date"  name="child_date_of_birth" id="child_date_of_birth" class="form-control" value="{{ $logged_in_user->child_date_of_birth }}" placeholder="{{ __('Child Date Of Birth') }}" required autocomplete="false">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">No HP (sesuai nomor Whatsapp)</label>
                                                    <input type="phone" name="phone" id="phone" class="form-control" placeholder="0812345678" value="{{ $logged_in_user->phone }}" maxlength="15" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">{{ __('E-mail Address') }}</label>
                                                    <input type="email" disabled name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ $logged_in_user->email }}" maxlength="255" required autocomplete="false" />
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="address">{{__('Full Address')}}</label>
                                                    <textarea name="address" id="address" rows="1" class="form-control" placeholder="{{__('Full Address')}}" value="{{ $logged_in_user->address }}">{{ $logged_in_user->address }}</textarea>
                                                </div><!--form-group-->
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="provinve">{{__('Select Province')}}</label>
                                                    <select name="province" id="province" class="form-control select-province" data-current-value="{{ $address ? $address->province : 0}}" autocomplete="false">
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
                                                    <select name="city" id="city" class="form-control select-city" data-current-value="{{ $address ? $address->city : 0}}" autocomplete="false">
                                                        <option value="">{{__('Select City')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="district">{{__('Select District')}}</label>
                                                    <select name="district" id="district" class="form-control select-district" data-current-value="{{ $address ? $address->district : 0}}" autocomplete="false">
                                                        <option value="">{{__('Select District')}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postal_code">{{ __('Postal Code') }}</label>
                                                    <input type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ $logged_in_user->postal_code }}" required autocomplete="postal_code" />
                                                </div>
                                            </div>

                                            @if (!$logged_in_user->isHasDetail() && !$logged_in_user->isHasAddressData())

                                            @endif
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-md-6 offset-md-6 text-right">
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

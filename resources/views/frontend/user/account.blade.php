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
                                                <textarea name="address" id="address" rows="1" class="form-control" placeholder="{{__('Full Address')}}" value="{{ $logged_in_user->address }}">{{ $logged_in_user->address }}</textarea>
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
                                                <input type="postal_code" name="postal_code" id="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ $logged_in_user->postal_code }}" required autocomplete="postal_code" />
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

                            <div class="row">
                                <div class="col-md-8">

                                    <table class="table table-sm table-bordered table-striped">
                                        <thead class="bg-dark-green text-white">
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Aktivitas</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Senin, 11-12-2023</td>
                                                <td>Tote Bag -50pts</td>
                                                <td>Menunggu Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Senin, 11-12-2023</td>
                                                <td>Tote Bag -50pts</td>
                                                <td>Menunggu Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Senin, 11-12-2023</td>
                                                <td>Tote Bag -50pts</td>
                                                <td>Menunggu Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Senin, 11-12-2023</td>
                                                <td>Tote Bag -50pts</td>
                                                <td>Menunggu Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Senin, 11-12-2023</td>
                                                <td>Tote Bag -50pts</td>
                                                <td>Menunggu Approval</td>
                                            </tr>
                                            <tr>
                                                <td>Senin, 11-12-2023</td>
                                                <td>Tote Bag -50pts</td>
                                                <td>Menunggu Approval</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/title_voucher.png') }}" alt="">
                            </div>

                            <div x-data="{ displayVoucher: false }">
                                <button class="btn btn-dark-green btn-rounded" type="button" @click="displayVoucher = !displayVoucher">Lihat Voucher</button>

                                <div x-show="displayVoucher" style="display: none" >
                                    <div class="row mt-4">
                                        <div class="col-md-3">
                                            <div class="rounded bg-secondary p-2">
                                                <p class="h4 mb-0 font-weight-bolder text-white text-center">{{ Str::random(10) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>
@endsection

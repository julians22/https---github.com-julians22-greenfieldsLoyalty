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
                                <div class="col-md-8 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-striped table-sm">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 25%">{{ __('Full Name') }}</th>
                                                    <td style="width: 25%">{{ $logged_in_user->name ?? "-" }}</td>

                                                    <th>{{ __('Child Name') }}</th>
                                                    <td>{{ $logged_in_user->child_name ?? "-" }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('Date Of Birth') }}</th>
                                                    <td>{{ $logged_in_user->date_of_birth ?? "-" }}</td>

                                                    <th>{{ __('Child Date Of Birth') }}</th>
                                                    <td>{{ $logged_in_user->child_date_of_birth ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Phone Number') }}</th>
                                                    <td>{{ $logged_in_user->phone ?? "-" }}</td>

                                                    <th>{{ __('E-mail Address') }}</th>
                                                    <td>{{ $logged_in_user->email ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th colspan="4" class="bg-dark-green text-white">
                                                        @lang('Alamat Domisili')
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>{{__('Full Address')}}</th>
                                                    <td colspan="3">{{ $logged_in_user->address ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Province') }}</th>
                                                    <td>{{ $logged_in_user->province ? $logged_in_user->address_data->rel_province->name : "-" }}</td>

                                                    <th>{{ __('City') }}</th>
                                                    <td>{{ $logged_in_user->city ? $logged_in_user->address_data->rel_city->name : "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('District') }}</th>
                                                    <td>{{ $logged_in_user->city ? $logged_in_user->address_data->rel_district->name : "-" }}</td>

                                                    <th>{{ __('Postal Code') }}</th>
                                                    <td>{{ $logged_in_user->postal_code ?? "-" }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 offset-md-6 text-md-right text-left">
                                            <button class="btn btn-rounded btn-green btn-sm" type="button">@lang('Change Password')</button>

                                            <x-utils.link
                                                class="btn btn-green btn-rounded ml-md-2 btn-sm"
                                                :href="route('frontend.user.edit-account')"
                                                :text="__('Change Profile')"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/title_activity.png') }}" alt="">
                            </div>

                            <div class="row">
                                <div class="col-md-8">

                                    <div class="table-responsive">
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
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/title_voucher.png') }}" alt="">
                            </div>
                            <p>Kamu bisa melihat hadiah unuk pengguna baru si sini!</p>

                            @if ($logged_in_user->isHasDetail() && $logged_in_user->isHasAddressData() && $logged_in_user->isWhatsappVerified())
                                <div x-data="{ displayVoucher: false }">
                                    <button class="btn btn-dark-green btn-rounded" type="button" @click="displayVoucher = !displayVoucher">Lihat Voucher</button>

                                    <div x-show="displayVoucher" style="display: none" >
                                        <div class="row my-md-4 my-2">
                                            <div class="col-md-3">
                                                <div class="rounded bg-secondary p-2">
                                                    <p class="h4 mb-0 font-weight-bolder text-white text-center">{{ $logged_in_user->voucher->code }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p>Cek <a href="{{ route('frontend.pages.terms') }}">syarat & ketentuannya disini!</a></p>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    Ayo, lengkapi profil bunda sekarang untuk mendapatkan promo khusu anggota baru dari greenfields!, <a href="{{ route('frontend.user.edit-account') }}">Klik disini</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
</div>
@endsection

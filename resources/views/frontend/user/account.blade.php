@extends('frontend.layouts.app')

@section('title', __('My Account'))

@section('content')

<div class="container-fluid pt-5 pb-4">
    <div class="row">
        <div class="col-md-12">
            <x-frontend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12 mb-4 md-mb-2">
                            <div class="page_title">
                                {{-- <img src="{{ asset('img/decorations/title_profile.png') }}" alt=""> --}}
                                <h1 class="title_text" title="Profil">Profil</h1>
                            </div>

                            <div class="row">
                                <div class="col-md-8 col-12">
                                    <div class="table-responsive">
                                        {{-- Desktop View --}}
                                        <table class="table table-borderless table-hover table-striped table-sm d-none d-md-table">
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
                                        {{-- Modile View --}}
                                        <table class="table table-borderless table-hover table-striped table-sm d-table d-md-none">
                                            <tbody>
                                                <tr>
                                                    <th>{{ __('Full Name') }}</th>
                                                    <td>{{ $logged_in_user->name ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Phone Number') }}</th>
                                                    <td>{{ $logged_in_user->phone ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('E-mail Address') }}</th>
                                                    <td>{{ $logged_in_user->email ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Date Of Birth') }}</th>
                                                    <td>{{ $logged_in_user->date_of_birth ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Child Name') }}</th>
                                                    <td>{{ $logged_in_user->child_name ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Child Date Of Birth') }}</th>
                                                    <td>{{ $logged_in_user->child_date_of_birth ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th colspan="2" class="bg-dark-green text-white">
                                                        @lang('Alamat Domisili')
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>{{__('Full Address')}}</th>
                                                    <td colspan="2">{{ $logged_in_user->address ?? "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('Province') }}</th>
                                                    <td>{{ $logged_in_user->province ? $logged_in_user->address_data->rel_province->name : "-" }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('City') }}</th>
                                                    <td>{{ $logged_in_user->city ? $logged_in_user->address_data->rel_city->name : "-" }}</td>
                                                </tr>

                                                <tr>
                                                    <th>{{ __('District') }}</th>
                                                    <td>{{ $logged_in_user->city ? $logged_in_user->address_data->rel_district->name : "-" }}</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('Postal Code') }}</th>
                                                    <td>{{ $logged_in_user->postal_code ?? "-" }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 offset-md-6 text-md-right text-left">
                                            <button class="btn btn-rounded btn-green btn-sm" data-toggle="modal" data-target="#changePasswordModal" type="button">@lang('Change Password')</button>

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
                                {{-- <img src="{{ asset('img/decorations/title_activity.png') }}" alt=""> --}}
                                <h1 class="title_text" title="Riwayat Aktivitasmu">Riwayat Aktivitasmu</h1>
                            </div>

                            <div class="row">
                                <div class="col-md-8">

                                    <div class="row mb-2 mb-md-3">
                                        <div class="col">
                                            @livewire('frontend.widgets.user-top-up')
                                        </div>
                                    </div>

                                    <div class="table-responsive mb-2 md-mb-0">
                                        <table class="table table-sm table-bordered table-striped">
                                            <thead class="bg-dark-green text-white">
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Aktivitas</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($transactions) > 0)
                                                    @foreach ($transactions as $item)
                                                        <tr>
                                                            <td>{{ $item['date']->isoFormat('dddd, D MMMM Y') }}</td>
                                                            <td>{!! $item['activity'] !!}</td>
                                                            <td>{{ $item['status'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="3"><p class="text-center my-2">Belum ada aktivitas</p></td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                {{-- <img src="{{ asset('img/decorations/title_voucher.png') }}" alt=""> --}}
                                <h1 class="title_text" title="Hadiah Kamu">Hadiah Kamu</h1>
                            </div>
                            <p>Kamu bisa melihat hadiah khusus pengguna baru di sini.</p>

                            @if ($logged_in_user->isHasDetail() && $logged_in_user->isHasAddressData() && $logged_in_user->isWhatsappVerified())
                                @if ($logged_in_user->isWebUser() || $logged_in_user->isWhatsappUser() && $logged_in_user->voucher)
                                    <div x-data="{ displayVoucher: false }">
                                        <button class="btn btn-dark-green btn-rounded" type="button" @click="displayVoucher = !displayVoucher">Lihat Hadiah</button>

                                        <div x-show="displayVoucher" style="display: none" >
                                            <div class="row my-md-4 my-2">
                                                <div class="col-md-3">
                                                    <div class="rounded bg-secondary p-2">
                                                        <p class="h4 mb-0 font-weight-bolder text-white text-center">{{ $logged_in_user->voucher->code }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Voucher dapat digunakan untuk pembelian di Ecommerce Tokopedia Greenfields Official Store untuk etalase berikut: <a target="blank" href="https://www.tokopedia.com/greenfields/twinpack-susu-segar-greenfields-fresh-milk-full-cream-1l?extParam=whid%3D14167728">Tokopedia</a></p>
                                            <p>Cek <a href="{{ route('frontend.promo.index') }}?show=promo-khusus-anggota-baru">syarat & ketentuannya di sini!</a></p>
                                        </div>
                                    </div>
                                @elseif ($logged_in_user->isWebQrUser() && $logged_in_user->offline_reward)
                                {{-- @dump($logged_in_user->offline_reward) --}}
                                <div x-data="{ displayVoucher: false }">
                                    <button class="btn btn-dark-green btn-rounded" type="button" @click="displayVoucher = !displayVoucher">Lihat Hadiah</button>

                                    <div x-show="displayVoucher" style="display: none" >
                                        <div class="row my-md-4 my-2">
                                            <div class="col-md-3">
                                                <div class="card card-reward">
                                                    <div class="card-body">
                                                        <div class="reward-img-wrapper">
                                                            <img src="{{ $logged_in_user->offline_reward->reward->image }}" alt="{{ $logged_in_user->offline_reward->reward->name }}" class="reward-img">
                                                        </div>

                                                        <div class="reward-detail-wrapper">
                                                            <h4 class="card-title text-center">{{ $logged_in_user->offline_reward->reward->name }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    @if ($logged_in_user->isWebQrUser())
                                        <div class="alert alert-warning">
                                            Ayo, lengkapi profil kamu sekarang untuk mendapatkan promo khusus anggota baru dari greenfields! <a href="{{ route('frontend.user.edit-account') }}">Klik disini</a>
                                        </div>
                                    @endif
                                @endif
                            @else
                                <div class="alert alert-warning">
                                    Ayo, lengkapi profil bunda sekarang untuk mendapatkan promo khusus anggota baru dari greenfields! <a href="{{ route('frontend.user.edit-account') }}">Klik disini</a>
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

@push('before-scripts')
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <x-forms.patch :action="route('frontend.auth.password.change')">
                            <div class="form-group row">
                                <label for="current_password" class="col-md-3 col-form-label text-md-right">@lang('Current Password')</label>

                                <div class="col-md-9">
                                    <input type="password" name="current_password" class="form-control" placeholder="{{ __('Current Password') }}" maxlength="100" required autofocus />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">@lang('New Password')</label>

                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('New Password') }}" maxlength="100" required />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-3 col-form-label text-md-right">@lang('New Password Confirmation')</label>

                                <div class="col-md-9">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('New Password Confirmation') }}" maxlength="100" required />
                                </div>
                            </div><!--form-group-->

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-sm btn-dark-green float-right" type="submit">@lang('Update Password')</button>
                                </div>
                            </div><!--form-group-->
                        </x-forms.patch>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush

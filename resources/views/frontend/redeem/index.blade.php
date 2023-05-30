@extends('frontend.layouts.app')

@section('title', __('Tukar Hadiah'))

@section('content')
    <div class="container-fluid pt-md-5 pb-md-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="page_title">
                    <img src="{{ asset('img/decorations/redeem_titletext.png') }}" alt="">
                </div>
                @livewire('frontend.redeem-component')
            </div>
        </div>
    </div>
@endsection

@push('before-scripts')
    <div class="modal fade" id="redeemModal" data-backdrop="static" tabindex="-1" aria-labelledby="redeemModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page_title text-center">
                                <img src="{{ asset('img/decorations/grats_titletext.png') }}" alt="">
                                <h4 class="text-black">Kamu bisa menukarkan poinmu dengan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <div class="card card-reward">
                                <div class="card-body">
                                    <div class="reward-img-wrapper">
                                        <img src="" class="reward-img">
                                    </div>

                                    <div class="reward-detail-wrapper">
                                        <h4 class="card-title text-center"></h4>
                                        <p class="point"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center align-items-center mt-4">
                        <div class="text-black font-weight-bold px-4 text-center reedem_cur_user_point"></div>
                        <div class="text-black font-weight-bold px-4 text-center"> - </div>
                        <div class="text-black font-weight-bold px-4 text-center reedem_reward_point"></div>
                        <div class="text-black font-weight-bold px-4 text-center reedem_"> = </div>
                        <div class="text-black font-weight-bold px-4 text-center reedem_total_user_point"></div>
                    </div>

                    <div class="row pb-5">
                        <div class="col-md-12">
                            <h5 class="text-black text-center">Hadiah akan dikirim ke alamat:</h5>
                            <input type="hidden" name="address_id" id="current_address_id" value="{{ $address_data->id }}">
                            <div class="row mt-2">
                                <div class="col-md-6 offset-md-3">
                                    <p id="current_address" class="text-black font-weight-bold text-center mb-0">{{ $address_data->address }},</p>
                                    <p id="current_province" class="text-black font-weight-bold text-center mb-0">{{ $address_data->rel_province->name }},</p>
                                    <p id="current_city" class="text-black font-weight-bold text-center mb-0">{{ $address_data->rel_city->name }},</p>
                                    <p id="current_district" class="text-black font-weight-bold text-center mb-0">{{ $address_data->rel_district->name }},</p>
                                    <p id="current_postcode" class="text-black font-weight-bold text-center">{{ $address_data->postal_code }}</p>
                                </div>
                                <div class="col-md-12 text-center">
                                    <a href="{{ route('frontend.user.edit-account') }}" class="btn btn-secondary rounded-pill">Ubah Alamat Pengiriman</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- @livewire('frontend.address-selector-component', [], key($logged_in_user->id)) --}}

                    <div class="row d-flex justify-content-between">
                        <div class="col-md-2">
                            <button data-dismiss="modal" class="btn btn-secondary btn-rounded">Batal</button>
                        </div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-dark-green btn-rounded">Setuju</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addressModal" data-backdrop="static" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <button
                                class="btn btn-dark-green btn-rounded"
                                id="save_current_address">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endpush

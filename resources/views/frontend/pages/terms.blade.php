@extends('frontend.layouts.app')

@section('title', __('Syarat & Ketentuan'))

@section('content')
<div class="container-fluid pt-5 pb-4">
    <div class="row">
        <div class="col-md-10 ml-0 ml-md-5">
            <x-frontend.card>
                <x-slot name="body">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="page_title">
                                <img src="{{ asset('img/decorations/snk_titletext.png') }}" alt="">
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>

                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                Perhitungan Poin
                            </h2>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('img/icon_1_snk.png') }}" alt="" style="height: 60px; width: auto;">
                                        </div>
                                        <div class="ml-2" style="flex: 1;">
                                            <p>Mendapatkan 1 poin setiap belanja Rp. 35.000 berlaku kelipatan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('img/icon_2_snk.png') }}" alt="" style="height: 60px; width: auto;">
                                        </div>
                                        <div class="ml-2" style="flex: 1;">
                                            <p>Potongan harga 15% di hari ulang tahun (min. belanja Rp. 500.000 dan max. Rp. 1.500.000</p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex">
                                        <div>
                                            <img src="{{ asset('img/icon_3_snk.png') }}" alt="" style="height: 60px; width: auto;">
                                        </div>
                                        <div class="ml-2" style="flex: 1;">
                                            <p>Tukarkan poin kamu dengan beragam produk pilihan, hadiah menarik dan juga voucher belanja</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead class="bg-dark-green text-white">
                                            <tr>
                                                <th>Fresh Milk</th>
                                                <th>Poin yang didapat</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Fresh Milk </td>
                                                <td>1000pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Jersey</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Low Fat</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Skimmed</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Chocomalt</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Strawberry</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Fresh Milk Low Fat Mochacinno</td>
                                                <td>1750pts</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-6">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead class="bg-dark-green text-white">
                                            <tr>
                                                <th>UHT Milk</th>
                                                <th>Poin yang didapat</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>Strawberry</td>
                                                <td>1000pts</td>
                                            </tr>
                                            <tr>
                                                <td>Chocomalt</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Full Cream</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Low Fat</td>
                                                <td>1500pts</td>
                                            </tr>
                                            <tr>
                                                <td>Skimmed</td>
                                                <td>1500pts</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                PERIODE KEGIATAN
                            </h2>
                            <p>
                                Kegiatan “Loyalty Program” akan berlangsung dari 10 Februari 2023 hingga tanggal 31 Desember
                                2023
                            </p>
                        </div>


                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                PERSYARATAN PESERTA
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                            </p>
                        </div>

                        <div class="col-md-12 mb-2">
                            <h2 class="font-weight-bold">
                                MEKANISME KEGIATAN
                            </h2>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint
                                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                                laborum. Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                magna aliqua. Ut enim ad
                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum
                                dolor sit amet, consectetur
                                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam, quis
                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                cupidatat non proident, sunt in culpa
                                qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur
                                adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                                in culpa qui officia deserunt
                            </p>
                        </div>
                    </div>
                </x-slot>
            </x-frontend.card>
        </div>
    </div>
    <!--row-->
</div>
<!--container-->
@endsection

<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <div class="col-md-12">
            @if ($show_address_selector)
                <div>
                    <h4 class="text-center text-dark-green mb-3">Pilih Alamat Pengiriman, dari daftar alamat di bawah ini ya!</h4>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th><small class="text-center">Pilihan</small></th>
                                    <th><small>Label</small></th>
                                    <th><small>(Nama Jalan & Nomor Rumah)</small></th>
                                    <th><small>Provinsi</small></th>
                                    <th><small>Kota/Kabupaten</small></th>
                                    <th><small>Kecamatan</small></th>
                                    <th><small>Kode Pos</small></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($addresses_data)
                                @foreach ($addresses_data as $address)
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                @if ($address->is_primary == 1)
                                                    <button wire:loading.attr="disabled" class="btn btn-sm btn-dark-green rounded-pill">Dipilih</button>
                                                @else
                                                    <button wire:loading.attr="disabled" class="btn btn-sm btn-secondary rounded-pill" wire:click="checkAddress({{$address->id}})">Pilih</button>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <small class="text-black">{{ $address->label ?? "-" }}</small>
                                        </td>
                                        <td>
                                            <small class="text-black">{{ $address->address }}</small>
                                        </td>
                                        <td>
                                            <small class="text-black">{{ $address->rel_province->name }}</small>
                                        </td>
                                        <td>
                                            <small class="text-black">{{ $address->rel_city->name }}</small>
                                        </td>
                                        <td>
                                            <small class="text-black">{{ $address->rel_district->name }}</small>
                                        </td>
                                        <td>
                                            <small class="text-black">{{ $address->postal_code }}</small>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-success" wire:loading.attr="disabled"><i class="fas fa-edit"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <p class="text-black-50">Tidak ada data</p>
                                        </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="btn-secondary rounded-pill" wire:click="showAddressSelector(0)">Ubah Alamat Pengiriman</button>
            @else
                <button class="btn-secondary rounded-pill" wire:click="showAddressSelector(1)">Ubah Alamat Pengiriman</button>
            @endif
        </div>

        <div class="col-md-12">
        </div>
    </div>
</div>

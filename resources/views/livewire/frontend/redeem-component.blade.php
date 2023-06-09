<div>
    {{-- The whole world belongs to you. --}}
    <div class="row">
        <div class="col-md-12 greenfields-form">
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="range_point" class="d-md-hidden d-block">Rentang Poin</label>
                    <select name="range_point" id="range_point" wire:model="range_point" class="form-control">
                        <option value="" disabled selected>Rentang Poin</option>
                        @foreach ($pointRangesData as $key => $item)
                            <option value="{{$key}}">{{ number_format($item['min']) }} - {{ $item['max'] ? number_format($item['max']) : "Ke atas" }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mt-2 mt-md-0">
                    <label for="range_point" class="d-md-hidden d-block">Cari Hadiah</label>
                    <input type="text" name="keyword" wire:model.debounce.1000ms="keyword"  wire:loading.attr="disabled" wire:target="keyword" placeholder="Masukkan Pencarian" class="form-control">
                </div>
            </div>
        </div>
    </div>
    @if ($rewards->count())
        <div class="row row-cols-1 row-cols-md-3">
            @foreach ($rewards as $reward)
                <div class="col mb-4">
                    <div class="card card-reward">
                        <div class="card-body">
                            <div class="reward-img-wrapper">
                                <img src="{{ $reward->image }}" alt="{{ $reward->name }}" class="reward-img">
                            </div>

                            <div class="reward-detail-wrapper">
                                <h4 class="card-title text-center">{{ $reward->name }}</h4>
                                <p class="point">{{number_format($reward->point, 0, ".", ".")}} pts</p>
                            </div>
                            @if ($reward->point > $logged_in_user->point)
                                <a class="btn mb-3 btn-rounded disabled btn-secondary btn-green" href="javascript:void(0)">TUKAR HADIAH</a>
                            @else
                                <a class="btn mb-3 btn-rounded btn-green" href="#"
                                    data-toggle="modal"
                                    data-target="#redeemModal"
                                    data-reward-id="{{ $reward->id }}"
                                    data-reward-image="{{ $reward->image }}" alt="{{ $reward->name }}"
                                    data-reward-name="{{ $reward->name }}"
                                    data-reward-current-point="{{ $logged_in_user->point }}"
                                    data-reward-point="{{ $reward->point }}">TUKAR HADIAH</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row cols-1">
            <div class="col mt-5">
                <div class="text-center">
                    <h3 class="text-dark-green">Maaf Pencarian anda tidak dapat ditemukan</h3>
                    <button class="btn-rounded btn-dark-green btn" wire:click="resetFilters()">Tampilkan semua produk</button>
                </div>
            </div>
        </div>
    @endif

</div>

<div class="d-inline-block">
    {{-- Be like water. --}}
    <a href="#" data-target="#syncModal" data-toggle="modal" class="btn btn-info">
        <i class="fas fa-file-excel mr-2"></i>
        Upload File & Process Data
    </a>

    <div wire:ignore.self class="modal fade" id="syncModal" tabindex="-1" role="dialog" aria-labelledby="syncModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File & Process Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="courier">@lang('Courier')</label>
                        <select wire:model="courier" class="form-control" id="courier">
                            @foreach ($couriers as $item)
                                <option value="{{$item['value']}}">{{$item['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                        <div class="custom-file">
                            <input type="file" wire:model="file" id="file" class="form-control-file form-control">
                            <label class="custom-file-label" for="file">Choose file</label>
                        </div>
                        <p class="mb-1">
                            <small>
                                When all the data you have created is <code><strong>correct (all fields are filled in correctly)</strong></code>, please upload the file by clicking the <code>Sync Data</code> button to continue the synchronization process
                            </small>
                        </p>
                        @error('file') <span class="error text-danger">{{ $message }}</span> @enderror

                        @if ($file)
                            <div class="badge badge-success">
                                {{ $fileName }}

                                <span wire:click="removeFile">
                                    <i class="fas fa-times"></i>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    @if ($file)
                        <button type="button" class="btn btn-primary" wire:click="submitSyncFile">Process</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

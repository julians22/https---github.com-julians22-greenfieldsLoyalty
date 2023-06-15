<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-dark-green">Total Upload Struk</h6>
                    <span class="h3 text-center">
                        {{$successTopupTotal}}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-dark-green">TOTAL STRUK VALID</h6>
                    <span class="h3 text-center">
                        {{$successTopupCount}}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title text-dark-green">TOTAL STRUK INVALID</h6>
                    <span class="h3 text-center">
                        {{$failedTopupCount}}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadReceiptModal" tabindex="-1" aria-labelledby="uploadReceiptModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <x-forms.post action="{{ route('frontend.toptup.store') }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="receipt" class="text-dark-green font-weight-bold">Pilih foto struk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="receipt" id="receipt" onchange="loadFile(event)">
                                <label class="custom-file-label" for="customFile">Pilih Foto</label>
                            </div>
                        </div>

                        <div class="receipt-preview">
                            <img id="output"/>
                        </div>

                        <p>Pastikan foto struk yang kamu masukkan sudah sesuai dengan <a target="_blank" href="{{ route('frontend.pages.terms') }}#upload-receipt">Syarat & Ketentuan</a> Foto Struk</p>
                        <p>Struk akan kami validasi dalam waktu 3x24 jam. Poin akan otomatis terupdate di Profil. Mohon menunggu dan secara berkala melakukan cek poin. Jika lebih dari 3x24 jam poin belum terupdate, mohon menghubungi customer service kami di Whatsapp ini 0851-7210-0967. </p>
                        <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal" aria-label="Close">Kembali</button>
                        <button type="submit" class="btn btn-dark-green btn-rounded">Kirim!</button>
                    </x-forms.post>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>


  @push('after-scripts')
  <script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    $('#uploadReceiptModal').on('hidden.bs.modal', function (event) {
        let output = document.getElementById('output');
        output.src = "";

        $("#receipt").val("");
    })
  </script>
  @endpush

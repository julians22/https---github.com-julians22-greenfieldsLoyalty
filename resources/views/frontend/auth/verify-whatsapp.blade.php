@extends('frontend.layouts.app')

@section('title', __('Verify Your E-mail Address'))

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-frontend.card>

                    <x-slot name="body">
                        <h4 class="text-center">
                            @lang('Verifikasi Nomor Whatsapp')
                        </h4>
                        <p>Sebelum melanjutkan, kami telah mengirimkan 4 digit kode OTP ke nomor whatsapp <strong>{{ $logged_in_user->phone }}</strong>.</p>
                        <p>Kami juga mengirim OTP ke dalam email kamu <strong>{{ $logged_in_user->email }}</strong> (Mohon cek Spam Inbox kamu)</p>
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <div class="form-group text-center">
                                    <label for="otp">Masukkan 4 Digit OTP</label>
                                    <input type="text" class="form-control text-center" name="otp" id="otp" autocomplete="one-time-code">

                                    <button class="btn btn-dark-green mt-2" id="verif">Verifikasi</button>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0"><strong>{{ $logged_in_user->phone }}</strong> Bukan nomor kamu? <a href="{{ route('frontend.user.edit-account') }}"> Ubah nomor kamu disini</a></p>

                        Jika kamu belum menerima kode.
                        <x-forms.post :action="route('frontend.auth.verification.resend')" class="d-inline">
                            <button class="btn btn-link p-0 m-0 align-baseline" type="submit">@lang('click here to request another').</button>
                        </x-forms.post>
                    </x-slot>
                </x-frontend.card>
            </div><!--col-md-8-->
        </div><!--row-->
    </div><!--container-->
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#verif').on('click', () => {
                $button = $(this);
                $button.prop("disabled", true);
                const otp = $('#otp').val();
                if (otp) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('frontend.auth.verification.whatsapp.validate') }}",
                        data: {
                            otp: otp
                        },
                    }).done(function (response, textStatus, jqXHR){
                        // Log a message to the console
                        console.log("Hooray, it worked!", response);
                        if (response.status == true) {
                            setTimeout(() => {
                                window.location.replace("{{ route('frontend.index') }}");
                            }, 1000);
                        }else{
                            alert('OTP yang kamu masukkan tidak valid');
                        }
                    }).fail(function (jqXHR, textStatus, errorThrown){
                        // Log the error to the console
                        console.error(
                            "The following error occurred: "+
                            textStatus, errorThrown
                        );
                    }).always(function () {
                        // Reenable the inputs
                        $button.prop("disabled", false);
                    });
                }else{
                    alert('Masukkan Kode OTP');
                }
            })
        })
    </script>
@endpush

<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use Http;
use Illuminate\Http\Request;
use Seshac\Otp\Otp;


class WhatsappVerificationController extends Controller
{
    public function show(Request $request)
    {
        $otp = $this->send_otp(auth()->user()->phone);

        // dd($otp);

        return view('frontend.auth.verify-whatsapp');
    }

    public function validate_otp(Request $request)
    {
        $token = $request->otp;
        $phone = auth()->user()->phone;

        $status = Otp::validate($phone, $token);

        if ($status->status == true) {

            $user = User::find(auth()->user()->id);
            $user->whatsapp_validate_at = now();
            $user->active = 1;
            $user->save();

            return response()->json($status);
        }


    }

    protected function send_otp($phone)
    {
        $otp =  Otp::generate($phone);

        $token = env('WHATSAPP_SENDER_TOKEN');
        $phone = $phone;
        $messageSend = "Kode OTP Anda adalah : " . $otp->token . "\n Mohon untuk tidak membalas pesan ini. \n Terima Kasih, \n Greenfields Support";
        $url = env('WHATSAPP_BASE_URL');
        $endpoint = "/api/send-message?phone=$phone&message=$messageSend&token=$token";
        $messageSend = "Kde OTP Anda adalah : " . $otp->token;
        $url .= $endpoint;
        $response = Http::get($url);
        return $otp;
        // return $response;
    }
}

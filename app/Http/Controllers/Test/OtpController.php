<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Http;
use Illuminate\Http\Request;

class OtpController extends Controller
{

    public function send_otp(Request $request)
    {
        $request->validate([
            'phone' => 'phone:ID'
        ]);

        $otp = random_int(1000, 9999);

        $phone = $request->phone;

        $token = env('WHATSAPP_SENDER_TOKEN');
        $phone = $phone;
        $messageSend = "Kode OTP Anda adalah : " . $otp;
        $url = "https://pati.wablas.com/api/send-message?phone=$phone&message=$messageSend&token=$token";

        $response = Http::get($url);

        $resArray = json_decode($response, true);

        $message = $resArray['message'];

        session('phone', $phone);
        session('otp', $otp);

        return view('test.otps.validate', compact('phone', 'message'));
    }

    public function validate_otp(Request $request)
    {

        dd(session()->all(), $request->all());
    }

    private function check_phone($phone)
    {
        $token = env('WHATSAPP_SENDER_TOKEN');
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
                "url: https://pati.wablas.com",
            )
        );
        curl_setopt($curl, CURLOPT_URL,  "https://phone.wablas.com/check-phone-number?phones=$phone");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
        echo "<pre>";
        print_r($result);
    }
}

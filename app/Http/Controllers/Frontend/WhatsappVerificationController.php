<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Redeem;
use App\Models\Reward;
use App\Models\Voucher;
use Http;
use Illuminate\Http\Request;
use Seshac\Otp\Otp;


class WhatsappVerificationController extends Controller
{
    public function show(Request $request)
    {
        try {
            $otp = $this->send_otp(auth()->user()->phone);
        } catch (\Throwable $th) {
            //throw $th;
        }

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

            if ($user->isWebUser()) {
                $voucherInUser = Voucher::where('user_id', $user->id)->get();
                if (!$voucherInUser->count()) {
                    $voucher = Voucher::whereNull('given_at')->first();
                    $voucher->update([
                        'user_id' => $user->id,
                        'given_at' => now()
                    ]);
                }
            }

            if ($user->isWebQrUser()) {
                $reward_offline_id = config('greenfields.offline_reward_id');

                $rewardInUser = Redeem::where('user_id', $user->id)->where('offline_reward', $reward_offline_id)->first();
                if (!$rewardInUser->count()) {
                    $reward = Reward::find(1)->first();
                    Redeem::create([
                        'user_id' => $user->id,
                        'reward_id' => $reward->id,
                        'offline_reward' => $reward_offline_id
                    ]);
                }
            }

            return response()->json($status);
        }


    }

    protected function send_otp($phone)
    {
        $otp =  Otp::generate($phone);

        $mail = auth()->user()->sendOtpNotification($otp->token);

        $token = env('WHATSAPP_SENDER_TOKEN');
        $phone = $phone;
        $messageSend = "Kode OTP Anda adalah : " . $otp->token . "\nMohon untuk tidak membalas pesan ini.\n\n\nTerima Kasih,\nGreenfields Dairy Indonesia";
        $url = env('WHATSAPP_BASE_URL');
        $endpoint = "/api/send-message?phone=$phone&message=$messageSend&token=$token";
        $messageSend = "Kde OTP Anda adalah : " . $otp->token;
        $url .= $endpoint;
        $response = Http::get($url);
        return $otp;
        // return $response;
    }
}

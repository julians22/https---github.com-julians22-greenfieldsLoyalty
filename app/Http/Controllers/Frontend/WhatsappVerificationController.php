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
        $whatsappOtpAt = session('whatsapp_otp_at', null);
        if (is_null($whatsappOtpAt)) {
            try {
                $otp = $this->send_otp(auth()->user()->phone);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }else{
            if (now()->diffInSeconds($whatsappOtpAt) > 180) {
                try {
                    $otp = $this->send_otp(auth()->user()->phone);
                } catch (\Throwable $th) {
                    //throw $th;
                }
                request()->session()->flash('swal_success','Berhasil mengirim OTP ke nomor whatsapp & email kamu');
                return view('frontend.auth.verify-whatsapp');
            }
            request()->session()->flash('swal_warning','Mohon menunggu selama 3 menit untuk melakukan pengiriman ulang otp');
            return view('frontend.auth.verify-whatsapp');
        }

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
                $rewardInUser = Redeem::where('user_id', $user->id)->where('offline_reward', 1)->get();
                if (!$rewardInUser->count()) {
                    Redeem::create([
                        'user_id' => $user->id,
                        'reward_id' => $reward_offline_id,
                        'offline_reward' => 1,
                        'address_id' => $user->address_data->id,
                    ]);

                    $reward = Reward::where('id', $reward_offline_id)->first();
                    $reward->current_stock -= 1;
                    $reward->save();
                }
            }

            return response()->json($status);
        }


    }

    protected function send_otp($phone)
    {
        $otp =  Otp::generate($phone);


        $token = env('WHATSAPP_SENDER_TOKEN');
        $phone = $phone;
        $messageSend = "Kode OTP Anda adalah : " . $otp->token . "\nMohon untuk tidak membalas pesan ini.\n\n\nTerima Kasih,\nGreenfields Dairy Indonesia";
        $url = env('WHATSAPP_BASE_URL');
        $endpoint = "/api/send-message?phone=$phone&message=$messageSend&token=$token";
        $messageSend = "Kde OTP Anda adalah : " . $otp->token;
        $url .= $endpoint;
        $response = Http::get($url);
        $mail = auth()->user()->sendOtpNotification($otp->token);
        session(['whatsapp_otp_at' => now()]);
        return $otp;
        // return $response;
    }
}

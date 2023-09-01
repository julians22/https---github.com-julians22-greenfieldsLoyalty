<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Redeem;
use App\Models\Reward;
use App\Models\Voucher;

/**
 * Class HomeController.
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (auth()->guest() || auth()->user()->isAdmin()) {
            return view('frontend.index');
        }else{

            if (auth()->user()->isWebUser()) {
                $voucherInUser = Voucher::where('user_id', auth()->user()->id)->get();
                if (!$voucherInUser->count()) {
                    $voucher = Voucher::whereNull('given_at')->first();
                    if ($voucher) {
                        $voucher->update([
                            'user_id' => auth()->user()->id,
                            'given_at' => now()
                        ]);
                    }
                }
            }

            if (auth()->user()->isWebQrUser()) {
                if (auth()->user()->isHasAddressData()) {
                    $reward_offline_id = config('greenfields.offline_reward_id');
                    $rewardInUser = Redeem::where('user_id', auth()->user()->id)->where('offline_reward', 1)->get();
                    if (!$rewardInUser->count()) {
                        $reward = Reward::find($reward_offline_id);
                        Redeem::create([
                            'user_id' => auth()->user()->id,
                            'reward_id' => $reward->id,
                            'offline_reward' => 1,
                            'point' => 0,
                            'address_id' => auth()->user()->address_data->id,
                        ]);

                        $reward->current_stock -= 1;
                        $reward->save();
                    }
                }
            }

            return redirect()->route('frontend.user.dashboard');
        }
    }
}

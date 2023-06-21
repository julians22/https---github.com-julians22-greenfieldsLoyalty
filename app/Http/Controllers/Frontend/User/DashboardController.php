<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Redeem;
use App\Models\Reward;
use App\Models\Voucher;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (auth()->user()->isWebUser()) {
            $voucherInUser = Voucher::where('user_id', auth()->user()->id)->get();
            if (!$voucherInUser->count()) {
                $voucher = Voucher::whereNull('given_at')->first();
                $voucher->update([
                    'user_id' => auth()->user()->id,
                    'given_at' => now()
                ]);
            }
        }

        if (auth()->user()->isWebQrUser()) {
            $reward_offline_id = config('greenfields.offline_reward_id');

            $rewardInUser = Redeem::where('user_id', auth()->user()->id)->where('offline_reward', 1)->get();
            if (!$rewardInUser->count()) {
                $reward = Reward::find($reward_offline_id)->first();
                Redeem::create([
                    'user_id' => auth()->user()->id,
                    'reward_id' => $reward->id,
                    'point' => 0,
                    'address_id' => auth()->user()->address_data->id,
                    'offline_reward' => 1
                ]);
            }
        }

        $rewards = Reward::active()->latest()->take(5)->get();

        $rewardsRecommendation = Reward::active()->where('point', '<', auth()->user()->point)->take(5)->get();

        $address_data = auth()->user()->address_data;
        $addresses_data = auth()->user()->addresses_data;

        return view('frontend.user.dashboard', compact('rewards', 'rewardsRecommendation', 'address_data', 'addresses_data'));
    }
}

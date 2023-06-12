<?php

namespace App\Http\Controllers\Frontend\User;

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
        $rewards = Reward::active()->latest()->take(5)->get();

        $voucherInUser = Voucher::where('user_id', auth()->user()->id)->get();
        if (!$voucherInUser->count()) {
            $voucher = Voucher::whereNull('given_at')->first();
            $voucher->update([
                'user_id' => auth()->user()->id,
                'given_at' => now()
            ]);
        }

        return view('frontend.user.dashboard', compact('rewards'));
    }
}

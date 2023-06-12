<?php

namespace App\Http\Controllers\Frontend;

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
        if (auth()->guest()) {
            return view('frontend.index');
        }else{
            $voucherInUser = Voucher::where('user_id', auth()->user()->id)->get();
            if (!$voucherInUser->count()) {
                $voucher = Voucher::whereNull('given_at')->first();
                $voucher->update([
                    'user_id' => auth()->user()->id,
                    'given_at' => now()
                ]);
            }

            return redirect()->route('frontend.user.dashboard');
        }
    }
}

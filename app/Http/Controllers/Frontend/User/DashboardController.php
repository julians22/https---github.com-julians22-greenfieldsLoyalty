<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Reward;

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
        $rewards = Reward::where('status', 1)->latest()->take(5)->get();

        return view('frontend.user.dashboard', compact('rewards'));
    }
}

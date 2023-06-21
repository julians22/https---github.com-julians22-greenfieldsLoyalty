<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;

class RedeemController extends Controller
{

    public function index()
    {
        $rewards = Reward::active()->get();

        $rewardsRecommendation = Reward::active()->where('point', '<', auth()->user()->point)->take(5)->get();

        $address_data = auth()->user()->address_data;
        $addresses_data = auth()->user()->addresses_data;

        return view('frontend.redeem.index', compact('rewards', 'rewardsRecommendation', 'address_data', 'addresses_data'));

    }
}

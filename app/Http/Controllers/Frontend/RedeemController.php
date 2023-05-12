<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reward;
use Illuminate\Http\Request;

class RedeemController extends Controller
{

    public function index()
    {
        $rewards = Reward::where('status', 1)->get();

        if (!count($rewards)) {
            $rewards = Reward::factory()->count(7)->create();
        }

        return view('frontend.redeem.index', compact('rewards'));

    }
}

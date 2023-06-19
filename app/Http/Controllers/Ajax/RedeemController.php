<?php

namespace App\Http\Controllers\Ajax;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Models\UserAddress;
use App\Http\Controllers\Controller;
use App\Models\Redeem;
use App\Models\Reward;
use Illuminate\Http\Request;

class RedeemController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'reward_id' => 'required|exists:rewards,id',
            'address_id' => 'required',
        ]);

        if (UserAddress::where('user_id', auth()->user()->id)->where('id', $request->address_id)->doesntExist()) {
            return response()->json([
                'message' => 'Address missmatch'
            ], 400);
        }

        if (Reward::active()->where('id', $request->reward_id)->doesntExist()) {
            return response()->json([
                'message' => 'Reward missmatch or Reward Not Found'
            ], 400);
        }

        $reward = Reward::active()->where('id', $request->reward_id)->first();

        $pointNow = auth()->user()->point - $reward->point;

        if (auth()->user()->point < $reward->point ) {
            return response()->json([
                'message' => 'Point tidak cukup',
                'point' => auth()->user()->point,
                'minus' => $pointNow
            ], 200);
        }

        $redeem = Redeem::create([
            'reward_id' => $request->reward_id,
            'address_id' => $request->address_id,
            'user_id' => auth()->user()->id,
            'point' => $reward->point,
        ]);


        $user = User::where('id', auth()->user()->id)->first();

        $user->update([
            'point' => $pointNow
        ]);

        $user->save();

        $stock = $reward->current_stock - 1;

        $reward->update([
            'current_stock' => $stock
        ]);

        $reward->save();

        return response()->json([
            'message' => "Berhasil tukar hadiah",
            'redeem' => $redeem,
            'point_now' => $pointNow
        ], 200);
    }
}

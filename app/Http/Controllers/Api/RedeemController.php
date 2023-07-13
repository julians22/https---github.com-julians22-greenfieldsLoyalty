<?php

namespace App\Http\Controllers\Api;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RedeemResource;
use App\Models\Redeem;
use App\Models\Reward;
use DB;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class RedeemController extends Controller
{
    public function index(Request $request) {
        validator($request->all(), [
            'count' => 'sometimes|numeric',
            'phone' => 'required'
        ])->validate();

        $phone = PhoneNumber::make($request->phone, 'ID');

        $userExist = User::where('phone', $phone)->exists();

        if (!$userExist) {
            return response()->json([
                'status' => false,
                'message' => 'Pengguna tidak ditemukan'
            ], 404);
        }

        $user = User::where('phone', $phone)->first();

        $count = 10;

        if ($request->count) {
            $count = (int)$request->count;
        }

        $redeems = Redeem::where('user_id', $user->id)->take($count)->get();

        return response()->json([
            'status' => true,
            'redeems' => RedeemResource::collection($redeems)
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            'reward_id' => 'required|exists:rewards,id|numeric',
            'phone' => 'required'
        ]);

        $phone = PhoneNumber::make($request->phone, 'ID');

        $userExist = User::where('phone', $phone)->exists();

        if (!$userExist) {
            return response()->json([
                'status' => false,
                'message' => 'Pengguna tidak ditemukan'
            ], 404);
        }

        $user = User::where('phone', $phone)->first();

        if (!$user->address_data) {
            return response()->json([
                'message' => 'Address missmatch, complete your address first'
            ], 400);
        }

        $reward = Reward::active()->where('id', $request->reward_id)->first();

        if (!$reward) {
            return response()->json([
                'message' => 'Reward not found'
            ], 400);
        }

        $pointNow = $user->point - $reward->point;

        if ($user->point < $reward->point ) {
            return response()->json([
                'message' => 'Point tidak cukup',
                'point' => $user->point,
                'minus' => $pointNow
            ], 200);
        }

        try {

            DB::beginTransaction();

            $redeem = Redeem::create([
                'reward_id' => $request->reward_id,
                'address_id' => $user->address_data->id,
                'user_id' => $user->id,
                'point' => $reward->point,
                'channel' => Redeem::CHANNEL_WHATSAPP
            ]);

            $user = User::where('id', $user->id)->first();

            $user->update([
                'point' => $pointNow
            ]);

            $user->save();

            $stock = $reward->current_stock - 1;

            $reward->update([
                'current_stock' => $stock
            ]);

            $reward->save();
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }

        DB::commit();

        return response()->json([
            'status' => true,
            'message' => "Berhasil tukar hadiah",
            'redeem' => $redeem,
            'point_now' => $pointNow
        ], 200);
    }
}

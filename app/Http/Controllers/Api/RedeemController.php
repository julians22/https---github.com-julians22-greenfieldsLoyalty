<?php

namespace App\Http\Controllers\Api;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\RedeemResource;
use App\Models\Redeem;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class RedeemController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'count' => 'sometimes|integer',
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
}

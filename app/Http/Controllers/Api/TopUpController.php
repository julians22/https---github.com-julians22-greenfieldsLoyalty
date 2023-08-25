<?php

namespace App\Http\Controllers\Api;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\Api\TopupCollection;
use App\Http\Resources\Api\TopupResource;
use App\Models\TopUp;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class TopUpController extends Controller
{
    public function upload(Request $request) {
        $request->validate([
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
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

        // $waitingTopUp = TopUp::where('user_id', $user->id)->where('status', TopUp::STATUS_CREATED)->orWhere('status', TopUp::STATUS_PROCESS)->get();

        // if ($waitingTopUp->count()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Pengguna memiliki permintaan top up yang belum terselesaikan silahkan menunggu hingga proses topup sebelumnya selesai.',
        //     ], 419);
        // }

        $imagePath = "uploads/receipt/";
        $imageName = 'WA'.time().'.'.$request->receipt->extension();

        $request->receipt->move(public_path($imagePath), $imageName);

        $topup = TopUp::create([
            'user_id' => $user->id,
            'filepath' => $imagePath.$imageName,
            'point' => 0,
            'channel' => TopUp::CHANNEL_WHATSAPP
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan topup'
        ]);
    }

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

        $topups = TopUp::where('user_id', $user->id)->take($count)->get();

        return response()->json([
            'status' => true,
            'topups' => TopupResource::collection($topups)
        ]);
    }
}

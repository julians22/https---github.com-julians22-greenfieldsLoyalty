<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TopUp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TopupController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $waitiingTopUp = TopUp::where('user_id', auth()->user()->id)->where('status', TopUp::STATUS_CREATED)->where('status', TopUp::STATUS_PROCESS)->get();

        if ($waitiingTopUp->count()) {
            return redirect()->route('frontend.user.account')->withSwalWarning('Mohon maaf, bunda masih ada permintaan top up yang belum terselesaikan silahkan menunggu hingga proses topup sebelumnya selesai.');
        }

        $imagePath = "uploads/receipt/";
        $imageName = time().'.'.$request->receipt->extension();

        $request->receipt->move(public_path($imagePath), $imageName);

        TopUp::create([
            'user_id' => auth()->user()->id,
            'filepath' => $imagePath.$imageName,
            'point' => 0
        ]);

        return redirect()->route('frontend.user.account')->withSwalSuccess('Selamat, Ibu Extra! Kamu berhasil melakukan upload struk. Mohon menunggu 3x24 jam untuk update poin ya.');

    }
}

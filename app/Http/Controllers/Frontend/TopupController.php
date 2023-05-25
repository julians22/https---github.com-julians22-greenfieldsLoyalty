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

        $imagePath = "uploads/receipt/";
        $imageName = time().'.'.$request->receipt->extension();

        $request->receipt->move(public_path($imagePath), $imageName);

        $topup = TopUp::create([
            'user_id' => auth()->user()->id,
            'filepath' => $imagePath.$imageName,
            'point' => 0
        ]);

        return redirect()->route('frontend.user.account')->withSwalSuccess('Selamat bunda telah berhasil mengupload struk, setelah ini tim greenfields akan memproses akumulasi poin terlebih dahulu.');

    }
}

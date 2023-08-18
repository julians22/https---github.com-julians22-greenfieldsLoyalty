<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\TopUp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;

class TopupController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            // 'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ]);

        $waitiingTopUp = TopUp::where('user_id', auth()->user()->id)->where('status', TopUp::STATUS_CREATED)->where('status', TopUp::STATUS_PROCESS)->get();

        if ($waitiingTopUp->count()) {
            return redirect()->route('frontend.user.account')->withSwalWarning('Mohon maaf, bunda masih ada permintaan top up yang belum terselesaikan silahkan menunggu hingga proses topup sebelumnya selesai.');
        }

        $image_resize = $this->imageStore($request);

        TopUp::create([
            'user_id' => auth()->user()->id,
            'filepath' => $image_resize,
            'point' => 0
        ]);

        return redirect()->route('frontend.user.account')->withSwalSuccess('Selamat, Ibu Extra! Kamu berhasil melakukan upload struk. Mohon menunggu 3x24 jam untuk update poin ya.');

    }

    private function imageStore(Request $request){
        $imagePath = "uploads/receipt/";
        $imageName = time().'.'.$request->receipt->extension();

        $image       = $request->file('receipt');
        $file_name    = $imageName;
        $image_resize = Image::make($image->getRealPath());

        $image_resize->resize(800, null, function ($constraint){
            $constraint->aspectRatio();
        });

        $image_resize->save(public_path($imagePath . $file_name));

        // $request->receipt->move(public_path($imagePath), $imageName);

        return $imagePath . $file_name;
    }
}

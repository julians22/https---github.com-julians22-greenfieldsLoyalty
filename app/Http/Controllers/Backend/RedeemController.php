<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Redeem;
use Illuminate\Http\Request;

class RedeemController extends Controller
{
    public function index()
    {
        return view('backend.redeems.index');
    }

    public function show(Redeem $redeem)
    {
        return view('backend.redeems.show')
            ->with('redeem', $redeem);
    }

    public function edit(Request $request, Redeem $redeem)
    {
        $couriers = config('greenfields.courier');

        return view('backend.redeems.edit')
            ->with('couriers', $couriers)
            ->with('redeem', $redeem);

    }

    public function reject (Request $request, Redeem $redeem)
    {
        $redeem->update([
            'status' => Redeem::STATUS_FAILED,
            'success_at' => NULL,
            'failed_at' => now(),
            'failed_reason' => $request->failed_reason ?? null
        ]);

        return redirect()->route('admin.redeem.show', ['redeem' => $redeem])->withFlashSuccess('Redeem Rejected');
    }

    public function send(Request $request, Redeem $redeem)
    {
        $request->validate([
            'courier' => 'required',
            'airwaybill' => 'required'
        ]);

        $redeem->update([
            'status' => Redeem::STATUS_SEND,
            'send_at' => now(),
            'courier' => $request->courier,
            'airwaybill' => $request->airwaybill
        ]);

        $redeem->save();

        return redirect()->route('admin.redeem.show', ['redeem' => $redeem]);
    }

    public function accept()
    {
        return redirect()->route('admin.redeem.index');
    }
}

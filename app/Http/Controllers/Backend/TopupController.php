<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Topups\AcceptTopupRequest;
use App\Http\Requests\Backend\Topups\RejectTopupRequest;
use App\Models\TopUp;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        return view('backend.topups.index');
    }

    public function show(TopUp $topUp)
    {
        return view('backend.topups.show')
            ->with('topup', $topUp);
    }

    public function edit(Request $request, TopUp $topUp)
    {
        return view('backend.topups.edit')
            ->with('topup', $topUp);
    }

    public function accept(AcceptTopupRequest $request, TopUp $topUp)
    {
        $topUp->update([
            'point' => $request->point,
            'status' => TopUp::STATUS_SUCCESS,
            'success_at' => now(),
            'note' => $request->note ?? null
        ]);

        $topUp->user()->update([
            'point' => $topUp->user->point + $request->point
        ]);

        return redirect()->route('admin.topup.show')->withFlashSuccess('Topup finished');
    }

    public function reject (RejectTopupRequest $request, TopUp $topUp)
    {
        $topUp->update([
            'status' => TopUp::STATUS_FAILED,
            'success_at' => NULL,
            'failed_at' => now(),
            'failed_reason' => $request->failed_reason ?? null
        ]);

        return redirect()->route('admin.topup.show')->withFlashSuccess('Topup Rejected');
    }
}

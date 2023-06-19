<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Topups\AcceptTopupRequest;
use App\Http\Requests\Backend\Topups\RejectTopupRequest;
use App\Models\TopUp as Topup;
use Illuminate\Http\Request;

class TopupController extends Controller
{
    public function index()
    {
        return view('backend.topups.index');
    }

    public function show(Topup $topup)
    {
        return view('backend.topups.show')
            ->with('topup', $topup);
    }

    public function edit(Request $request, Topup $topup)
    {
        $template = config('greenfields.sku.template');
        return view('backend.topups.edit')
            ->with('topup', $topup)
            ->with('template', $template);

    }

    public function accept(AcceptTopupRequest $request, Topup $topup)
    {
        $topup->update([
            'point' => $request->point,
            'status' => Topup::STATUS_SUCCESS,
            'success_at' => now(),
            'note' => $request->note ?? null
        ]);

        $topup->user()->update([
            'point' => $topup->user->point + $request->point
        ]);

        return redirect()->route('admin.topup.show', ['topup' => $topup])->withFlashSuccess('Topup finished');
    }

    public function reject (RejectTopupRequest $request, Topup $topup)
    {
        $topup->update([
            'status' => Topup::STATUS_FAILED,
            'success_at' => NULL,
            'failed_at' => now(),
            'failed_reason' => $request->failed_reason ?? null
        ]);

        return redirect()->route('admin.topup.show', ['topup' => $topup])->withFlashSuccess('Topup Rejected');
    }
}

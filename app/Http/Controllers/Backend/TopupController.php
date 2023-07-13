<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Topups\AcceptTopupRequest;
use App\Http\Requests\Backend\Topups\ModifyTopUpRequest;
use App\Http\Requests\Backend\Topups\RejectTopupRequest;
use App\Models\TopUp as Topup;
use DB;
use Illuminate\Http\Request;
use Indonesia;

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

    public function modify(Request $request, Topup $topup) {
        if ($topup->isFailed()) {
            return redirect()->route('admin.topup.show', ['topup' => $topup])->withFlashWarning('You cant modify rejected topup data');
        }
        $template = config('greenfields.sku.template');
        $packsizes = config('greenfields.sku.packsize');
        $flavours = config('greenfields.sku.flavour');
        $categories = config('greenfields.sku.categories');
        $channels = config('greenfields.sku.channel');

        $provinces = Indonesia::allProvinces();

        return view('backend.topups.edit')
            ->with('topup', $topup)
            ->with('provinces', $provinces)
            ->with('packsizes', $packsizes)
            ->with('categories', $categories)
            ->with('flavours', $flavours)
            ->with('channels', $channels)
            ->with('template', $template);
    }

    public function edit(Request $request, Topup $topup)
    {
        if ($topup->isFailed() || $topup->isCompleted()) {
            return redirect()->route('admin.topup.modify', ['topup' => $topup]);
        }
        $template = config('greenfields.sku.template');
        $packsizes = config('greenfields.sku.packsize');
        $flavours = config('greenfields.sku.flavour');
        $categories = config('greenfields.sku.categories');
        $channels = config('greenfields.sku.channel');

        $provinces = Indonesia::allProvinces();

        return view('backend.topups.edit')
            ->with('topup', $topup)
            ->with('provinces', $provinces)
            ->with('packsizes', $packsizes)
            ->with('categories', $categories)
            ->with('flavours', $flavours)
            ->with('channels', $channels)
            ->with('template', $template);
    }

    public function update(ModifyTopUpRequest $request, Topup $topup) {
        $channelSources = config('greenfields.sku.channel');

        $channel = null;

        foreach ($channelSources as $key => $value) {
            foreach ($value as $item) {
                if ($request->receipt_channel == $item) {
                    $channel = $key;
                }
            }
        }

        if (empty($channel)) {
            return redirect()->back()->withFlashDanger('Kesalahan pada masukan channel struk');
        }

        $details = [];
        foreach ($request->details as $key => $value) {
            $discount = $value['discount'] ?? 0;
            $total = $value['total'] ?? 0;
            array_push($details, [
                "product" => $value['product'],
                "packsize" => $value['packsize'],
                "qty" => $value['qty'],
                "flavour" => $value['flavour'],
                "price" => $value['price'] ?? 0,
                "dicount_price" => $discount,
                "total" => $total
            ]);
        }

        DB::beginTransaction();

        try {
            $topup->update([
                'status' => Topup::STATUS_SUCCESS,
                'note' => $request->note ?? null,
                'receipt_date' => $request->receipt_date,
                'receipt_number' => $request->receipt_number,
                'receipt_channel' => $channel,
                'receipt_subchannel' => $request->receipt_channel,
                'receipt_area' => $request->receipt_area,
                'receipt_storename' => $request->receipt_storename,
            ]);
            $topup->details()->delete();
            $topup->details()->createMany($details);


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withFlashDanger($th->getMessage());
        }

        DB::commit();

        return redirect()->route('admin.topup.show', ['topup' => $topup])->withFlashSuccess('Topup updated');
    }

    public function accept(AcceptTopupRequest $request, Topup $topup)
    {
        $channelSources = config('greenfields.sku.channel');

        $channel = null;

        foreach ($channelSources as $key => $value) {
            foreach ($value as $item) {
                if ($request->receipt_channel == $item) {
                    $channel = $key;
                }
            }
        }

        if (empty($channel)) {
            return redirect()->back()->withFlashDanger('Kesalahan pada masukan channel struk');
        }

        $details = [];
        foreach ($request->details as $key => $value) {
            $discount = $value['discount'] ?? 0;
            $total = $value['total'] ?? 0;
            array_push($details, [
                "product" => $value['product'],
                "packsize" => $value['packsize'],
                "qty" => $value['qty'],
                "flavour" => $value['flavour'],
                "price" => $value['price'] ?? 0,
                "dicount_price" => $discount,
                "total" => $total
            ]);
        }

        DB::beginTransaction();

        try {
            $topup->update([
                'point' => $request->point,
                'status' => Topup::STATUS_SUCCESS,
                'success_at' => now(),
                'note' => $request->note ?? null,
                'receipt_date' => $request->receipt_date,
                'receipt_number' => $request->receipt_number,
                'receipt_channel' => $channel,
                'receipt_subchannel' => $request->receipt_channel,
                'receipt_area' => $request->receipt_area,
                'receipt_storename' => $request->receipt_storename,
            ]);

            $topup->details()->createMany($details);


        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->withFlashDanger($th->getMessage());
        }

        $topup->user()->update([
            'point' => $topup->user->point + $request->point
        ]);

        DB::commit();

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

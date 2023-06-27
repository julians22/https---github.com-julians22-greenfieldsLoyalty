<?php

namespace App\Http\Livewire\Backend;

use App\Imports\SyncRedeemImport;
use App\Models\Redeem;
use DB;
use Excel;
use Livewire\Component;
use Livewire\WithFileUploads;

class BulkRewardSyncComponent extends Component
{
    use WithFileUploads;

    public $file;
    public $courier = 'RPX';

    public string $fileName = "";

    public array $couriers = [];

    public function mount() {
        $couriers = config('greenfields.courier');
        $this->couriers = $couriers;
    }

    public function render()
    {
        return view('livewire.backend.bulk-reward-sync-component');
    }

    public function submitSyncFile() {
        $redeemsRaw = Excel::toArray(new SyncRedeemImport, $this->file);
        $redeems = $redeemsRaw[0];

        DB::beginTransaction();

        foreach ($redeems as $redeem) {
            if (empty($redeem['transaction_code'])) continue;
            if (empty($redeem['status']) || !$this->statusIsValid($redeem['status'])) continue;

            $data = [
                'status' => $redeem['status'] == 'send' ? $redeem['status'] : 'failed',
                'airwaybill' => $redeem['airwaybill_number'],
                'failed_reason' => $redeem['status'] == 'delay' ? $redeem['delay_reason'] : null,
                'courier' => $this->courier
            ];

            if ($redeem['status'] == 'send') {
                $data['send_at'] = now();
            }

            if ($redeem['status'] == 'delay') {
                $data['failed_at'] = now();
            }

            try {
                $redeem = Redeem::code($redeem['transaction_code'])->first();
                $redeem->update($data);
            } catch (\Throwable $th) {
                DB::rollBack();
            }

        }
        DB::commit();

        $this->reset('file', 'fileName');
        $this->emitTo('backend.bulk-redeems-table', 'refreshData');
    }

    private function statusIsValid($status = null) {
        if (!empty($status) && ($status == 'send' || $status == 'delay')) {
            return true;
        }

        return false;
    }

    public function updatedFile()
    {
        $this->validate([
            'file' => 'required|file|max:5120|mimes:xlsx', // 5MB Max
        ]);

        $this->fileName = $this->file->getClientOriginalName();
    }

    public function removeFile() {
        $this->reset('file', 'fileName');
    }
}

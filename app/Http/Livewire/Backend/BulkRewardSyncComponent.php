<?php

namespace App\Http\Livewire\Backend;

use App\Imports\SyncRedeemImport;
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
        Excel::import(new SyncRedeemImport, $this->file);
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

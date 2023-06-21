<?php

namespace App\Http\Livewire\Backend\Utils;

use Livewire\Component;

class ExportButtonComponent extends Component
{

    public $target = null;
    public $eventName = null;

    public function mount($to, $event) {
        $this->target = $to;
        $this->eventName = $event;
    }

    public function render()
    {
        return view('livewire.backend.utils.export-button-component');
    }
}

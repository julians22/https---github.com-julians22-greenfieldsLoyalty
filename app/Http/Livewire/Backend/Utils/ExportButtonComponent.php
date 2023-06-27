<?php

namespace App\Http\Livewire\Backend\Utils;

use Livewire\Component;

class ExportButtonComponent extends Component
{

    public $target = null;
    public $eventName = null;
    public $text = null;

    public function mount($to, $event, $text = null) {
        $this->target = $to;
        $this->eventName = $event;
        $this->text = $text;
    }

    public function render()
    {
        return view('livewire.backend.utils.export-button-component');
    }
}

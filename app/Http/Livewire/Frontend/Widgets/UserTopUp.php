<?php

namespace App\Http\Livewire\Frontend\Widgets;

use App\Models\TopUp;
use Livewire\Component;

class UserTopUp extends Component
{
    public int $successTopupTotal = 0;
    public int $successTopupCount = 0;
    public int $failedTopupCount = 0;

    public function mount(){
        $user_id = auth()->user()->id;
        // get total top up success and failed from user wallet transactions table.
        $topups = TopUp::where('user_id', $user_id)->get();
        foreach ($topups as $topup) {
            if ($topup->isCompleted()) {
                ++$this->successTopupCount;
                ++$this->successTopupTotal;
            }

            if ($topup->isFailed()) {
                ++$this->failedTopupCount;
                ++$this->successTopupTotal;
            }
        }
    }


    public function render()
    {
        return view('livewire.frontend.widgets.user-top-up');
    }
}

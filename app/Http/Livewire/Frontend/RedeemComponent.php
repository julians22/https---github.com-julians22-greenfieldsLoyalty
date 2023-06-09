<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Reward;
use Illuminate\Support\Collection;
use Livewire\Component;

class RedeemComponent extends Component
{
    public Collection $rewards;

    public string $keyword = "";

    public string $range_point = "";

    public array $pointRangesData = [
        "0-20000" => [
            "min" => 0,
            "max" => 20000
        ],
        "20001-50000" => [
                "min" => 20001,
                "max" => 50000
        ],
        "50001-100000" => [
            "min" => 50001,
            "max" => 100000
        ],
        "100001-max" => [
            "min" => 100001,
            "max" => null
        ],
    ];

    protected $queryString = [
        'keyword' => ['except' => ''],
        'range_point' => ['except' => ''],
    ];

    public function mount()
    {
        $this->rewards = Reward::active()->get();
    }

    public function updatedKeyword($value)
    {
        $this->rewards = Reward::active()->where('name', 'LIKE', "%$value%")->get();
    }

    public function updatedRangePoint($value)
    {
        $ranges = $this->pointRangesData[$value];

        if ($value == "100001-max") {
            $this->rewards = Reward::active()->where('point', ">=", $ranges["min"])->get();
        }else{
            $this->rewards = Reward::active()->whereBetween('point', [$ranges["min"], $ranges["max"]])->get();
        }
    }

    public function render()
    {
        return view('livewire.frontend.redeem-component');
    }

    public function resetFilters()
    {
        $this->reset(['keyword', 'range_point']);

        $this->rewards = Reward::active()->get();
    }
}

<?php

namespace App\Http\Livewire;

use App\Domains\Auth\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MemberChart extends Component
{
    public $bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
    public $data = [];
    public $persen = [];
    public $totalPerYear;
    public $averagePerMonth;
    public $averagePerDay;

    public function mount()
    {
       
        $currentYear = date('Y');

      
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTH(created_at) as month"))
            ->whereYear('created_at', $currentYear)
            ->groupBy(DB::raw("MONTH(created_at)"))
            ->pluck('count', 'month');

        foreach ($this->bulan as $key => $month) {
            $this->data[$key] = $users->get($key + 1, 0);
        }

       
        $this->totalPerYear = array_sum($this->data);

        
        $this->averagePerMonth = round($this->totalPerYear / count($this->data), 2);

       
        $this->averagePerDay = round($this->totalPerYear / (count($this->data) * 30), 2);
    }

    
    public function render()
    {
        return view('livewire.member-chart');
    }
}

<?php

namespace App\Http\Livewire\Frontend;

use App\Domains\Auth\Models\UserAddress;
use Livewire\Component;

class AddressSelectorComponent extends Component
{
    public $addresses_data = null;

    public $show_address_selector = false;

    public function showAddressSelector($status = false)
    {
        $this->show_address_selector = $status;
    }

    public function mount()
    {
        $this->setAddressData();
    }

    public function render()
    {
        return view('livewire.frontend.address-selector-component');
    }

    public function checkAddress($id)
    {

        UserAddress::where('user_id', auth()->user()->id)->update([
            'is_primary' => 0
        ]);

        UserAddress::find($id)->update([
            'is_primary' => 1
        ]);

        // $address_data = UserAddress::find($id);

        // $this->dispatchBrowserEvent('address-changed', ['id' => $id, 'address' => $address_data]);
        $this->setAddressData();
    }

    private function setAddressData()
    {
        $this->addresses_data = UserAddress::where('user_id', auth()->user()->id)->get();

        // return $addresses_data;
    }
}

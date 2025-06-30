<?php

namespace App\Livewire;

use App\Models\Address;
use Livewire\Component;

class Checkoutaddress extends Component
{
    public $addresses;
    public $addressId = null;
        
    public $receiver_name, $phone_number, $province, $city, $postal_code, $detail;


    public function mount()
    {
        $this->loadAddresses();
    }

    public function loadAddresses()
    {
        $this->addresses = auth()->user()->addresses()->latest()->get();
    }

     public function edit($id)
    {
        $address = Address::findOrFail($id);
        $this->addressId = $id;

        $this->receiver_name = $address->receiver_name;
        $this->phone_number = $address->phone_number;
        $this->province = $address->province;
        $this->city = $address->city;
        $this->postal_code = $address->postal_code;
        $this->detail = $address->detail;
    }


    public function render()
    {
        return view('livewire.checkoutaddress');
    }
}

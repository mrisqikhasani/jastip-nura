<?php

namespace App\Livewire;

use App\Models\Address;
use Auth;
use Livewire\Component;

class AddressForm extends Component
{

    public $address;
    public $address_id = null;

    protected $listeners = ['deleteAddress'];

    public $receiver_name, $phone_number, $province, $city, $postal_code, $detail;

    protected $rules = [
        'receiver_name' => 'required|string',
        'phone_number' => 'required|string',
        'province' => 'required|string',
        'city' => 'required|string',
        'postal_code' => 'required|string',
        'detail' => 'required|string',
    ];

    public function mount()
    {
        $this->refreshAddresses();
    }

    public function refreshAddresses()
    {
        $this->address = Auth::user()->fresh()->address;
    }

    public function fillForm($id)
    {
        $address = $this->address->find($id);

        if ($address && $address->user_id == Auth::id()) {
            $this->address_id = $address->id;
            $this->receiver_name = $address->receiver_name;
            $this->phone_number = $address->phone_number;
            $this->province = $address->province;
            $this->city = $address->city;
            $this->postal_code = $address->postal_code;
            $this->detail = $address->detail;
        }
    }

    public function resetForm()
    {
        $this->reset([
            'address_id',
            'receiver_name',
            'phone_number',
            'province',
            'city',
            'postal_code',
            'detail'
        ]);
    }

    public function save()
    {
        $this->validate();

        if ($this->address_id) {
            $address = Address::find($this->address_id);

            if ($address && $address->user_id === Auth::id()) {
                $address->update($this->only(['receiver_name', 'phone_number', 'province', 'city', 'postal_code', 'detail']));
                session()->flash('success', 'Alamat berhasil diperbarui.');
            }
        } else {
            Address::create(array_merge($this->only([
                'receiver_name',
                'phone_number',
                'province',
                'city',
                'postal_code',
                'detail'
            ]), [
                'user_id' => Auth::id(),
            ]));

            session()->flash('success', 'Alamat berhasil ditambahkan.');
        }

        $this->resetForm();
        $this->refreshAddresses();
    }

    public function deleteAddress($id)
{
    $address = Address::find($id);

    if ($address && $address->user_id === Auth::id()) {
        $address->delete();
        session()->flash('success', 'Alamat berhasil dihapus.');

        // Jika alamat yang dihapus sedang diedit, reset form
        if ($this->address_id == $id) {
            $this->resetForm();
        }

        $this->refreshAddresses();
    }
}

    public function render()
    {
        return view('livewire.address-form');
    }
}

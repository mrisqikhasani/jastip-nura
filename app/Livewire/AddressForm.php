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

    public $nama_penerima, $nomor_telepon, $provinsi, $kota, $kode_pos, $detail_alamat;

    protected $rules = [
        'nama_penerima' => 'required|string',
        'nomor_telepon' => 'required|string',
        'provinsi' => 'required|string',
        'kota' => 'required|string',
        'kode_pos' => 'required|string|max:5',
        'detail_alamat' => 'required|string',
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

        if ($address && $address->id_pengguna == Auth::id()) {
            $this->address_id = $address->id_alamat;
            $this->nama_penerima = $address->nama_penerima;
            $this->nomor_telepon = $address->nomor_telepon;
            $this->provinsi = $address->provinsi;
            $this->kota = $address->kota;
            $this->kode_pos = $address->kode_pos;
            $this->detail_alamat = $address->detail_alamat;
        }
    }

    public function resetForm()
    {
        $this->reset([
            'address_id',
            'nama_penerima',
            'nomor_telepon',
            'provinsi',
            'kota',
            'kode_pos',
            'detail_alamat',
        ]);
    }

    public function save()
    {
        $this->validate();

        if ($this->address_id) {
            $address = Address::find($this->address_id);

            if ($address && $address->id_pengguna === Auth::id()) {
                $address->update($this->only([
                    'nama_penerima',
                    'nomor_telepon',
                    'provinsi',
                    'kota',
                    'kode_pos',
                    'detail_alamat'
                ]));
                session()->flash('success', 'Alamat berhasil diperbarui.');
            }
        } else {
            Address::create(array_merge($this->only([
                'nama_penerima',
                'nomor_telepon',
                'provinsi',
                'kota',
                'kode_pos',
                'detail_alamat'
            ]), [
                'id_pengguna' => Auth::id(),
            ]));

            session()->flash('success', 'Alamat berhasil ditambahkan.');
        }

        $this->resetForm();
        $this->refreshAddresses();
    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);

        if ($address && $address->id_pengguna === Auth::id()) {
            $address->delete();
            session()->flash('success', 'Alamat berhasil dihapus.');

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


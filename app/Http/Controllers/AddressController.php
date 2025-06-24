<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    public function addressUser(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user()->load('addresses');
        $addressId = $request->query('id');
        $address = $addressId ? $user->addresses->find($addressId) : null;

        return view('profile.address', compact('user', 'address'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $addressData = $request->validate([
            'receiver_name' => 'string',
            'phone_number' => 'string',
            'province' => 'string',
            'city' => 'string',
            'postal_code' => 'string',
            'detail' => 'string',
        ]);

        try {
            Address::create(array_merge($addressData, [
                'user_id' => Auth::id(),
            ]));
            return redirect()->back()->with('success', 'Alamat berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Address Store Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal menambahkan alamat.');
        }
    }

    public function update(Request $request, Address $address)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if ($address->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $addressData = $request->validate([
            'receiver_name' => 'required|string',
            'phone_number' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'detail' => 'required|string',
        ]);

        try {
            $address->update($addressData);
            return redirect()->back()->with('success', 'Alamat berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Address Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui alamat.');
        }
    }
}

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

        $user = Auth::user()->load('address');
        $addressId = $request->query('id');
        $address = $addressId ? $user->address->find($addressId) : null;

        return view('profile.address', compact('user', 'address'));
    }
}

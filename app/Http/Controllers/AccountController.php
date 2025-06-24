<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Kirim ke view
        return view('profile.account', compact('user'));
    }


    public function profileForm()
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        return view('profile.accountform', compact('user'));
    }

    public function profileFormUpdate(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string'
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone_number = $validated['phone_number'];

        $user->save();

        return redirect('/account/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function profileAvatarUpdate(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'profile_picture' => 'image|max:2048',
        ]);

        $avatarPath = $request->file('profile_picture')->store('profile', 'public');

        auth()->user()->update(['profile_picture' => $avatarPath]);


        return back()->with('success', 'Profile updated!');

    }
}

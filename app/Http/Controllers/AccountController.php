<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;


class AccountController extends Controller
{
    public function profile()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();

        $lastOrder = Order::with(['orderLineItems.product'])
            ->where('id_pelanggan', $user->id)
            ->orderBy('dibuat_saat', 'desc')
            ->first();

        $shippingAddress = $user->address()->first();


        return view('profile.account', compact('user', 'lastOrder', 'shippingAddress'));
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
            'nama_lengkap' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nomor_telepon' => 'nullable|string'
        ]);

        $user->nama = $validated['nama_lengkap'];
        $user->email = $validated['email'];
        $user->nomor_telepon = $validated['nomor_telepon'];

        $user->save();

        return redirect('/account/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function profileAvatarUpdate(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'foto_profil' => 'image|max:2048',
        ]);

        try {
            $user = Auth::user();

            // Hapus file lama jika ada
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            // Simpan file baru
            $avatarPath = $request->file('foto_profil')->store('profile', 'public');

            // Update profil user
            $user->update([
                'foto_profil' => $avatarPath,
            ]);

            return back()->with('success', 'Foto profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return back()->withErrors([
                'upload_error' => 'Gagal memperbarui foto profil: ' . $e->getMessage(),
            ]);
        }
    }

    public function changePasswordForm()
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user();


        return view('profile.changepassword', compact('user'));
    }


    public function changePasswordUpdate(Request $request)
    {
        // Pastikan user login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'string', 'min:5', 'confirmed'],
        ], [
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok.',
        ]);

        $user = Auth::user();

        // Cek current password dengan hash bawaan
        if (!Hash::check($validated['current_password'], (string) $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.'])->withInput();
        }

        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);


        return redirect('/account/change-password')->with('success', 'Password berhasil diubah.');
    }
}

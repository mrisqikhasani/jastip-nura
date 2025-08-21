<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Models\User;
use Password;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    // proses login
    public function login(Request $request)
    {
        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin'); 
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau Password Salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function showSignupForm()
    {
        return view('auth.signup');
    }


    public function signup(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'nomor_telepon' => 'nullable|string|max:20',
            'password' => 'string|min:5|required_with:confirmpassword|same:confirmpassword',
            'confirmpassword' => 'required|string|min:5',
        ], [
            'password.min' => 'Password harus memiliki minimal 5 karakter',
            'nama_lengkap.required' => 'Nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.same' => 'Password tidak match',
            'confirmpassword.required' => 'Konfirmasi password harap di isi'
        ]);

        try {
            $user = User::create([
                'nama_lengkap' => $validated['nama_lengkap'],
                'email' => $validated['email'],
                'nomor_telepon' => $validated['nomor_telepon'] ?? null,
                'password' => Hash::make($validated['password']),
                'peran' => 'pelanggan',
            ]);

            Auth::login($user);
            return redirect('/');
        } catch (\Exception $e) {
            return back()
                ->withErrors(['register' => 'Terjadi kesalahan saat mendaftar.Silahkan coba lagi '])
                ->withInput()
                ->with('blade', value: $e->getMessage());
        }
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}

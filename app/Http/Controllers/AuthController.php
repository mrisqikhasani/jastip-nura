<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;

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

        if(Auth::attempt($credential)){
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->intended('/admin'); // ⬅️ langsung ke panel admin
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
            'name' => 'required|string|max:255',
            'email'=> 'required|string|email|max:255|',
            'phone_number' => 'nullable|string|max:20',
            'password' => 'required|string|min:5',
        ],[
            'password.min' => 'Password harus memiliki minimal 5 karakter',
        ]);

        try {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'] ?? null,
                'password' => Hash::make($validated['password']),
                'role' => 'user',
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
}

@extends('layouts.app')

@section('content')
    <!-- Kartu Masuk Akun -->
    <section class="mx-auto flex-grow w-full mt-10 mb-10 max-w-[1200px] px-5">
        <div class="container mx-auto border px-10 py-10 rounded-2xl shadow-lg md:w-1/2 bg-white">
            <div class="mb-6">
                <p class="text-4xl font-bold text-gray-800">Login</p>
                <p class="text-gray-500">Selamat datang kembali! Silakan login ke akun Anda.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form class="mt-6 flex flex-col" method="POST" action="/login">
                @csrf

                <label for="email" class="text-gray-700 font-medium">Alamat Email</label>
                <input class="mb-4 mt-2 border px-4 py-2 rounded-lg" type="email" name="email" id="email"
                    placeholder="email@contoh.com" value="{{ old('email') }}" required autofocus />

                <label for="password" class="text-gray-700 font-medium">Kata Sandi</label>
                <input class="mt-2 border px-4 py-2 rounded-lg" type="password" name="password" id="password"
                    placeholder="********" required />

                <button type="submit"
                    class="my-6 w-full bg-violet-900 hover:bg-violet-700 py-2 text-white font-semibold rounded-lg transition">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ url('/signup') }}" class="text-violet-900 hover:underline font-medium">Daftar Sekarang</a>
            </p>
        </div>
    </section>
@endsection
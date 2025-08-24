@extends('layouts.app')

@section('content')
    <!-- Kartu Daftar Akun -->
    <section class="mx-auto mt-10 w-full flex-grow mb-10 max-w-[1200px] px-5">
        <div class="container mx-auto border px-10 py-10 rounded-lg shadow-sm md:w-1/2">
            <div class="mb-6">
                <p class="text-4xl font-bold mb-2 text-gray-700">Daftar Akun Baru</p>
                <p class="text-gray-500">Silakan isi formulir di bawah ini untuk membuat akun Anda.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form class="mt-6 flex flex-col" method="POST" action="/signup">
                @csrf

                <label for="name" class="font-medium">Nama Lengkap</label>
                <input class="mt-2 border px-4 py-2 rounded-lg" type="text" name="nama_lengkap"
                    placeholder="Contoh: Ahmad Fadli" />
                <label class="mt-3 font-medium" for="email">Alamat Email</label>
                <input class="mt-2 border px-4 py-2 rounded-lg" type="email" name="email" placeholder="email@contoh.com" />

                <label class="mt-3 font-medium" for="phone_number">Nomor Telepon</label>
                <input class="mt-2 border px-4 py-2 rounded-lg" type="text" name="nomor_telepon" placeholder="08xxxxxxxxxx" />

                <label class="mt-5 font-medium" for="password">Kata Sandi</label>
                <input class="mt-2 border px-4 py-2 rounded-lg" type="password" placeholder="********" name="password" />

                <label class="mt-5 font-medium" for="confirmpassword">Konfirmasi Kata Sandi</label>
                <input class="mt-2 border px-4 py-2 rounded-lg" type="password" placeholder="********"
                    name="confirmpassword" />

                <button
                    class="my-6 w-full bg-secondary py-2 text-white font-medium duration-100 transition-all ease-in rounded-lg hover:bg-primary">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-gray-600 text-center text-sm">
                Sudah punya akun?
                <a href="{{ url('/login') }}" class="text-secondary font-medium hover:underline">Masuk di sini</a>
            </p>
        </div>
    </section>
@endsection
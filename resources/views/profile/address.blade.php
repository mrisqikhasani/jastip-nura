@extends('layouts.app')


@section('content')

    @include('layouts.partials.sidebarprofile')

    <section class="grid grid-cols-1 lg:grid-cols-2 gap-5 px-5 pb-10">

        <!-- LEFT: FORM -->
        <div class="border p-5 shadow-md">
            <h2 class="text-lg font-bold mb-4">Tambah / Edit Alamat</h2>

            @if (session('success'))
                <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 rounded bg-red-100 px-4 py-3 text-red-800">
                    {{ session('error') }}
                </div>
            @endif


            <!-- Contoh form -->
            <form action="{{ $address ? url('/account/address/' . $address->id) : url('/account/address') }}" method="POST"
                class="space-y-4">
                @csrf
                @if ($address)
                    @method('PUT')
                @endif
                <div>
                    <label class="block text-sm font-medium">Nama Penerima</label>
                    <input type="text" name="receiver_name" class="w-full border px-3 py-2"
                        value="{{ old('receiver_name', $address->receiver_name ?? '') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number', $address->phone_number ?? '') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium">Provinsi</label>
                    <input type="text" name="province" class="w-full border px-3 py-2"
                        value="{{ old('province', $address->province ?? '') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium">Kota</label>
                    <input type="text" name="city" class="w-full border px-3 py-2"
                        value="{{ old('city', $address->city ?? '') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium">Postal Code</label>
                    <input type="text" name="postal_code" class="w-full border px-3 py-2"
                        value="{{ old('postal_code', $address->postal_code ?? '') }}">
                </div>
                <div>
                    <label class="block text-sm font-medium">Detail</label>
                    <!-- <input type="text" name="province" class="w-full border px-3 py-2"> -->
                    <textarea name="detail"
                        class="w-full border px-3 py-2">{{ old('detail', $address->detail ?? '') }}</textarea>
                </div>
                <!-- Tambah field lain sesuai kebutuhan -->
                <button type="submit" class="bg-blue-600 text-white px-4 py-2">Simpan</button>
            </form>
        </div>

        <!-- RIGHT: SCROLLABLE ADDRESS LIST -->
        <div class="border p-5 shadow-md overflow-y-auto max-h-[600px]">
            <h2 class="text-lg font-bold mb-4">Daftar Alamat</h2>

            <a href="{{ url('/account/address') }}" class="inline-block mb-4 rounded bg-green-600 px-4 py-2 text-white">
                + Tambah Alamat Baru
            </a>


            @foreach ($user->addresses as $address)
                <div class="border p-4 mb-4 rounded">
                    <p><strong>{{ $address->receiver_name }}</strong></p>
                    <p>{{ $address->province }}, {{ $address->city }}</p>
                    <p>{{ $address->postal_code }}</p>
                    <p>{{ $address->detail }}</p>
                    <a href="{{ url('/account/address') }}?id={{ $address->id }}" class="text-blue-600">Edit</a>

                    <form action="{{ url('/account/address/' . $address->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus alamat ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

    </section>

@endsection
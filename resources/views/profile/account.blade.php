@extends('layouts.app')

@section('content')
  <!-- Sidebar profile -->
  @include('layouts.partials.sidebarprofile')

  <!-- Header for Mobile -->
  <div class="mb-5 flex items-center justify-between px-5 md:hidden">
    <div class="flex gap-3">
    <div class="py-5">
      <div class="flex items-center">
      <img width="40px" height="40px" class="rounded-full object-cover"
        src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : asset('storage/placeholder-img.svg') }}" alt="User avatar" />
      <div class="ml-5">
        <p class="text-sm text-gray-500">Hello,</p>
        <p class="font-bold">{{ $user->nama_lengkap }}</p>
      </div>
      </div>
    </div>
    </div>
    <div class="flex gap-3">
    <a href="{{ url('/account/profile') }}" class="border bg-amber-400 py-2 px-2 text-sm">Pengaturan</a>
    </div>
  </div>

  <!-- Dashboard Content -->
    <section class="grid w-full max-w-[1200px] grid-cols-1 gap-4 px-5 pb-10 md:grid-cols-2">

    <!-- Personal Profile -->
    <div class="border rounded-xl bg-white py-5 shadow-md">
      <div class="flex justify-between px-4 pb-5">
      <p class="font-bold text-lg">Pengaturan Profil</p>
      <a class="text-sm text-secondary hover:underline" href="{{ url('/account/profile') }}">Ubah</a>
      </div>
      <div class="px-4 text-sm text-gray-700 space-y-2">
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[150px] font-bold">Nama Pelanggan</span>
          <span>{{ $user->nama_lengkap ?? '-' }}</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[150px] font-bold">Email</span>
          <span>{{ $user->email ?? '-' }}</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[150px] font-bold">Nomor Telepon</span>
          <span>{{ $user->nomor_telepon ?? '-' }}</span>
        </div>
      </div>
    </div>

    <!-- Recent Order Summary -->
    <div class="border rounded-xl bg-white py-5 shadow-md">
      <div class="flex justify-between px-4 pb-5">
      <p class="font-bold text-lg">Riwayat Pesanan</p>
      <a class="text-sm text-secondary hover:underline" href="{{ url('/account/order') }}">Lihat semua</a>
      </div>
      @if($lastOrder)
      <div class="px-4 text-sm text-gray-700 space-y-2">
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[100px] font-bold">ID Pesanan</span>
          <span>Pesanan #{{ $lastOrder->id_pesanan ?? '-' }}</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[100px] font-bold">Status</span>
          <span>{{ ucfirst($lastOrder->status) ?? '-' }}</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[100px] font-bold">Total</span>
          <span>Rp{{ number_format($lastOrder->total_harga, 0, ',', '.') ?? '-' }}</span>
        </div>
        <div class="flex flex-col md:flex-row md:items-start gap-2">
          <span class="min-w-[100px] font-bold">Tanggal</span>
          <span>{{ \Carbon\Carbon::parse($lastOrder->created_at)->locale('id')->isoFormat('D MMMM Y') ?? '-' }}</span>
        </div>
      </div>
    @else
      <div class="px-4 text-sm text-gray-500 italic">Anda belum memesan apapun.</div>
    @endif
    </div>

    <!-- Shipping Address -->
    <div class="rounded-2xl border bg-white p-6 shadow-md md:col-span-2">
      <div class="mb-4 flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
      <h2 class="text-lg font-bold text-gray-800">Alamat Pengiriman</h2>
      <a href="{{ url('/account/address') }}" class="text-sm font-medium text-secondary hover:underline">
        Ubah
      </a>
      </div>

      <div class="space-y-4 text-sm text-gray-700">
      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[150px] font-bold">Nama Penerima</span>
        <span>{{ $shippingAddress->nama_penerima ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[150px] font-bold">Alamat</span>
        <span>{{ $shippingAddress->detail_alamat ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[150px] font-bold">Kota / Provinsi</span>
        <span>{{ $shippingAddress->kota ?? '-' }}, {{ $shippingAddress->provinsi ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[150px] font-bold">Kode Pos</span>
        <span>{{ $shippingAddress->kode_pos ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[150px] font-bold">Telepon</span>
        <span>{{ $shippingAddress->nomor_telepon ?? '-' }}</span>
      </div>
      </div>
    </div>

    </section>

  @endsection
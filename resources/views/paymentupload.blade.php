@extends('layouts.app')

@section('content')
  <section class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Upload Bukti Transfer</h2>

    {{-- RINGKASAN PESANAN --}}
    <div class="bg-gray-100 rounded-lg p-4 mb-8">
      <h3 class="text-lg font-semibold text-gray-700 mb-3">🧾 Ringkasan Pesanan</h3>
      <ul class="text-sm text-gray-700 space-y-2">
      <li><strong>ID Pesanan:</strong> #{{ $order->id }}</li>
      <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y ') }}</li>
      <li><strong>Metode Pembayaran:</strong> {{ strtoupper($order->payment_method) }}</li>
      <li><strong>Total Pembayaran:</strong> <span
        class="text-violet-800 font-semibold">Rp{{ number_format($order->total_price, 0, ',', '.') }}</span></li>
      <li><strong>Transfer ke:</strong> BCA 1234567890 a.n. PT Jastip Nara</li>
      </ul>
    </div>

    {{-- FORM UPLOAD --}}
    <form action="{{ url("/payment/upload/{$order->id}") }}" method="POST" enctype="multipart/form-data"
      class="space-y-6">
      @csrf

      <div>
      <label for="proof" class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Transfer</label>
      <div class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 bg-white">
        <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M7 16V4m0 0a4 4 0 018 0v12m-8 0h8" />
        </svg>
        <p class="mt-2 text-sm text-gray-500">Pilih file atau drag ke sini</p>
        <label
          class="mt-2 inline-block bg-violet-800 text-white px-4 py-2 text-sm rounded-md cursor-pointer hover:bg-violet-700">
          Pilih File
          <input type="file" name="proof" accept="image/*" class="hidden" required>
        </label>
        <p class="mt-1 text-xs text-gray-400">Format: JPG, PNG - Maks: 10MB</p>
        </div>
      </div>

      @error('proof')
      <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
      </div>

      <div class="flex justify-center">
      <button type="submit"
        class="w-full sm:w-auto bg-violet-800 hover:bg-violet-700 text-white font-semibold px-6 py-3 rounded-lg transition">
        📤 Upload Sekarang
      </button>
      </div>
    </form>

    <div class="mt-6 text-center">
      <a href="{{ url('/account/order') }}" class="text-sm text-violet-700 hover:underline">⬅ Kembali ke Riwayat
      Pesanan</a>
    </div>
    </div>
  </section>
@endsection
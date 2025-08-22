@extends('layouts.app')

@section('content')
  @include('layouts.partials.sidebarprofile')

  <div class="w-full grid-col-2">

    @if (session()->has('success') || session()->has('error'))
    <div class="mx-4 mb-4">
    @if (session('success'))
    <div class="rounded-lg bg-green-100 border border-green-300 text-green-800 px-4 py-3 text-sm font-medium">
      {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="rounded-lg bg-red-100 border border-red-300 text-red-800 px-4 py-3 text-sm font-medium">
      {{ session('error') }}
    </div>
    @endif
    </div>
    @endif


    {{-- MOBILE: Card layout --}}
    <section class="container mx-auto my-3 flex flex-col gap-3 px-4 md:hidden">
    @foreach ($order->orderLineItems as $item)
    <div class="flex w-full rounded-xl border bg-white px-4 py-4 shadow-sm">
      <img class="object-contain self-start rounded-md" width="90"
      src="{{ $item->product->foto ? asset('storage/' . $item->product->foto) : asset('images/default-avatar.png') }}"
      alt="{{ $item->product->nama_produk }}" />

      <div class="ml-4 flex flex-col justify-between w-full">
      <div>
      <p class="text-base font-bold text-gray-800">{{ $item->product->nama_produk }}</p>
      <p class="text-sm text-gray-500">Kategori: {{ $item->product->kategori }}</p>
      </div>
      <div class="mt-3 text-sm text-gray-600">
      <p>Harga: <strong>Rp {{ number_format($item->product->harga, 0, ',', '.') }}</strong></p>
      <p>Qty: <strong>{{ $item->kuantitas }}</strong></p>
      <p>Total: <strong class="text-violet-800">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</strong></p>
      </div>
      </div>
    </div>
    @endforeach
    </section>

    {{-- DESKTOP: Table view --}}
    <section class="hidden md:block px-4 mx-auto mt-6 col-span-1">
    <div class="overflow-hidden rounded-xl shadow-md bg-white border">
      <table class="w-full text-sm text-left text-gray-700">
      <thead class="text-xs uppercase bg-gray-50 text-gray-600">
        <tr>
        <th scope="col" class="px-6 py-4 w-[40%]">Item</th>
        <th scope="col" class="px-6 py-4 w-[20%]">Harga</th>
        <th scope="col" class="px-6 py-4 w-[10%] text-center">Qty</th>
        <th scope="col" class="px-6 py-4 w-[20%]">Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($order->orderLineItems as $item)
      <tr class="border-t">
      <td class="px-6 py-5">
        <div class="flex items-center gap-4">
        <img class="w-16 h-16 rounded-md object-cover" src="{{ asset('storage/' . $item->product->foto) }}"
        alt="{{ $item->product->nama_produk }}">
        <div>
        <p class="font-semibold text-gray-800">{{ $item->product->nama_produk }}</p>
        <p class="text-sm text-gray-500">Kategori: {{ $item->product->kategori }}</p>
        </div>
        </div>
      </td>
      <td class="px-6 py-5">Rp {{ number_format($item->product->harga, 0, ',', '.') }}</td>
      <td class="px-6 py-5 text-center">{{ $item->kuantitas }}</td>
      <td class="px-6 py-5 text-secondary font-semibold">Rp {{ number_format($item->subtotal, 0, ',', '.') }}
      </td>
      </tr>
      @endforeach
      </tbody>
      </table>
    </div>
    </section>

    {{-- ORDER SUMMARY & INFORMATION (stacked below the table) --}}
    <section class="mt-8 px-4 max-w-[1100px] mx-auto grid grid-cols-1 gap-6">

    {{-- ORDER SUMMARY --}}
    <div class="rounded-xl border bg-white py-5 px-6 shadow-md">
      <h2 class="font-bold text-lg text-gray-800 mb-4">Ringkasan Pesanan</h2>
      <div class="flex justify-between border-b py-3 text-sm">
      <p>Subtotal</p>
      <p>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
      </div>
      <div class="flex justify-between border-b py-3 text-sm">
      <p>Pengiriman</p>
      <p class="text-green-700">Gratis</p>
      </div>
      <div class="flex justify-between py-3 text-base font-bold">
      <p>Total</p>
      <p>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
      </div>
    </div>

    {{-- ORDER INFORMATION --}}
    <div class="rounded-lg bg-white py-5 px-6 shadow-md">
      <h2 class="font-bold text-lg text-gray-800 mb-4">Rincian Pesanan</h2>

      <div class="mb-3 text-sm">
      <p>ID Pesanan: 
        <span class="font-semibold">
        &num;{{ $order->id_pesanan }}
        </span>
      </p>
      </div>

      <div class="border-b py-3 text-sm">
      <p>
        Status:
        @php
      $statusClass = match ($order->status) {
      'Menunggu' => 'text-yellow-600',
      'Diproses' => 'text-purple-600',
      'Selesai' => 'text-green-600',
      'Dibatalkan' => 'text-red-600',
      default => 'text-gray-600',
      };
      @endphp
        <span class="font-bold {{ $statusClass }}">{{ ucfirst($order->status) }}</span>
      </p>
      <p>Tanggal: {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d M Y') }}</p>
      </div>

      <div class="border-b py-3 text-sm">
      <p class="font-bold">Informasi Alamat</p>
      <p>Penerima: {{ $order->shippingAddress->nama_penerima }}</p>
      <p>Nomor Telepon: {{ $order->shippingAddress->nomor_telepon }}</p>
      <p>Provinsi: {{ $order->shippingAddress->provinsi }}</p>
      <p>Kota: {{ $order->shippingAddress->kota }}</p>
      <p>Kode Pos: {{ $order->shippingAddress->kode_pos }}</p>
      <p>Detail: {{ $order->shippingAddress->detail_alamat }}</p>
      </div>

      <div class="py-3 text-sm">
      <p class="font-bold">Rincian Pembayaran</p>
      @if ($order->metode_pembayaran === 'cod')
      <p>Metode: Cash Of Delivery (COD)</p>
    @elseif($order->metode_pembayaran === 'bank_transfer')
      <p>Metode: Bank Transfer</p>
    @endif
      </div>
    </div>

    {{-- Payment Proof Section --}}
    @if ($order->metode_pembayaran !== 'cod')
    <div class="w-full">
      <div class="rounded-xl border bg-white py-5 px-6 shadow-md">
      <h2 class="font-bold text-lg text-gray-800 mb-4">Bukti Pembayaran</h2>

      @if (!$order->bukti_pembayaran)
      <div class="text-sm text-gray-600 mb-4">
      <p class="mb-2">Anda belum mengunggah bukti pembayaran untuk pesanan ini.</p>
      <a href="{{ url('/payment/upload/' . $order->id_pesanan) }}"
      class="inline-block px-4 py-2 bg-secondary hover:bg-primary text-white rounded-lg text-sm font-medium transition">
      Upload Bukti Pembayaran
      </a>
      </div>
    @else
      <div class="text-sm text-gray-700">
      <p class="mb-2">Bukti pembayaran telah diunggah</p>
      <a href="{{ asset('storage/' . $order->bukti_pembayaran) }}" target="_blank"
      class="text-secondary hover:underline hover:text-primary">
      Lihat Bukti Pembayaran
      </a>
      </div>
    @endif
      </div>
    </div>
    @endif


    </section>

  </div>
@endsection
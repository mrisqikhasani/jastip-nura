@extends('layouts.app')

@section('content')
  @include('layouts.partials.sidebarprofile')

  <section class="container mx-auto max-w-[1200px] py-5 lg:py-10">

    {{-- Mobile Order Card Table --}}
    <section class="md:hidden space-y-4 px-4">
    @forelse ($orders as $order)
    <div class="rounded-xl border bg-white p-4 shadow-sm">
      <div class="flex justify-between items-center">
      <h3 class="text-base font-semibold text-gray-800">Order #{{ $order->id }}</h3>
      <span class="
        text-xs font-semibold px-2 py-1 rounded-full 
        {{ 
        $order->status === 'completed' ? 'text-green-700 bg-green-100 border border-green-300' :
    ($order->status === 'pending' ? 'text-yellow-700 bg-yellow-100 border border-yellow-300' :
      ($order->status === 'cancelled' ? 'text-red-700 bg-red-100 border border-red-300' :
      'text-gray-600 bg-gray-100 border border-gray-300')) 
        }}">
      {{ ucfirst($order->status) }}
      </span>
      </div>

      <p class="text-sm text-gray-500 mt-1">
      {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d F Y') }}
      </p>

      <p class="mt-2 text-lg font-bold text-violet-800">
      Rp{{ number_format($order->total_price, 0, ',', '.') }}
      </p>

      <div class="mt-3">
      <a href="{{ url('/account/order/' . $order->id) }}"
      class="inline-block bg-violet-700 text-white px-4 py-2 text-sm rounded-md hover:bg-violet-600 transition">
      Lihat Detail
      </a>
      </div>
    </div>
    @empty
    <div class="text-center text-sm text-gray-500">Belum ada pesanan.</div>
    @endforelse
    </section>

    {{-- Desktop Table --}}
    <section class="hidden md:block mt-10 px-5">
    <div class="overflow-x-auto rounded-xl shadow">
      <table class="min-w-full divide-y divide-gray-200 bg-white">
      <thead class="bg-neutral-100 text-gray-600 uppercase text-sm">
        <tr>
        <th class="px-6 py-3 text-left">Pesanan</th>
        <th class="px-6 py-3 text-left">Tanggal</th>
        <th class="px-6 py-3 text-left">Total</th>
        <th class="px-6 py-3 text-left">Status</th>
        <th class="px-6 py-3 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 text-sm">
        @forelse ($orders as $order)
        <tr class="hover:bg-gray-50">
        <td class="px-6 py-4 font-semibold text-gray-800">Order #{{ $order->id }}</td>
        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d F Y') }}</td>
        <td class="px-6 py-4">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>
        <td class="px-6 py-4">
        @php
          $statusClass = match ($order->status) {
            'Menunggu' => 'text-yellow-600 bg-yellow-100',
            'Diproses' => 'text-purple-600 bg-purple-100',
            'Selesai' => 'text-green-600 bg-green-100',
            'Dibatalkan' => 'text-red-600 bg-red-100',
            default => 'text-gray-600 bg-gray-100',
          };
        @endphp
        <span class="inline-block text-xs font-medium px-3 py-1 rounded-lg {{ $statusClass }}">
          {{ ucfirst($order->status) }}
        </span>
        </td>
        <td class="px-6 py-4">
        <a href="{{ url('/account/order/' . $order->id) }}"
        class="inline-block bg-secondary text-white font-medium text-xs px-4 py-2 rounded-lg hover:bg-primary transition">
        Lihat
        </a>
        </td>
        </tr>
      @empty
      <tr>
      <td colspan="5" class="text-center py-4 text-gray-400">Belum ada pesanan.</td>
      </tr>
      @endforelse
      </tbody>
      </table>
    </div>
    </section>
  </section>
@endsection
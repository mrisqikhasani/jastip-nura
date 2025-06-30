@extends('layouts.app')

@section('content')
  @include('layouts.partials.sidebarprofile')

  <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">


    <!-- Mobile order table  -->
    <section class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden">
    <!-- 1 -->
    @foreach ($orders as $order)

    <div class="flex w-full border px-4 py-4">
      <div class="ml-3 flex w-full flex-col justify-center">
      <div class="flex items-center justify-between">
      <p class="text-xl font-bold">Order #{{ $order->id }} </p>
      <div class="border border-green-500 px-2 py-1 text-green-500">
      {{ $order->status }}
      </div>
      </div>
      <p class="text-sm text-gray-400">
      {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d F Y') }}
      </p>
      <p class="py-3 text-xl font-bold text-violet-900">
      Rp{{ number_format($order->total_price, 0, ',', '.') }} </p>
      <div class="mt-2 flex w-full items-center justify-between">
      <div class="flex items-center justify-center">
      <a href="{{ url('/account/order/'.$order->id) }}"
        class="flex cursor-text items-center justify-center bg-amber-500 px-2 py-2 active:ring-gray-500">
        View order
      </a>
      </div>
      </div>
      </div>
    </div>

    @endforeach
    </section>
    <!-- /Mobile order table  -->

    <!-- Order table  -->
    <section class="hidden h-[600px] w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10 lg:grid">
    <table class="table-fixed">
      <thead class="h-16 bg-neutral-100">
      <tr>
        <th>ORDER</th>
        <th>DATE</th>
        <th>TOTAL</th>
        <th>STATUS</th>
        <th>ACTION</th>
      </tr>
      </thead>
      <tbody>


      @foreach ($orders as $order)
      <tr class="h-[100px] border-b">
      <td class="text-center align-middle"> Order # {{ $order->id }}</td>
      <td class="mx-auto text-center">
      {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d F Y') }}
      </td>
      <td class="text-center align-middle">Rp{{ number_format($order->total_price, 0, ',', '.') }}</td>

      <td class="mx-auto text-center">
      <span class="border-2 border-green-500 py-1 px-3 text-green-500">{{ ucfirst($order->status) }}</span>
      </td>
      <td class="text-center align-middle">
      <a href="{{ url('/account/order/'.$order->id) }}" 
      class="bg-amber-400 px-4 py-2">
      <button class="text-center">View</button></a>
      </td>
      </tr>
    @endforeach

      </tbody>
    </table>
    </section>
    <!-- /Order table  -->
  </section>

@endsection
@extends('layouts.app') 

@section('content')

  @include('layouts.partials.sidebarprofile')

  <!-- Mobile product table  -->
  <section class="container mx-auto my-3 flex w-full flex-col gap-3 px-4 md:hidden">
    <!-- 1 -->
    @foreach ($order->orderLineItems as $item)

    <div class="flex w-full border px-4 py-4">
    <img class="self-start object-contain" width="90px"
      src="{{ $item->product->image ? asset('storage/' . $item->product->image) : asset('images/default-avatar.png') }}"
      alt=" {{ $item->product->name }}" />
    <div class="ml-3 flex w-full flex-col justify-center">
      <div class="flex items-center justify-between">
      <p class="text-xl font-bold">{{ $item->product->name }}</p>
      </div>
      <p class="py-3 text-xl font-bold text-violet-900">Rp {{ number_format($item->sub_price, 0, ',', '.') }}</p>
      <div class="mt-2 flex w-full items-center justify-between">
      <div class="flex items-center justify-center">
      <div class="flex cursor-text items-center justify-center active:ring-gray-500">
      Quantity: {{ $item->quantity }}
      </div>
      </div>
      </div>
    </div>
    </div>
    @endforeach

  </section>
  <!-- /Mobile product table  -->

  <!-- Product table  -->
  <section class="w-full max-w-[1200px] gap-3 px-5 pb-10">
    <table class="hidden w-full md:table">
    <thead class="h-16 bg-neutral-100">
      <tr>
      <th>ITEM</th>
      <th>PRICE</th>
      <th>QUANTITY</th>
      <th>TOTAL</th>
      </tr>
    </thead>
    <tbody>


      @foreach ($order->orderLineItems as $item)

      <tr class="h-[100px] border-b">
      <td class="align-middle">
      <div class="flex">
      <img class="w-[90px]" src="{{ asset('storage/'.$item->product->image) }}" alt="bedroom image" />
      <div class="ml-3 flex flex-col justify-center">
        <p class="text-xl font-bold">{{ $item->product->name }}</p>
        <p class="text-sm text-gray-400">Kategori : {{ $item->product->category }}</p>
      </div>
      </div>
      </td>
      <td class="mx-auto text-center">Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
      <td class="text-center align-middle">{{ $item->quantity }}</td>
      <td class="mx-auto text-center">Rp {{ number_format($item->sub_price, 0, ',', '.') }}</td>
      </tr>

    @endforeach

    </tbody>
    </table>
    <!-- /Product table  -->

    <!-- Summary  -->

    <section class="my-5 flex w-full flex-col gap-4 lg:flex-row">
    <div class="lg:w-1/2">
      <div class="border py-5 px-4 shadow-md">
      <p class="font-bold">ORDER SUMMARY</p>

      <div class="flex justify-between border-b py-5">
        <p>Subtotal</p>
        <p>Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
      </div>

      <div class="flex justify-between border-b py-5">
        <p>Shipping</p>
        <p>Free</p>
      </div>

      <div class="flex justify-between py-5">
        <p>Total</p>
        <p>Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
      </div>
      </div>
    </div>

    <!-- Address info  -->

    <div class="lg:w-1/2">
      <div class="border py-5 px-4 shadow-md">
      <p class="font-bold">ORDER INFORMATION</p>

      <div>
        <p>Order &num;{{ $order->id }}</p>
      </div>

      <div class="flex flex-col border-b py-5">
        <p>
        Status:
        @if ($order->status === 'completed')
            <span class="font-bold text-green-600">{{ ucfirst($order->status) }}</span>
        @elseif ($order->status === 'pending')
            <span class="font-bold text-yellow-600">{{ ucfirst($order->status) }}</span>
        @elseif ($order->status === 'cancelled')
            <span class="font-bold text-red-600">{{ ucfirst($order->status) }}</span>
        @else
            <span class="font-bold text-gray-600">{{ ucfirst($order->status) }}</span>
        @endif
        </p>

        <p>Date: {{ \Carbon\Carbon::parse($order->order_date)->translatedFormat('d F Y') }}</p>
      </div>

      <div></div>

      <div class="flex flex-col border-b py-5">
        <p class="font-bold">ADDRESS INFORMATION</p>
        <p>Penerima: {{ $order->shippingAddress->receiver_name }}</p>
        <p>Phone Number: {{ $order->shippingAddress->phone_number }}</p>
        <p>Provinsi: {{ $order->shippingAddress->province }}</p>
        <p>Kota: {{ $order->shippingAddress->city }}</p>
        <p>Kode Pos: {{ $order->shippingAddress->postal_code }}</p>
        <p>Detail: {{ $order->shippingAddress->detail }}</p>
      </div>

      <div class="flex flex-col py-5">
        <p class="font-bold">PAYMENT INFORMATION</p>
        <p>Payment method: {{ $order->payment_method }}</p>
      </div>
      </div>
    </div>

    <!-- /Address info  -->
    </section>
  </section>

@endsection
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
        src="{{ asset('storage/jiamge/' . $user->image) }}" alt="{{ $user->name }}" />
      <div class="ml-5">
        <p class="text-sm text-gray-500">Hello,</p>
        <p class="font-bold">{{ $user->name }}</p>
      </div>
      </div>
    </div>
    </div>
    <div class="flex gap-3">
    <a href="{{ url('/account/profile') }}" class="border bg-amber-400 py-2 px-2 text-sm">Profile Settings</a>
    </div>
  </div>

  <<!-- Dashboard Content -->
    <section class="grid w-full max-w-[1200px] grid-cols-1 gap-4 px-5 pb-10 md:grid-cols-2">

    <!-- Personal Profile -->
    <div class="border rounded-xl bg-white py-5 shadow-md">
      <div class="flex justify-between px-4 pb-5">
      <p class="font-bold text-lg">Personal Profile</p>
      <a class="text-sm text-violet-900 hover:underline" href="{{ url('/account/profile') }}">Edit</a>
      </div>
      <div class="px-4 text-sm text-gray-700 space-y-2">
      <p><strong>Name:</strong> {{ $user->name }}</p>
      <p><strong>Username:</strong> {{ $user->username }}</p>
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
      </div>
    </div>

    <!-- Recent Order Summary -->
    <div class="border rounded-xl bg-white py-5 shadow-md">
      <div class="flex justify-between px-4 pb-5">
      <p class="font-bold text-lg">Recent Order</p>
      <a class="text-sm text-violet-900 hover:underline" href="{{ url('/account/order') }}">See all</a>
      </div>
      @if($lastOrder)
      <div class="px-4 text-sm text-gray-700 space-y-2">
      <p><strong>Order ID:</strong> #{{ $lastOrder->id }}</p>
      <p><strong>Status:</strong> {{ ucfirst($lastOrder->status) }}</p>
      <p><strong>Total:</strong> Rp{{ number_format($lastOrder->total_price, 0, ',', '.') }}</p>
      <p><strong>Placed:</strong> {{ $lastOrder->created_at->format('d M Y') }}</p>
      </div>
    @else
      <div class="px-4 text-sm text-gray-500 italic">You have no orders yet.</div>
    @endif
    </div>

    <!-- Shipping Address -->
    <div class="rounded-2xl border bg-white p-6 shadow-md md:col-span-2">
      <div class="mb-4 flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
      <h2 class="text-lg font-semibold text-gray-800">Shipping Address</h2>
      <a href="{{ url('/account/address') }}" class="text-sm font-medium text-violet-600 hover:underline">
        Edit
      </a>
      </div>

      <div class="space-y-4 text-sm text-gray-700">
      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[100px] font-semibold text-gray-600">Nama Penerima</span>
        <span>{{ $shippingAddress->receiver_name ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[100px] font-semibold text-gray-600">Alamat</span>
        <span>{{ $shippingAddress->detail ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[100px] font-semibold text-gray-600">Kota / Provinsi</span>
        <span>{{ $shippingAddress->city ?? '-' }}, {{ $shippingAddress->province ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[100px] font-semibold text-gray-600">Kode Pos</span>
        <span>{{ $shippingAddress->postal_code ?? '-' }}</span>
      </div>

      <div class="flex flex-col md:flex-row md:items-start gap-2">
        <span class="min-w-[100px] font-semibold text-gray-600">Telepon</span>
        <span>{{ $shippingAddress->phone_number ?? '-' }}</span>
      </div>
      </div>
    </div>

    </section>

  @endsection
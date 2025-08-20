@extends('layouts.app')

@section('content')
  <!-- Breadcrumbs -->
  <nav class="mx-auto mt-4 w-full max-w-[1200px] px-5">
    <ul class="flex items-center text-sm text-gray-600">
    <li>
      <a href="{{ url('/') }}" class="text-gray-600 hover:text-black">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" viewBox="0 0 24 24" fill="currentColor">
        <path
        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
        <path
        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
      </svg>
      </a>
    </li>
    <li><span class="mx-2">&gt;</span></li>
    <li class="text-gray-500">Keranjang</li>
    </ul>
  </nav>
  <!-- /Breadcrumbs -->

  <!-- Cart Content -->
  <div class="mx-auto mt-8 w-full max-w-[1200px] px-5">
    <!-- Title -->
    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Keranjang Belanja</h2>

    <!-- Main Content -->
    <div class="flex flex-col md:flex-row gap-6">
    <!-- Cart Table / Items -->
    <section class="w-full flex-1 overflow-x-auto">
      @livewire('cart-livewire')
    </section>
    </div>
  </div>

@endsection
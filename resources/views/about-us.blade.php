@extends('layouts.app')

@section('content')

<!-- Breadcrumbs -->
<nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
  <ul class="flex items-center">
    <li class="cursor-pointer">
      <a href="{{ url('/') }}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
          <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
          <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
        </svg>
      </a>
    </li>
    <li>
      <span class="mx-2 text-gray-500">&gt;</span>
    </li>
    <li class="text-gray-500">Tentang Kami</li>
  </ul>
</nav>
<!-- /Breadcrumbs -->

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-10 py-12 grid grid-cols-1 lg:grid-cols-2 items-center gap-4">
      <div>
        <img src="storage/about-us.svg" alt="Product showcase"
            class="mx-auto w-full max-w-[500px]" />
      </div>

      <div class="relative w-full h-auto">
        <h1 class="text-3xl text-secondary font-bold mb-4">Tentang Kami</h1>
        <p class="mb-4 text-gray-700">
            Kami adalah layanan jasa titip (jastip) yang berbasis di <strong>Yogyakarta</strong>, menghadirkan langsung produk-produk autentik dan tren dari <strong>Thailand</strong>.
            Mulai dari fashion, skincare, bodycare, sampai barang-barang unik dari pasar lokal Thailand.
        </p>

        <p class="mb-4 text-gray-700">
            Kami melayani pengiriman ke seluruh Indonesia, termasuk area ujung timur seperti <strong>Sorong</strong> dan <strong>Manokwari</strong>. Estimasi pengiriman cepat karena semua barang langsung dibawa oleh tim kami yang berangkat sendiri ke Thailand.
        </p>

        <p class="mb-4 text-gray-700">
            Biaya jastip sudah termasuk ke dalam harga produk. Kamu cukup pilih barang, bayar, dan kami kirimkan langsung ke alamatmu. Nggak perlu ribet!
        </p>

        <p class="mb-4 text-gray-700">
            Butuh barang dari Chatuchak Market, Siam Paragon, atau Night Market lokal? Cukup request via Instagram atau WhatsApp, dan kami bantu carikan langsung.
        </p>
      </div>
    </div>
  </section>

@endsection

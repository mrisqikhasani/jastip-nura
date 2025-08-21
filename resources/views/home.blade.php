@extends('layouts.app')
@section('content')
  <!-- Offer image  -->

  @php
  dump($recommendedProducts)
  @endphp

  <section class="bg-white">
    <div class="max-w-7xl mx-auto px-10 py-12 grid grid-cols-1 lg:grid-cols-2 items-center gap-4">
      <div>
        <h1 class="text-4xl font-bold text-secondary mt-2 leading-snug">
          Kami hadir membawa barang-barang asli dari <span class="underline">Thailand</span>
          & Dikirim <br/>cepat!
        </h1>
        <p class="mt-4 text-gray-700 max-w-md">
          Baju, bodycare, skincare, dan semua produk khas Thailand langsung dari Jogja ✈️ ke Sorong & Manokwari.
          <strong>Tanpa biaya tambahan</strong>
        </p>
        <a href="/catalog">
        <button class="mt-6 bg-secondary font-medium text-white px-8 py-3 rounded-full hover:bg-primary transition">
          Belanja Sekarang
        </button>
        </a>
      </div>

      <div class="relative w-full h-auto">
        <img src="storage/hero-section.svg" alt="Product showcase"
            class="mx-auto w-full max-w-[500px]" />
      </div>
    </div>
  </section>

  <section class="container mx-auto my-8 flex flex-col justify-center gap-3 lg:flex-row">
    <!-- 1 -->

    <div class="mx-5 flex flex-row items-center justify-center border-2 border-secondary rounded-lg py-3 px-5 w-80">
    <div class="">
      <i class="fa-solid fa-truck-ramp-box h-6 w-6 text-secondary lg:mr-2"></i>
    </div>

    <div class="ml-3 flex flex-col justify-center">
      <h3 class="text-left text-xs font-bold lg:text-sm">Dikirim cepat</h3>
      <p class="text-light text-left text-xs lg:text-sm">
      Pengiriman cepat ke seluruh Indonesia
      </p>
    </div>
    </div>

    <!-- 2 -->

    <div class="mx-5 flex flex-row items-center justify-center border-2 border-secondary rounded-lg py-3 px-5 w-80">
    <div class="">
      <i class="fa-solid fa-award h-6 w-6 text-secondary lg:mr-2"></i>
    </div>

    <div class="ml-3 flex flex-col justify-center">
      <h3 class="text-left text-xs font-bold lg:text-sm">Murah & Asli</h3>
      <p class="text-light text-left text-xs lg:text-sm">
      Produk 100% asli Thailand
      </p>
    </div>
    </div>

    <!-- 3 -->

    <div class="mx-5 flex flex-row items-center justify-center border-2 border-secondary rounded-lg py-3 px-5 w-80">
    <div class="">
      <i class="fa-solid fa-money-check-dollar h-6 w-6 text-secondary lg:mr-2"></i>
    </div>

    <div class="ml-3 flex flex-col justify-center">
      <h3 class="text-left text-xs font-bold lg:text-sm">Harga All-in</h3>
      <p class="text-light text-left text-xs lg:text-sm">
      Harga sudah termasuk biaya jastip
      </p>
    </div>
    </div>
  </section>

  <p class="mx-auto mt-20 mb-5 max-w-[1200px] font-semibold text-secondary text-xl px-5">Rekomendasi untuk Anda</p>
  <!-- Recommendations -->
  <section class="mx-auto grid max-w-[1200px] grid-cols-2 gap-10 px-5 pb-10 lg:grid-cols-4">
  @foreach($recommendedProducts as $product)
  <div class="flex flex-col">
    <div class="relative flex">
      <img class="w-full aspect-square object-cover rounded-lg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
      <div
        class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100">
        <a href="{{ url('/product/' . $product->id) }}">
          <span class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full bg-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="h-6 w-6 text-white">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
          </span>
        </a>
      </div>
    </div>

    <div>
      <p class="mt-2 font-medium">{{ $product->name }}</p>
      <p class="font-medium text-secondary">
        Rp{{ number_format($product->price) }} 
      </p>
    </div>
  </div>
  @endforeach
  </section>

  <!-- /Recommendations -->
@endsection

@section('scripts')
<script>
  function formatIDR(amount) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
  }
</script>
@endsection

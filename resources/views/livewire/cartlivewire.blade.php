@if ($cart && $cart->cartLineItems->count())
  <div class="flex flex-col lg:flex-row gap-6">

    {{-- Cart Items --}}
    <div class="flex-1 space-y-4">
      @foreach ($cart->cartLineItems as $item)
        <div class="rounded-lg border border-gray-300 bg-white p-4 shadow-sm md:p-6">
          <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">

            {{-- Product Image --}}
            <a href="#" class="shrink-0 md:order-1">
              <img class="h-20 w-20" 
                   src="{{ $item->product->image ? asset('storage/' . $item->product->image) : 'https://via.placeholder.com/80' }}"
                   alt="{{ $item->product->name }}" />
            </a>

            {{-- Quantity & Price --}}
            <div class="flex items-center justify-between gap-4 md:order-3 md:justify-end">
              <div class="flex items-center">
                <button wire:click="decrement({{ $item->id }})" type="button"
                        class="inline-flex h-6 w-6 items-center justify-center rounded-md border bg-gray-100 hover:bg-gray-200">
                  <svg class="h-3 w-3 text-gray-900" viewBox="0 0 18 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1h16" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                  </svg>
                </button>
                <span class="w-10 text-center text-sm font-medium text-gray-900">{{ $item->quantity }}</span>
                <button wire:click="increment({{ $item->id }})" type="button"
                        class="inline-flex h-6 w-6 items-center justify-center rounded-md border bg-gray-100 hover:bg-gray-200">
                  <svg class="h-3 w-3 text-gray-900" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 1v16M1 9h16" stroke="currentColor" stroke-linecap="round" stroke-width="2" />
                  </svg>
                </button>
              </div>

              <div class="text-end md:w-32">
                <p class="text-base font-bold text-gray-900">
                  Rp {{ number_format($item->product->price * $item->quantity) }}
                </p>
              </div>
            </div>

            {{-- Product Info --}}
            <div class="w-full flex-1 min-w-0 space-y-2 md:order-2 md:max-w-md">
              <p class="text-lg font-medium text-gray-900">
                {{ $item->product->name }}
              </p>
              <p class="text-sm text-gray-600">
                Harga Satuan: Rp {{ number_format($item->product->price) }}
              </p>

              {{-- Remove Button --}}
              <div class="flex items-center gap-4">
                <button wire:click="deleteItem({{ $item->id }})" type="button"
                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                  <svg class="me-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                  </svg>
                  Hapus
                </button>
              </div>
            </div>

          </div>
        </div>
      @endforeach
    </div>

    {{-- Order Summary --}}
    <div class="w-full lg:w-[300px] rounded-lg border bg-white p-6 shadow-md">
      <h2 class="text-lg font-bold mb-4">Order Summary</h2>

      <div class="flex justify-between py-2">
        <span class="text-gray-500">Subtotal</span>
        <span class="font-medium">Rp {{ number_format($cart->total_price ?? 0) }}</span>
      </div>

      <div class="flex justify-between py-2 border-b">
        <span class="text-gray-500">Shipping</span>
        <span class="text-green-600">Gratis</span>
      </div>

      <div class="flex justify-between py-2 font-semibold">
        <span>Total</span>
        <span>Rp {{ number_format($cart->total_price ?? 0) }}</span>
      </div>

      <button wire:click="prosesCheckout"
              class="mt-4 w-full bg-violet-900 py-2 text-white rounded hover:bg-violet-800 transition">
        Checkout
      </button>
    </div>

  </div>

@else
  {{-- Keranjang Kosong --}}
  <div class="grid place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
    <div class="text-center">
      <h3 class="mt-4 text-2xl font-semibold text-indigo-900 sm:text-4xl">Keranjang Kamu Masih Kosong</h3>
      <p class="mt-6 text-sm text-gray-500 sm:text-lg">
        Silakan tambahkan produk pilihanmu ke keranjang.
      </p>
      <div class="mt-10 flex items-center justify-center gap-x-6">
        <a href="{{ url('/catalog') }}"
           class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
          Kunjungi Katalog
        </a>
      </div>
    </div>
  </div>
@endif

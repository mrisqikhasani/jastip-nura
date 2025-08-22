<div class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-8 text-gray-800">Ubah Pesanan</h1>
  <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    
    <!-- 🧾 Kiri: Alamat + Metode Pembayaran -->
    <div class="lg:col-span-2 space-y-6">
      @if ($errors->any())
        <div class="mt-4 bg-red-100 text-red-700 text-sm p-3 rounded">
            <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        @if (session()->has('error'))
            <div class="mt-4 bg-red-100 text-red-700 text-sm p-3 rounded">
                {{ session('error') }}
            </div>
        @endif

    
      {{-- 📍 Address Selection --}}
      <div class="bg-white p-6 rounded-2xl border border-gray-300">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Alamat Pengiriman</h2>

        @foreach($address as $add)
      <label class="block mb-3 cursor-pointer">
        <input type="radio" wire:model="selectedAddressId" value="{{ $add->id_alamat }}" class="hidden peer">
        <div
        class="p-4 rounded-xl border border-gray-300 peer-checked:border-blue-600 peer-checked:ring-2 peer-checked:ring-blue-200 transition">
        <p class="font-semibold text-gray-800">{{ $add->nama_penerima }}</p>
        <p class="text-sm text-gray-500">
          {{ $add->detail_alamat }}, {{ $add->kota }}, {{ $add->provinsi }} - {{ $add->kode_pos }}
        </p>
        </div>
      </label>
    @endforeach

        @if($address->isEmpty())
      <p class="text-sm text-red-500">Belum ada alamat. Tambahkan terlebih dahulu.</p>
    @endif
      </div>

      {{-- 💰 Payment Method --}}
      <div class="bg-white p-6 rounded-2xl border border-gray-300">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Metode Pembayaran</h2>

        <div class="space-y-3">
          <label class="flex items-center gap-3 cursor-pointer">
            <input type="radio" wire:model="selectedPaymentMethod" value="cod" class="accent-blue-600">
            <span>Bayar di Tempat (COD)</span>
          </label>

          <label class="flex items-center gap-3 cursor-pointer">
            <input type="radio" wire:model="selectedPaymentMethod" value="bank_transfer" class="accent-blue-600">
            <span>Transfer Bank</span>
          </label>
        </div>
      </div>
    </div>

    <!-- 📦 Kanan: Ringkasan Pesanan -->
    <div class="bg-white p-6 rounded-2xl border border-gray-300 h-fit">
      <h2 class="text-xl font-semibold mb-4 text-gray-700">Ringkasan Pesanan</h2>

      <div class="space-y-4 max-h-[400px] overflow-y-auto pr-1">
        @foreach($cart->cartLineItems as $item)
      <div class="flex justify-between border-b pb-3">
        <div>
        <p class="font-medium text-gray-800">{{ $item->product->nama_produk }}</p>
        <p class="text-sm text-gray-500">Qty: {{ $item->kuantitas }}</p>
        </div>
        <div class="text-right text-gray-700">
        Rp {{ number_format($item->product->harga * $item->kuantitas, 0, ',', '.') }}
        </div>
      </div>
    @endforeach
      </div>

      <div class="flex justify-between py-2 mt-6 ">
        <span class="text-gray-500 ">Subtotal</span>
        <span class="font-medium">Rp {{ number_format($total ?? 0) }}</span>
      </div>

      <div class="flex justify-between">
        <span class="text-gray-500">Pengiriman</span>
        <span class="text-green-600">Gratis</span>
      </div>

      <div class="mt-2 pt-4 border-t flex justify-between font-semibold text-lg text-gray-600">
        <span>Total</span>
        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
      </div>

      <button wire:click="placeOrder"
        class="mt-6 w-full bg-secondary text-white py-3 rounded-lg hover:bg-primary transition font-medium">
        Buat Pesanan
      </button>

      @if(session()->has('success'))
      <div class="mt-4 bg-green-100 text-green-700 text-sm p-3 rounded">
      {{ session('success') }}
      </div>
    @endif
    </div>
  </div>

  <!--  -->



</div>
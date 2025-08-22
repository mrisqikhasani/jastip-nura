@extends('layouts.app')

@section('content')
<section class="min-h-screen flex items-center justify-center bg-gray-50 px-4 py-12">
  <div class="w-full max-w-2xl bg-white rounded-2xl shadow-lg p-8">

    <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Upload Bukti Transfer</h2>

    {{-- RINGKASAN PESANAN --}}
    <div class="bg-gray-100 rounded-lg p-4 mb-8">
      <div class="flex justify-center flex-row items-center text-center gap-2">
        <i class="fa-solid fa-file-invoice text-xl"></i>
        <h3 class="text-lg font-semibold text-gray-700">
          Ringkasan Pesanan
        </h3>
      </div>
      <ul class="text-sm text-gray-700 space-y-2">
        <li><strong>ID Pesanan:</strong> #{{ $order->id_pesanan }}</li>
        <li><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($order->tanggal_pemesanan)->format('d M Y ') }}</li>
        <li><strong>Metode Pembayaran:</strong> {{ strtoupper($order->metode_pembayaran) }}</li>
        <li><strong>Total Pembayaran:</strong>
          <span class="text-secondary font-semibold">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</span>
        </li>
        <li><strong>Transfer ke:</strong> DKI 50212345670 a.n. Jastip Nura</li>
      </ul>
    </div>

    {{-- FORM UPLOAD --}}
    <form action="{{ url("/payment/upload/{$order->id_pesanan}") }}" method="POST" enctype="multipart/form-data"
      class="space-y-6">
      @csrf

      <div>
        <label for="proof" class="block text-sm font-medium text-gray-700 mb-2">Upload Bukti Transfer</label>
        <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 bg-white relative">
          {{-- Preview Area --}}
          <div id="image-preview" class="mb-4 hidden">
            <img src="#" alt="Preview" class="max-h-48 rounded-md shadow-md" />
          </div>

          {{-- Default UI --}}
          <div class="text-center" id="default-upload-text">
            <i class="fa-solid fa-cloud-arrow-up text-6xl mx-auto text-gray-400"></i>
            <p class="mt-2 text-sm text-gray-500">Pilih file atau tarik ke sini</p>
            <label
              class="mt-2 inline-block bg-secondary text-white px-4 py-2 text-sm rounded-lg font-medium cursor-pointer hover:bg-primary">
              Pilih File
              <input type="file" id="proof" name="proof" accept="image/*" class="hidden" required>
            </label>
            <p class="mt-2 text-xs text-gray-400">Format: JPG, PNG - Maks: 10MB</p>
          </div>
        </div>

        @error('proof')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-center">
        <button type="submit"
          class="w-full sm:w-auto bg-secondary gap-2 hover:bg-primary text-white font-medium flex items-center flex-row justify-center px-6 py-3 rounded-lg transition">
          <i class="fa-solid fa-cloud-arrow-up text-xl"></i>Upload Sekarang
        </button>
      </div>
    </form>

    <div class="mt-6 text-center">
      <a href="{{ url('/account/order') }}" class="text-sm text-secondary font-semibold hover:underline">< Kembali ke Riwayat
        Pesanan</a>
    </div>
  </div>
</section>

{{-- JavaScript Preview --}}
<script>
  const fileInput = document.getElementById('proof');
  const previewContainer = document.getElementById('image-preview');
  const previewImage = previewContainer.querySelector('img');
  const defaultText = document.getElementById('default-upload-text');

  fileInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();

      reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewContainer.classList.remove('hidden');
        defaultText.classList.add('hidden');
      }

      reader.readAsDataURL(file);
    } else {
      previewImage.src = "#";
      previewContainer.classList.add('hidden');
      defaultText.classList.remove('hidden');
    }
  });
</script>
@endsection

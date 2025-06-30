<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Jastip Nara</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>

  <section class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">
    <div class="bg-white w-full max-w-xl rounded-3xl shadow-lg p-8 md:p-12 text-center">

      <!-- Success Icon -->
      <div class="flex justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="1.5">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>

      <!-- Headline -->
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mt-6">Pesanan Anda Telah Diterima! 🎉</h1>
      <p class="mt-2 text-gray-600 text-sm md:text-base">Terima kasih,
        <span class="font-semibold text-gray-800">{{ Auth::user()->name }}</span>!
      </p>

      @if ($order->payment_method === 'COD')
      <p class="text-gray-500 text-sm md:text-base mt-2">
      Kami sedang memproses pesanan Anda. Anda dapat memantau statusnya di halaman <strong>Riwayat Pesanan</strong>.
      </p>

      <div class="mt-10">
      <a href="{{ url('/account/order') }}"
        class="bg-violet-900 hover:bg-violet-700 text-white px-6 py-3 rounded-lg font-semibold transition">
        📦 Lihat Riwayat Pesanan
      </a>
      </div>
    @else
      <p class="text-gray-500 text-sm md:text-base mt-2">
      Silakan lakukan pembayaran ke rekening berikut:
      </p>

      <!-- Image -->
      <div class="mt-10">
      <img src="{{ asset('storage/Order-successfully.svg') }}" alt="Order Success" class="w-48 h-48 mx-auto">
      </div>

      <!-- Bank Info -->
      <div class="bg-gray-100 text-left p-4 mt-4 rounded-xl text-sm md:text-base">
      <p><strong>Bank:</strong> BCA</p>
      <p><strong>No. Rekening:</strong> 1234567890</p>
      <p><strong>Atas Nama:</strong> Jastip Nara</p>
      <p class="mt-2 text-red-500 text-sm">* Transfer sesuai total pesanan. Simpan bukti transfer Anda.</p>
      </div>

      <!-- Upload Button -->
      <div class="mt-6 flex flex-col sm:flex-row sm:justify-center gap-4">
      <a href="{{ url('/account/order') }}"
        class="bg-violet-900 hover:bg-violet-700 text-white px-6 py-3 rounded-lg font-semibold transition">
        📦 Lihat Riwayat Pesanan
      </a>
      <a href="{{url('/account') }}"
        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-semibold transition">
        📤 Upload Bukti Transfer
      </a>
      </div>
    @endif

    </div>
  </section>

  @livewireScripts
</body>

</html>
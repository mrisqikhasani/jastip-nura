<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Jastip Nura</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
  <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    poppins: ['Poppins', 'sans-serif'],
                },
                colors: {
                    primary: '#748DAE',
                    secondary: '#555879',
                    hitam: '1b1b1b',
                    oren: '#f05a26',
                    kuning: '#fbbc2a',
                },
            }
        }
    }
  </script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body>
  <section class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">
    <div class="bg-white w-full max-w-xl rounded-3xl border border-gray-300 p-8 md:p-12 text-center">
      <!-- Success Icon -->
      <div class="flex justify-center">
        <i class="fa-solid fa-circle-check text-secondary text-6xl"></i>
      </div>
      <!-- Headline -->
      <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mt-6">Pesanan Anda Telah Diterima</h1>
      <p class="mt-2 text-gray-600 text-sm md:text-base">Terima kasih,
        <span class="font-semibold text-gray-800">{{ Auth::user()->nama_lengkap }}</span>!
      </p>

      @if ($order->metode_pembayaran === 'cod')
      <p class="text-gray-500 text-sm md:text-base mt-2">
      Kami sedang memproses pesanan Anda. Anda dapat memantau statusnya di halaman <strong>Riwayat Pesanan</strong>.
      </p>

      <div class="mt-10">
      <img src="{{ asset('storage/Order-successfully.svg') }}" alt="Order Success" class="w-48 h-48 mx-auto">
      </div>

      <div class="mt-10">
      <a href="{{ url('/account/order/'.$order->id_pesanan) }}"
        class="bg-secondary hover:bg-primary text-white px-6 py-3 rounded-lg font-medium transition flex flex-row items-center justify-center gap-3">
        <i class="fa-solid fa-file-invoice text-lg"></i>Lihat Riwayat Pesanan
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
      <p><strong>Bank:</strong>         DKI</p>
      <p><strong>No. Rekening:</strong> 50212345670</p>
      <p><strong>Atas Nama:</strong>    Jastip Nura</p>
      <p class="mt-2 text-red-500 text-sm">* Transfer sesuai total pesanan. Simpan bukti transfer Anda.</p>
      </div>

      <!-- Upload Button -->
      <div class="mt-6 flex flex-col sm:flex-row sm:justify-center gap-4">
      <a href="{{ url('/account/order/'.$order->id_pesanan) }}"
        class="bg-secondary hover:bg-primary text-white px-6 py-3 rounded-lg font-medium transition flex items-center flex-row justify-center">
        <i class="fa-solid fa-file-invoice text-xl"></i>Lihat Riwayat Pesanan
      </a>
      <a href="{{url('/payment/upload/'.$order->id_pesanan) }}"
        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg font-medium transition flex items-center flex-row justify-center">
        <i class="fa-solid fa-cloud-arrow-up text-xl"></i>Upload Bukti Transfer
      </a>
      </div>
    @endif
    </div>
  </section>
  @livewireScripts
</body>
</html>
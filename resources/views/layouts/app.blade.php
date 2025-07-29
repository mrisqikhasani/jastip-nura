<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jastip Nura</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            font-family: 'Poppins';
        }
    </style>
</head>

<body x-data="{ desktopMenuOpen: false, mobileMenuOpen: false}">
    {{-- NAVBAR tampil jika tidak ada section no-navbar --}}
    @hasSection('no-navbar')
        {{-- Skip navbar --}}
    @else
        @include('layouts.partials.navbar')
    @endif

    <main>
        @yield('content')
    </main>

    {{-- FOOTER tampil jika tidak ada section no-footer --}}
    @hasSection('no-footer')
        {{-- Skip footer --}}
    @else
        @include('layouts.partials.footer')
    @endif

    @yield('scripts')
    @livewireScripts
</body>

</html>
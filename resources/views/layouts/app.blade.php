<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jastip Nara</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- <link rel="icon" type="image/x-icon" href="{{ asset('storage/favicon.ico') }}"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body x-data="{ desktopMenuOpen: false, mobileMenuOpen: false}">
    <!-- navbar -->
    @include('layouts.partials.navbar')


    <main >
        @yield('content')

    </main>

    @include('layouts.partials.footer')

    @yield('scripts')
    @livewireScripts
</body>

</html>
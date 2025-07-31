<header class="mx-auto flex h-16 max-w-[1200px] items-center justify-between px-5">
    <a href="index.html">
        <img class="cursor-pointer w-12" src="{{ asset('storage/logo.svg') }}" alt="company logo" />
    </a>

    <div class="md:hidden">
        <button @click="mobileMenuOpen = ! mobileMenuOpen">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-8 w-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>
    </div>

    <div class="hidden gap-3 md:!flex"> 
        <a href="{{ url('/cart') }}" class="flex cursor-pointer flex-col items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                <path fill-rule="evenodd"
                    d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                    clip-rule="evenodd" />
            </svg>

            <p class="text-xs">Keranjang</p>
        </a>

        <a href="{{ url('/account') }}" class="relative flex cursor-pointer flex-col items-center justify-center">
            <span class="absolute bottom-[33px] right-1 flex h-2 w-2">
                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                <span class="relative inline-flex h-2 w-2 rounded-full bg-red-500"></span>
            </span>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
            </svg>

            <p class="text-xs">Akun</p>
        </a>
    </div>
</header>
<!-- /Header -->

<!-- Burger menu  -->
<section x-show="mobileMenuOpen" @click.outside="mobileMenuOpen = false"
    class="absolute left-0 right-0 z-50 h-screen w-full bg-white" style="display: none">
    <div class="mx-auto">
        <div class="mx-auto flex w-full justify-center gap-3 py-4">>
            <a href="{{ url('/cart') }}" class="{flex cursor-pointer flex-col items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                    <path fill-rule="evenodd"
                        d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z"
                        clip-rule="evenodd" />
                </svg>

                <p class="text-xs">Keranjang</p>
            </a>

            <a href="{{ url('/account') }}" class="relative flex cursor-pointer flex-col items-center justify-center">
                <span class="absolute bottom-[33px] right-1 flex h-2 w-2">
                    <span
                        class="absolute inline-flex h-full w-full animate-ping rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-red-500"></span>
                </span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>

                <p class="text-xs">Akun</p>
            </a>
        </div>

        <ul class="text-center font-medium">
            <li class="py-2"><a href="{{ url('/') }}">Beranda</a></li>
            <li class="py-2"><a href="{{ url('/catalog') }}">Katalog</a></li>
            <li class="py-2"><a href="about-us.html">Tentang Kami</a></li>
            <li class="py-2"><a href="contact-us.html">Kontak Kami</a></li>
        </ul>
    </div>
</section>
<!-- /Burger menu  -->

<!-- Nav bar -->
<!-- hidden on small devices -->

<nav class="relative bg-primary">
    <div class="mx-auto hidden h-12 w-full max-w-[1200px] items-center md:flex">
        

        <div class="mx-7 flex gap-8">
            <a class="font-medium duration-100 transition-all ease-in hover:text-black {{ request()->is('/') ? 'text-black' : 'text-white' }}"
            href="{{ url('/') }}">Beranda</a>
            <a class="font-medium duration-100 transition-all ease-in hover:text-black {{ request()->is('catalog') ? 'text-black' : 'text-white' }}"
            href="{{ url('/catalog') }}">Katalog</a>
            <a class="font-medium duration-100 transition-all ease-in hover:text-black {{ request()->is('about-us') ? 'text-black' : 'text-white' }}"
            href="{{ url('/about-us') }}">Tentang Kami</a>
        </div>

        @if(auth()->check())
        <div class="ml-auto flex gap-4 px-5">
            <form method="POST" action="{{ url('/logout') }}">
            @csrf
            <button type="submit" class="font-medium text-white duration-100 transition-all ease-in hover:text-black">
                Keluar
            </button>
            </form>
        </div>
        @else
        <div class="ml-auto flex gap-4 px-5">
            <a class="font-medium text-white duration-100 transition-all ease-in hover:text-black"
            href="{{ url('/login') }}">Masuk</a>
            <span class="text-white">&#124;</span>
            <a class="font-medium text-white duration-100 transition-all ease-in hover:text-black" href="{{ url('/signup') }}">Daftar</a>
        </div>
        @endif
    </div>
</nav>
<!-- /Nav bar -->


<!-- /Menu  -->
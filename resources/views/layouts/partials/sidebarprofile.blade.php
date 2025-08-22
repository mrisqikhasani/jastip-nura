<!-- breadcrumbs  -->
<nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
    <ul class="flex items-center">
        <li class="cursor-pointer">
            <a href="index.html">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path
                        d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path
                        d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
            </a>
        </li>
        <li>
            <span class="mx-2 text-gray-500">&gt;</span>
        </li>
        <li class="text-gray-500">Akun</li>
    </ul>
</nav>
</div>

<section class="container mx-auto w-full flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
    <section class="hidden w-[300px] flex-shrink-0 px-4 lg:block">
        <div class="border-b py-5">
            <div class="flex items-center">
                <img width="40px" height="40px" class="rounded-full object-cover" src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : asset('storage/placeholder-img.svg') }}"
                    alt="User Profile" />
                <div class="ml-5">
                    <p class="font-medium text-gray-500">Halo,</p>
                    <p class="font-bold">{{ $user->nama_lengkap }}</p>
                </div>
            </div>
        </div>

        <div class="flex border-b py-5">
            <div class="w-full">
                <div class="flex w-full">
                    <div class="flex flex-col gap-2">
                        <a href="{{ url('/account') }}" class="flex items-center gap-2 font-medium {{ request()->is('account') ? 'text-secondary' : ' hover:text-secondary' }}">
                            <i class="fa-solid fa-id-card text-lg"></i>
                            Manajemen Akun</a>
                        <a href="{{ url('/account/profile') }}" class="{{ request()->is('account/profile') ? 'text-primary' : 'hover:text-secondary' }}">Informasi Profil</a>
                        <a href="{{ url('/account/address') }}"class="{{ request()->is('account/address') ? 'text-primary' : 'hover:text-secondary'}}">Ubah Alamat</a>
                        <a href="{{ url('/account/change-password') }}" class="{{ request()->is('account/change-password') ? 'text-primary' : 'hover:text-secondary'}}">Ubah Password</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex border-b py-5">
            <div class="flex w-full">
                <div class="flex flex-col gap-2">
                    <a href="{{ url("/account/order") }}"
                        class="flex items-center gap-2 font-medium {{ request()->is('account/order') ? 'text-secondary' : ' hover:text-secondary' }}">
                        <i class="fa-solid fa-receipt text-lg"></i>
                        Riwayat Pesanan</a>
                </div>
            </div>
        </div>

        <div class="flex py-5">
            <div class="flex w-full">
                <div class="flex flex-col gap-2">
                    <form method="POST" action="{{ url('/logout') }}"
                        class="flex items-center gap-2 font-medium active:text-violet-900">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 font-medium {{ request()->is('logout') ? 'text-secondary' : ' hover:text-secondary' }}">
                            <i class="fa-solid fa-door-open text-lg"></i>
                            Keluar
                        </button>
                    </form>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- /sidebar  -->
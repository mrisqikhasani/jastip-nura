@extends('layouts.app')


@section('content')
  <!-- Offer image  -->

  <div class="relative">
    <img class="w-full object-cover brightness-50 filter lg:h-[500px]" src="storage/header-bg.jpeg"
    alt="Living room image" />

    <div
    class="absolute top-1/2 left-1/2 mx-auto max-w-[1200px] -translate-x-1/2  flex-col text-center lg:ml-4 ">
    <h1 class="text-4xl font-bold sm:text-5xl lg:text-left text-white">
      Best Collection for Home decoration
    </h1>
    <p class="pt-3 text-xs lg:w-3/5 lg:pt-5 lg:text-left lg:text-base">
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur
      aperiam natus, nulla, obcaecati nesciunt, itaque adipisci earum
      ducimus pariatur eaque labore.
    </p>
    <button
      class="mx-auto mt-5 w-1/2 bg-amber-400 px-3 py-1 text-black duration-100 hover:bg-yellow-300 lg:mx-0 lg:h-10 lg:w-2/12 lg:px-10">
      Order Now
    </button>
    </div>
  </div>


  <!-- /Offer image  -->

  <!-- Cons bages -->

  <section class="container mx-auto my-8 flex flex-col justify-center gap-3 lg:flex-row">
    <!-- 1 -->

    <div class="mx-5 flex flex-row items-center justify-center border-2 border-yellow-400 py-4 px-5">
    <div class="">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="h-6 w-6 text-violet-900 lg:mr-2">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
      </svg>
    </div>

    <div class="ml-6 flex flex-col justify-center">
      <h3 class="text-left text-xs font-bold lg:text-sm">Money returns</h3>
      <p class="text-light text-left text-xs lg:text-sm">
      Terserah kata2nya mau apa
      </p>
    </div>
    </div>

    <!-- 2 -->

    <div class="mx-5 flex flex-row items-center justify-center border-2 border-yellow-400 py-4 px-5">
    <div class="">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="h-6 w-6 text-violet-900 lg:mr-2">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
      </svg>
    </div>

    <div class="ml-6 flex flex-col justify-center">
      <h3 class="text-left text-xs font-bold lg:text-sm">Money returns</h3>
      <p class="text-light text-left text-xs lg:text-sm">
      Terserah kata2nya mau apa
      </p>
    </div>
    </div>

    <!-- 3 -->

    <div class="mx-5 flex flex-row items-center justify-center border-2 border-yellow-400 py-4 px-5">
    <div class="">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
      class="h-6 w-6 text-violet-900 lg:mr-2">
      <path stroke-linecap="round" stroke-linejoin="round"
        d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
      </svg>
    </div>

    <div class="ml-6 flex flex-col justify-center">
      <h3 class="text-left text-xs font-bold lg:text-sm">Money returns</h3>
      <p class="text-light text-left text-xs lg:text-sm">
      Terserah kata2nya mau apa
      </p>
    </div>
    </div>
  </section>



  <p class="mx-auto mt-10 mb-5 max-w-[1200px] px-5">RECOMMENDED FOR YOU</p>

  <!-- Recommendations -->
  <section class="mx-auto grid max-w-[1200px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-4">

    @for($i = 0; $i < 8; $i++)
    <!-- 8 -->

    <div class="flex flex-col">
    <div class="relative flex">
      <img class="" src="storage/product-bigsofa.png" alt="sofa image" />
      <div
      class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100">
      <a href="product-overview.html">
      <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>
      </span>
      </a>
      <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
      <path
        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
      </svg>
      </span>
      </div>

      <div class="absolute right-1 mt-3 flex items-center justify-center bg-amber-400">
      <p class="px-2 py-2 text-sm">&minus; 25&percnt; OFF</p>
      </div>
    </div>

    <div>
      <p class="mt-2">WHITE SOFA</p>
      <p class="font-medium text-violet-900">
      $45.00
      <span class="text-sm text-gray-500 line-through">$500.00</span>
      </p>

      <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-yellow-400">
      <path fill-rule="evenodd"
      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
      clip-rule="evenodd" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-yellow-400">
      <path fill-rule="evenodd"
      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
      clip-rule="evenodd" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-yellow-400">
      <path fill-rule="evenodd"
      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
      clip-rule="evenodd" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-yellow-400">
      <path fill-rule="evenodd"
      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
      clip-rule="evenodd" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4 text-gray-200">
      <path fill-rule="evenodd"
      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
      clip-rule="evenodd" />
      </svg>
      <p class="text-sm text-gray-400">(38)</p>
      </div>

      <div>
      <button class="my-5 h-10 w-full bg-violet-900 text-white">
      Add to cart
      </button>
      </div>
    </div>
    </div>
    @endfor


  </section>
  <!-- /Recommendations -->
@endsection
@extends('layouts.app')


@section('content')

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

    <li class="text-gray-500">{{ $product->name }}</li>
    </ul>
  </nav>
  <!-- /breadcrumbs  -->
  </div>

  <section class="container flex-grow mx-auto max-w-[1200px] border-b py-5 lg:grid lg:grid-cols-2 lg:py-10">
    <!-- image gallery -->

    <div class="container mx-auto px-4">
    <img class="w-full" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />

    <!-- /image gallery  -->
    </div>

    <!-- description  -->

    <div class="mx-auto px-5 lg:px-5">
    <h2 class="pt-3 text-3xl font-bold lg:pt-0">{{ $product->name }}</h2>

    <p class="font-bold mt-12">
      Category: <span class="font-normal">{{ $product->category }}</span>
    </p>

    <p class="mt-4 text-4xl font-bold text-violet-900">
      Rp{{ number_format($product->price) }} <span
      class="text-xs text-gray-400 line-through">{{ number_format(5000) }}</span>
    </p>

    <p class="pt-5 text-sm leading-5 text-gray-500">
      {{ $product->description }}
    </p>

    <div class="mt-6">
      <p class="pb-2 text-xs text-gray-500">Quantity</p>

      <div class="flex">
      <button
        class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
        id="btnMinusQtyProductDetail">
        &minus;
      </button>
      <div name="qtyProductDetail"
        class="flex h-8 w-8 cursor-text items-center justify-center border-t border-b active:ring-gray-500">
        1
      </div>
      <button
        class="flex h-8 w-8 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
        id="btnPlusQtyProductDetail">
        &#43;
      </button>
      </div>
    </div>

    <div class="add-to-cart mt-7 flex flex-row items-center gap-6">
      <input type="hidden" name="quantity" id="qtyInputHidden" value="1">
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <button
      class="add-to-cart flex h-12 w-full items-center justify-center bg-violet-900 text-white duration-100 hover:bg-blue-800"
      type="button" data-product-id="{{ $product->id }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="mr-3 h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
      </svg>
      Add to cart
      </button>

    </div>
    </div>
  </section>

  <!-- /description  -->

  <p class="mx-auto mt-10 mb-5 max-w-[1200px] px-5">RELATED PRODUCTS</p>

  <!-- Recommendations -->
  <section class="container mx-auto grid max-w-[1200px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-4">
    <!-- 1 -->

    <div class="relative flex flex-col">
    <div class="absolute flex h-1/2 w-full justify-center gap-3 pt-16 opacity-0 duration-150 hover:opacity-100">
      <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>
      </span>
      <span class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
        <path
        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
      </svg>
      </span>
    </div>
    <img class="" src="./assets/images/product-chair.png" alt="sofa image" />

    <div>
      <p class="mt-2">CHAIR</p>
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

    <!-- 2 -->

    <div class="flex flex-col">
    <img class="" src="./assets/images/product-sofa.png" alt="sofa image" />

    <div>
      <p class="mt-2">SOFA</p>
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

    <!-- 3 -->

    <div class="flex flex-col">
    <img class="" src="./assets/images/kitchen.png" alt="sofa image" />

    <div>
      <p class="mt-2">GUYER KITCHEN</p>
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

    <!-- 4 -->

    <div class="flex flex-col">
    <img class="" src="./assets/images/living-room.png" alt="sofa image" />

    <div>
      <p class="mt-2">GUYER ROOM</p>
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
  </section>
  <!-- /Recommendations -->

@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
    const minusBtn = document.getElementById('btnMinusQtyProductDetail');
    const plusBtn = document.getElementById('btnPlusQtyProductDetail');
    const qtyDisplay = document.querySelector('[name="qtyProductDetail"]');
    const qtyHiddenInput = document.getElementById('qtyInputHidden');

    let qty = 1;

    function updateQtyDisplay() {
      qtyDisplay.textContent = qty;
      qtyHiddenInput.value = qty;
    }

    plusBtn.addEventListener('click', function () {
      qty++;
      updateQtyDisplay();
    });

    minusBtn.addEventListener('click', function () {
      if (qty > 1) {
      qty--;
      updateQtyDisplay();
      }
    });

    updateQtyDisplay();

    document.addEventListener('click', function (e) {
      if (e.target && e.target.classList.contains('add-to-cart')) {
      const button = e.target;
      const productId = button.dataset.productId;

      // Optional: disable button while processing
      button.disabled = true;
      button.innerText = 'Adding...';

      fetch("{{ url('/cart') }}", {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
        product_id: productId,
        quantity: parseInt(document.getElementById('qtyInputHidden').value)
        })
      })
        .then(response => response.json())
        .then(data => {
        console.log(data);
        alert(data.message || 'Product added!');
        })
        .catch(error => {
        console.error(error);
        alert('Error adding to cart.: ', error);
        })
        .finally(() => {
        button.disabled = false;
        button.innerText = 'Add to cart';
        });
      }
    });

    });
  </script>

@endsection
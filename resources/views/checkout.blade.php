@extends('layouts.app')

@section('content')


  <!-- breadcrumbs  -->

  <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
    <ul class="flex items-center">
    <li class="cursor-pointer">
      <a href="{{ url("/") }}">
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

    <li class="text-gray-500">Checkout</li>
    </ul>
  </nav>  
  <!-- /breadcrumbs  -->
  </div>
  <div class="flex-grow">
    <!-- <section class="container mx-auto max-w-[1200px] py-5 lg:flex lg:flex-row lg:py-10">
      <h2 class="mx-auto px-5 text-2xl font-bold md:hidden">
        Checkout Review
      </h2> -->
    <!-- form  -->
    <!-- <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
      <table class="hidden lg:table">
      <thead class="h-16 bg-neutral-100">
        <tr>
        <th>ADDRESS</th>
        <th>DELIVERY METHOD</th>
        <th>PAYMENT METHOD</th>
        <th class="bg-neutral-600 text-white">ORDER REVIEW</th>
        </tr>
      </thead>
      </table> -->

      <!-- Product table  -->

      <!-- <table class="mt-3 hidden w-full lg:table">
      <thead class="h-16 bg-neutral-100">
        <tr>
        <th>ITEM</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>TOTAL</th>
        </tr>
      </thead>
      <tbody>


        <tr class="h-[100px] border-b">
        <td class="align-middle">
          <div class="flex">
          <img class="w-[90px]" src="./assets/images/bedroom.png" alt="bedroom image" />
          <div class="ml-3 flex flex-col justify-center">
            <p class="text-xl font-bold">ITALIAN BED</p>
            <p class="text-sm text-gray-400">Size: XL</p>
          </div>
          </div>
        </td>
        <td class="mx-auto text-center">&#36;320</td>
        <td class="text-center align-middle">1</td>
        <td class="mx-auto text-center">&#36;320</td>
        </tr>

        

        <tr class="h-[100px] border-b">
        <td class="align-middle">
          <div class="flex">
          <img class="w-[90px]" src="./assets/images/product-chair.png" alt="Chair Image" />
          <div class="ml-3 flex flex-col justify-center">
            <p class="text-xl font-bold">GUYER CHAIR</p>
            <p class="text-sm text-gray-400">Size: XL</p>
          </div>
          </div>
        </td>
        <td class="mx-auto text-center">&#36;320</td>
        <td class="text-center align-middle">1</td>
        <td class="mx-auto text-center">&#36;320</td>
        </tr>
      </tbody>
      </table> -->

      @livewire('checkout-page')
      <!-- <div class="flex w-full items-center justify-between">
      <a href="catalog.html" class="hidden text-sm text-violet-900 lg:block">&larr; Back to the shop</a>

      <div class="mx-auto flex justify-center gap-2 lg:mx-0">
        <a href="checkout-payment.html" class="bg-purple-900 px-4 py-2 text-white">Previous step</a>

        <a href="checkout-confirmation.html" class="bg-amber-400 px-4 py-2">Place Order</a>
      </div>
      </div> -->
    </section>
    <!-- /form  -->

    <!-- Summary  -->

    <!-- <section class="mx-auto w-full px-4 md:max-w-[400px]">
      <div class="">
      <div class="border py-5 px-4 shadow-md">
        <p class="font-bold">ORDER SUMMARY</p>

        <div class="flex justify-between border-b py-5">
        <p>Subtotal</p>
        <p>$1280</p>
        </div>

        <div class="flex justify-between border-b py-5">
        <p>Shipping</p>
        <p>Free</p>
        </div>

        <div class="flex justify-between py-5">
        <p>Total</p>
        <p>$1280</p>
        </div>
      </div>
      </div>
    </section> -->
    </section>

    <!-- /Summary -->

  @endsection
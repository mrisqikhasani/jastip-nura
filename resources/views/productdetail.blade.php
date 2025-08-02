@extends('layouts.app')
@section('content')
  <!-- breadcrumbs  -->
  <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
    <ul class="flex items-center">
    <li class="cursor-pointer">
      <a href="/catalog">
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

  <section class="container mx-auto max-w-[1200px] border-b py-5 flex flex-row lg:py-10">
    <!-- image gallery -->
    <div class="px-5">
    <img class="w-80 rounded-lg" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" />
    </div>

    <!-- description  -->

    <div class="ml-5">
    <h2 class="pt-3 text-3xl font-bold lg:pt-0">{{ $product->name }}</h2>

    <p class="font-medium mt-2">
      Kategori: <span class="font-normal">{{ $product->category }}</span>
    </p>

    <p class="mt-2 text-xl font-semibold text-secondary">
      Rp{{ number_format($product->price) }} 
    </p>

    <p class="mt-2 text-sm leading-5 text-gray-500">
      {{ $product->description }}
    </p>

    <div class="mt-3">
      <div class="flex">
      <button
        class="rounded-l-lg flex h-12 w-12 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
        id="btnMinusQtyProductDetail">
        &minus;
      </button>
      <div name="qtyProductDetail"
        class="flex h-12 w-12 cursor-text items-center justify-center border-t border-b active:ring-gray-500">
        1
      </div>
      <button
        class="rounded-r-lg flex h-12 w-12 cursor-pointer items-center justify-center border duration-100 hover:bg-neutral-100 focus:ring-2 focus:ring-gray-500 active:ring-2 active:ring-gray-500"
        id="btnPlusQtyProductDetail">
        &#43;
      </button>
      </div>
    </div>

    <div class="add-to-cart mt-3 flex flex-row items-center gap-6">
      <input type="hidden" name="quantity" id="qtyInputHidden" value="1">
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <button
      class="add-to-cart font-medium text-sm px-4 flex h-12 rounded-lg items-center justify-center bg-secondary text-white duration-100 trasition-all ease-in hover:bg-primary"
      type="button" data-product-id="{{ $product->id }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="mr-3 h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
      </svg>
      Tambah ke Keranjang
      </button>

    </div>
    </div>
  </section>
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
      button.innerText = 'Menambahkan...';

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
        Swal.fire({
          title: "Berhasil",
          text: "Produk berhasil ditambahkan ke keranjang!",
          icon: "success"
        });
        })
        .catch(error => {
        console.error(error);
        Swal.fire({
          title: "Gagal",
          text: "Gagal saat menambahkan produk",
          icon: "error"
        });
        })
        .finally(() => {
        button.disabled = false;
        button.innerText = 'Tambah ke Keranjang';
        });
      }
    });

    });
  </script>

@endsection
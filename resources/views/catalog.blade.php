@extends('layouts.app')
@section('content')
  <!-- breadcrumbs  -->
  <nav class="mx-auto w-full mt-4 max-w-[1200px] px-5">
    <ul class="flex items-center">
    <li class="cursor-pointer">
      <a href={{ url('/') }}>
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
    <li class="text-gray-500">Katalog</li>
    </ul>
  </nav>
  <!-- /breadcrumbs  -->
  </div>

  <section class="container mx-auto flex-grow max-w-[1200px] border-b py-5 lg:flex lg:flex-row lg:py-10">
    <!-- sidebar  -->
    <section class="hidden w-[300px] flex-shrink-0 px-4 lg:block">
    <div id="filters-category">
      <div class="flex border-b pb-5">
      <div class="w-full">
        <p class="mb-3 font-medium">Kategori</p>

        @foreach($categories as $category)
      <div class="flex w-full justify-between">
      <div class="flex justify-center items-center">
        <input type="checkbox" class="accent-secondary" id="{{ $category }}" value="{{ $category }}" />
        <p class="ml-4">{{ ucfirst($category) }}</p>
      </div>
      <div>
        <p class="text-gray-500">
        ({{ $categoryCounts[$category] ?? 0 }})
        </p>
      </div>
      </div>
      @endforeach


      </div>
      </div>

    </section>
    <!-- /sidebar  -->

    <div class="flex-grow px-4 w-full">
    <div class="mb-5 flex items-center justify-between px-5">
      <form class="hidden h-9 rounded-full flex-grow items-center border md:flex max-w-md">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="mx-3 h-4 w-4 text-gray-500">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>
      <input class="hidden text-sm outline-none md:block" type="search" placeholder="Cari produk..."
        id="searchProduct" />
      <button class="ml-auto rounded-full h-full bg-secondary px-4 text-white font-medium text-sm hover:bg-primary">
        Cari
      </button>
      </form>
    </div>

    <section class="mx-auto grid max-w-[1200px] min-h-[400px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-3"
      id="product-wrapper">
      <!-- catalog product -->
      <div id="not-found"
      class="hidden col-span-full text-center flex flex-col items-center justify-center text-gray-500 py-10">
      <img src="storage/not-found.svg" class="w-80 mb-10" />
      <p>Tidak ada produk yang sesuai.</p>
      </div>
    </section>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    // value form variael php to js
    const products = @json($products);

    console.log(products);

    const productWrapper = document.getElementById('product-wrapper');
    const filtersCategory = document.getElementById('filters-category');
    const checkboxes = filtersCategory.querySelectorAll('input[type="checkbox"]');
    // const notFound = document.getElementById('not-found');
    const searchProduct = document.getElementById('searchProduct');

    // const products = [];

    const productElements = [];

    // Format number to IDR currency
    function formatIDR(amount) {
    return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
    }

    const createProductElement = (product) => {
    const productElement = document.createElement('div');
    productElement.className = 'item space-y-2';

    // GUNAKAN innerHTML agar HTML di-parse dengan benar
    productElement.innerHTML = `
    <div class="flex flex-col shadow-xl hover:shadow-2xl rounded-2xl px-4 py-4">
      <div class="relative flex">
      <input type="hidden" value=${product.id}>
      <div class="aspect-square overflow-hidden rounded-xl w-full">
      <img src="storage/${product.image}" alt="${product.name} image" class="w-full h-full object-cover" />
      </div>
      <div class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100">
      <a href="/product/${product.id}" class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full text-white bg-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" class="h-4 w-4">
      <path stroke-linecap="round" stroke-linejoin="round"
      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>
      </a>
      </div>

      <div class="absolute rounded-xl right-2 mt-3 flex items-center justify-center bg-secondary text-white text-sm rounded-sm">
      <p class="px-2 py-2 text-sm">${product.category}</p>
      </div>
      </div>

      <div>
      <p class="mt-2 font-semibold">${product.name}</p>
      <p class="font-medium text-secondary text-sm">
      ${formatIDR(product.price)}
      </p>

      <div>
      <button class="add-to-cart font-medium mt-2 rounded-lg duration-100 transition-all ease-in h-10 w-full bg-secondary hover:bg-primary text-white" data-product-id="${product.id}">Tambah ke Keranjang</button>
      </div>
      </div>
    </div>
    `;

    return productElement;
    };

    products.forEach((product) => {
    if (!product.name) return;
    const productElement = createProductElement(product);
    productWrapper.appendChild(productElement);
    productElements.push(productElement);
    });


    filtersCategory.addEventListener('change', filterProducts);
    searchProduct.addEventListener('input', filterProducts);

    function filterProducts() {
    const searchTerm = searchProduct.value.trim().toLowerCase();
    const checkedCategories = Array.from(checkboxes)
      .filter((check) => check.checked)
      .map((check) => check.value);

    let hasVisible = false;

    productElements.forEach((productElement, index) => {
      const product = products[index];
      const matchesSearch = product.name.toLowerCase().includes(searchTerm);
      const matchesCategory = checkedCategories.length === 0 || checkedCategories.includes(product.category);

      if (matchesSearch && matchesCategory) {
      productElement.classList.remove('hidden');
      hasVisible = true;
      } else {
      productElement.classList.add('hidden');
      }
    });

    const notFound = document.getElementById('not-found');
    if (!hasVisible) {
      notFound.classList.remove('hidden');
    } else {
      notFound.classList.add('hidden');
    }
    }


    document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('add-to-cart')) {
      const button = e.target;
      const productId = button.dataset.productId;

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
        quantity: 1
      })
      })
      .then(async response => {
        const data = await response.json();

        if (response.ok && data.success) {
        Swal.fire({
          title: "Berhasil",
          text: data.message ?? "Produk berhasil ditambahkan ke keranjang!",
          icon: "success",
          confirmButtonColor: "#555879"
        });
        } else if (response.status === 401) {
        Swal.fire({
          title: "Belum Login",
          text: "Silakan login terlebih dahulu untuk menambahkan ke keranjang.",
          icon: "warning"
        });
        } else if (response.status === 422) {
        Swal.fire({
          title: "Validasi Gagal",
          text: data.message ?? "Periksa kembali data input.",
          icon: "error"
        });
        } else {
        Swal.fire({
          title: "Gagal",
          text: data.message ?? "Terjadi kesalahan saat menambahkan produk.",
          icon: "error"
        });
        }
      })
      .catch(error => {
        console.error(error);
        Swal.fire({
        title: "Gagal",
        text: "Terjadi kesalahan tak terduga.",
        icon: "error"
        });
      })
      .finally(() => {
        button.disabled = false;
        button.innerText = 'Tambah ke keranjang';
      });
    }
    });


  </script>
@endsection
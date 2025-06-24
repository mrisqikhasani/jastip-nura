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

    <li class="text-gray-500">Catalog</li>
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
        <p class="mb-3 font-medium">CATEGORIES</p>

       @foreach($categories as $category)
        <div class="flex w-full justify-between">
          <div class="flex justify-center items-center">
              <input type="checkbox" id="{{ $category }}" value="{{ $category }}" />
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

    <div>
    <div class="mb-5 flex items-center justify-between px-5">
      <div class="flex gap-3">
      <button class="flex items-center justify-center border px-6 py-2">
        Sort by
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="mx-2 h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </button>

      <button class="flex items-center justify-center border px-6 py-2 md:hidden">
        Filters
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="mx-2 h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
      </button>
      </div>

      <form class="hidden h-9 w-2/5 items-center border md:flex">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="mx-3 h-4 w-4">
        <path stroke-linecap="round" stroke-linejoin="round"
        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>

      <input class="hidden w-11/12 outline-none md:block" type="search" placeholder="Search" id="searchProduct" />

      <button class="ml-auto h-full bg-amber-400 px-4 hover:bg-yellow-300">
        Search
      </button>
      </form>

    </div>

    <section class="mx-auto grid max-w-[1200px] min-h-[700px] grid-cols-2 gap-3 px-5 pb-10 lg:grid-cols-3"
      id="product-wrapper">

      <!-- catalog product -->
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

    const createProductElement = (product) => {
    const productElement = document.createElement('div');
    productElement.className = 'item space-y-2';

    // GUNAKAN innerHTML agar HTML di-parse dengan benar
    productElement.innerHTML = `
    <div class="flex flex-col">
      <div class="relative flex">
      <input type="hidden" value=${product.id}>
      <img class="" src="storage/${product.image}" alt="${product.name} image" />
      <div class="absolute flex h-full w-full items-center justify-center gap-3 opacity-0 duration-150 hover:opacity-100">
      <a href="product-overview.html" class="flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-amber-400">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
      stroke="currentColor" class="h-4 w-4">
      <path stroke-linecap="round" stroke-linejoin="round"
      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
      </svg>
      </a>
      </div>

      <div class="absolute right-1 mt-3 flex items-center justify-center bg-amber-400">
      <p class="px-2 py-2 text-sm">${product.category}</p>
      </div>
      </div>

      <div>
      <p class="mt-2">${product.name.toUpperCase()}</p>
      <p class="font-medium text-violet-900">
      $${product.price}
      <span class="text-sm text-gray-500 line-through">$500.00</span>
      </p>

      <!-- Stars + review count -->
      <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
      class="h-4 w-4 text-yellow-400">
      <path fill-rule="evenodd"
      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
      clip-rule="evenodd" />
      </svg>
      <!-- tambahkan lebih banyak bintang sesuai kebutuhan -->
      <p class="text-sm text-gray-400">(38)</p>
      </div>

      <div>
      <button class="add-to-cart my-5 h-10 w-full bg-violet-900 text-white" data-product-id="${product.id}">Add to cart</button>
      </div>
      </div>
    </div>
    `;

    return productElement;
    };

    let hasValidProduct = false;

    products.forEach((product) => {
    if (!product.name) return;
    const productElement = createProductElement(product);
    productWrapper.appendChild(productElement);
    productElements.push(productElement); 
    hasValidProduct = true;
    });


    // if (!hasValidProduct) {
    //     productWrapper.classList.add('hidden');
    //     notFound.classList.remove('hidden');
    // } else {
    //     productWrapper.classList.remove('hidden');
    //     notFound.classList.add('hidden');
    // }

    filtersCategory.addEventListener('change', filterProducts);
    searchProduct.addEventListener('input', filterProducts);


    function filterProducts() {
    // Get search term
    const searchTerm = searchProduct.value.trim().toLowerCase();
    // Get checked categories

    const categories = ['atasan', 'skincare', 'bodycare', 'flatshoes'];

    const checkedCategories = Array.from(checkboxes)
      .filter((check) => check.checked && categories.includes(check.value))
      .map((check) => check.value);


    productElements.forEach((productElement, index) => {
      const product = products[index];

      const matchesSearchTerm = product.name.toLowerCase().includes(searchTerm);
      const matchesCategory = checkedCategories.length === 0 || checkedCategories.includes(product
      .category);
      // const matchesRegion = checkedRegions.length === 0 || checkedRegions.includes(product.region);

      // if (matchesSearchTerm && matchesCategory && matchesRegion) {
      if (matchesCategory && matchesSearchTerm) {
      productElement.classList.remove('hidden');
      } else {
      productElement.classList.add('hidden');
      }
    });
    }

    
  document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('add-to-cart')) {
      const button = e.target;
      const productId = button.dataset.productId;

      // Optional: disable button while processing
      button.disabled = true;
      button.innerText = 'Adding...';

      fetch("{{ url('/cart') }}", {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          product_id: productId,
          quantity: 1  
        })
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
        alert(data.message || 'Product added!');
      })
      .catch(error => {
        console.error(error);
        alert('Error adding to cart.');
      })
      .finally(() => {
        button.disabled = false;
        button.innerText = 'Add to cart';
      });
    }
  });

  </script>
@endsection
@extends('layouts.app')

@section('content')

  @include('layouts.partials.sidebarprofile')
  <!-- form  -->
  <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">
    <div class="py-5">
    <div class="w-full">
      @if (session('success'))
      <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
      {{ session('success') }}
      </div>
    @endif

      @if (session('error'))
      <div class="mb-4 rounded bg-red-100 px-4 py-3 text-red-800">
      {{ session('error') }}
      </div>
    @endif


      <h2 class="text-lg font-bold mb-4">Foto Profil</h2>
      <div class="mx-auto mb-5 flex flex-col items-center bg-gray-100 p-5 rounded-lg lg:mx-0 lg:w-1/2">
      <img class="h-20 w-20 rounded-full mb-4" src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('storage/placeholder-img.svg') }}" alt="User avatar" />

      <form method="POST" action="{{ url('/account/profile/avatar') }}" enctype="multipart/form-data"
        class="w-full flex flex-col items-center">
        @csrf
        @method('PUT')

        <label class="block w-full">
        <span class="sr-only">Pilih foto</span>
        <input type="file" name="profile_picture"
          class="w-full border border-primary rounded-lg text-sm font-medium text-gray-700 outline-none file:rounded-lg file:mr-4 file:text-sm file:bg-primary file:text-white file:py-2 file:px-4 file:font-medium file:border-none" 
          accept=".jpg, .jpeg, .png"
          />
        </label>

        @error('avatar')
      <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
      @enderror

        <button type="submit" class="mt-6 bg-secondary px-3 py-2 text-sm text-white font-medium hover:bg-primary transition rounded-lg">
          Simpan
        </button>
      </form>
      </div>
    </div>


    <form class="flex w-full flex-col gap-3" action="{{ url('/account/profile') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex w-full flex-col">
      <label class="flex" for="name">Nama<span
        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:content-['*']"></span></label>
      <input class="w-full border px-4 py-2 lg:w-1/2 rounded-lg" type="text" name="name" value="{{ $user->name }}" />
      </div>

      <div class="flex w-full flex-col">
      <label class="flex" for="email">Email<span
        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:content-['*']"></span></label>
      <input class="w-full border px-4 py-2 lg:w-1/2 rounded-lg" type="email" name="email" value="{{ $user->email }}" />
      </div>

      <div class="flex w-full flex-col">
      <label class="flex" for="name">Nomor Telepon<span
        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:content-['*']"></span></label>
      <input class="w-full border px-4 py-2 lg:w-1/2 rounded-lg" type="text" name="phone_number"
        value="{{ $user->phone_number }}" />
      </div>

      <div class="flex flex-col">


      <button class="mt-4 w-48 bg-secondary hover:bg-primary py-2 text-white rounded-lg duration-100 ease-in transition-all font-medium text-base" type="submit">
        Simpan Perubahan
      </button>
      </div>
    </form>
    </div>
  </section>
  <!-- /form  -->
  </section>
@endsection
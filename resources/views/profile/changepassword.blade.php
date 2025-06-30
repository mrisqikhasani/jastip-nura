@extends('layouts.app')

@section('content')

  @include('layouts.partials.sidebarprofile')
  <!-- form  -->
  <section class="grid w-full max-w-[1200px] grid-cols-1 gap-3 px-5 pb-10">

    <!--  Pesan sukses manual -->
    @if (session('success'))
    <div class="mb-4 rounded bg-green-100 px-4 py-3 text-green-800">
    {{ session('success') }}
    </div>
    @endif

    <!-- Pesan error manual -->
    @if (session('error'))
    <div class="mb-4 rounded bg-red-100 px-4 py-3 text-red-800">
    {{ session('error') }}
    </div>
    @endif

    <!--  Pesan validasi -->
    @if ($errors->any())
    <div class="mb-4 rounded bg-red-100 px-4 py-3 text-red-800">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    </div>
    @endif

    <div class="py-5">
    <div class="w-full"></div>
    <form class="flex w-full flex-col gap-3" action="{{ url('/account/change-password') }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex w-full flex-col">
      <label class="flex" for="name">Current password<span
        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
      <input class="w-full border px-4 py-2 lg:w-1/2" type="password" name='current_password' placeholder="" />
      </div>

      <div class="flex w-full flex-col">
      <label class="flex" for="name">New Password<span
        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
      <input class="w-full border px-4 py-2 lg:w-1/2" type="password" name="new_password" placeholder="" />
      </div>

      <div class="flex flex-col">
      <label class="flex" for="">Repeat New Password<span
        class="block text-sm font-medium text-slate-700 after:ml-0.5 after:text-red-500 after:content-['*']"></span></label>
      <input class="w-full border px-4 py-2 lg:w-1/2" type="password" name="new_password_confirmation" placeholder="" />
      </div>

      <button type="submit" class="mt-4 w-40 bg-violet-900 px-4 py-2 text-white">
      Save changes
      </button>
    </form>
    </div>
  </section>
  <!-- /form  -->
  </section>
@endsection
@extends('layouts.app')

@section('content')
    <!-- Login card  -->
    <section class="mx-auto flex-grow w-full mt-10 mb-10 max-w-[1200px] px-5">
        <div class="container mx-auto border px-5 py-5 shadow-sm md:w-1/2">
            <div class="">
                <p class="text-4xl font-bold">LOGIN</p>
                <p>Welcome back, customer!</p>
            </div>

                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

            <form class="mt-6 flex flex-col" method="post" action="/login">
                @csrf
                <label for="email">Email Address</label>
                <input
                    class="mb-3 mt-3 border px-4 py-2"
                    type="email"
                    name="email"
                    id="email"
                    placeholder="youremail@domain.com"
                    value="{{ old('email') }}"
                    required
                    autofocus
                />

                <label for="password">Password</label>
                <input
                    class="mt-3 border px-4 py-2"
                    type="password"
                    name="password"
                    id="password"
                    placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;"
                    required
                />

                <button class="my-5 w-full bg-violet-900 py-2 text-white" type="submit">
                    LOGIN
                </button>
            </form>

            <p class="text-center">
                Don`t have account?
                <a href="{{ url('/signup') }}" class="text-violet-900">Register now</a>
            </p>
        </div>
    </section>
    <!-- /Login Card  -->
@endsection
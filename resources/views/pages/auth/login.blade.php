@extends('layout.app', ['title' => 'Login'])


@section('body')
    <main>
        <section class="h-dvh flex justify-center items-center">
            <div class="w-full max-w-md p-4 border border-gray-100 shadow rounded-lg">
                <div class="text-center">
                    <h1 class="text-xl font-medium">Login</h1>
                    <p class="text-xs">Selamat datang</p>
                </div>
                <form class="mt-4" method="POST">
                    @include('includes.alert')
                    @csrf
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="name@flowbite.com" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " required />
                    </div>
                    <div class="">
                        <p class="text-xs">belum punya akun ? <a href="{{ route('register') }}" class="hover:underline text-blue-500">daftar sekarang</a></p>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Masuk</button>
                    </div>
                </form>
  
            </div>
        </section>
    </main>
@endsection
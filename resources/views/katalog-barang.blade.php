<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Page Katalog Barang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased w-full h-full bg-cover px-9 py-5" style="background-image : url('./images/bg.svg')">
        <div class="flex items-center justify-between gap-12 mb-6">
            <img src="/images/home.svg" class="">
            <form action="#" method="get">
                <input type="text" name="search" placeholder="Search" class="rounded-2xl bg-transparent w-96">
            </form>
            <div>
                @auth
                <a href="/logout" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log out</a>
                @else
                <a href="/login" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                <a href="/register" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
                @endauth
            </div>
        </div>
        <div class="flex gap-12">
            <div class="flex flex-col items-center bg-stone-600 h-[800px] rounded-2xl py-4">
                <a href="/" class=""><img src="/images/katalog.svg" class="cursor-pointer"></a>
                <a href="/history" class=""><img src="/images/history.svg" class="cursor-pointer"></a>
            </div>
            @if (count($data) != 0)
            <div class="grid grid-cols-6 gap-x-6 gap-y-0">
                @foreach ( $data as $katalog )
                <div class="w-36 h-36 bg-[#9C9C9C] rounded-xl hover:scale-105 cursor-pointer flex flex-col justify-end px-3 py-2">
                    <div class="flex justify-between">
                        <div class="flex flex-col">
                            <p class="font-extrabold">{{ $katalog->name }}</p>
                            <p>Rp {{ $katalog->price }}</p>
                        </div>
                        <p class="font-extrabold">{{ $katalog->stok }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="flex w-full justify-center items-center">
                <h1 class="text-xl font-bold text-slate-800 text-center">Data tidak ada</h1>
            </div>
            @endif
        </div>
    </div>
</body>

</html>
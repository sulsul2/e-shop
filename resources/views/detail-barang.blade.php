<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Page Detail Barang</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased w-full h-full bg-cover px-9 py-5" style="background-image : url('./../images/bg.svg')">
        <img src="/images/home.svg" class="">
        <div class="flex justify-between gap-12 mt-6">
            <div class="flex flex-col items-center bg-stone-600 h-[800px] rounded-2xl py-4">
                <a href="/" class=""><img src="/images/katalog.svg" class="cursor-pointer"></a>
                <a href="/history" class=""><img src="/images/history.svg" class="cursor-pointer"></a>
            </div>
            <div class="flex flex-col items-center gap-8">
                <div class="bg-white w-96 h-[400px] rounded-2xl flex flex-col py-6 px-8">
                    <div class="w-full h-64 bg-[#9C9C9C] rounded-xl mb-6"></div>
                    <p class="font-extrabold text-[28px]">{{ $product->name }}</p>
                    <div class="flex justify-between">
                        <p class="">{{ $product->price }}</p>
                        <p class="font-extrabold">{{ $product->stok }}</p>
                    </div>
                </div>
                <x-validation-errors />
                <form method="POST" action="/buy" class="w-full">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="stok" value="{{ $product->stok }}">
                    <input type="hidden" name="nama_barang" value="{{ $product->name }}">
                    <input type="hidden" name="harga_barang" value="{{ $product->price }}">
                    <input required type="text" name="jumlah_barang" placeholder="Jumlah" value="{{ old('jumlah_barang') }}">
                    <input required type="text" name="nama_penerima" placeholder="Nama Penerima" value="{{ old('nama_penerima') }}">
                    <input required type="text" name="alamat_pengiriman" placeholder="Alamat Pengiriman" value="{{ old('alamat_pengiriman') }}">
                    <button type=" submit" class="my-4 w-full py-3 rounded-full text-white bg-gradient-to-b from-pink-400 to-purple-400 hover:from-pink-300 hover:to-purple-300 text-lg md:text-xl xl:text-2xl font-semibold">
                        Click Here to Buy
                    </button>
                </form>
            </div>
            <div class="flex flex-col items-center bg-stone-600 h-[800px] rounded-2xl py-4 invisible">
                <a href="/" class=""><img src="/images/katalog.svg" class="cursor-pointer"></a>
                <a href="/history" class=""><img src="/images/history.svg" class="cursor-pointer"></a>
            </div>
        </div>
    </div>
</body>

</html>
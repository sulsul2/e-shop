<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Shop') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased w-full h-screen bg-cover px-2 md:px-8 xl:px-96 py-12 md:py-16 xl:py-20 overflow-auto" style="background-image: url('/images/bg.svg');">
        <div class="bg-slate-100 p-14 rounded-3xl bg-opacity-40 backdrop-blur-lg">
            <x-validation-errors />
            <h1 class="text-3xl font-extrabold mb-4">Register</h1>
            <form method="POST" action="/register">
                @csrf

                <div class="md:flex justify-between gap-8">
                    <div class="md:w-1/2">
                        <label for="first_name" class="font-bold">First Name</label>
                        <input id="first_name" placeholder="First Name" class="px-0 w-full border-0 border-b-2 border-b-slate-500 bg-transparent focus:ring-0 focus:border-purple-400" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus autocomplete="first_name" />
                    </div>
                    <div class="md:w-1/2 mt-4 md:mt-0">
                        <label for="last_name" class="font-bold">Last Name</label>
                        <input id="last_name" placeholder="Last Name" class="px-0 w-full border-0 border-b-2 border-b-slate-500 bg-transparent focus:ring-0 focus:border-purple-400" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus autocomplete="last_name" />
                    </div>
                </div>

                <div class="mt-4">
                    <label for="email" class="font-bold">Email</label>
                    <input id="email" placeholder="Email" class="px-0 w-full border-0 border-b-2 border-b-slate-500 bg-transparent focus:ring-0 focus:border-purple-400" type="text" name="email" value="{{ old('email') }}" required autofocus autocomplete="email" />
                </div>

                <div class="mt-4">
                    <label for="username" class="font-bold">Username</label>
                    <input id="username" placeholder="Username" class="px-0 w-full border-0 border-b-2 border-b-slate-500 bg-transparent focus:ring-0 focus:border-purple-400" type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <label for="password" class="font-bold">Password</label>
                    <input id="password" type="password" placeholder="Password" class="px-0 w-full border-0 border-b-2 border-b-slate-500 bg-transparent focus:ring-0 focus:border-purple-400" type="text" name="password" value="{{ old('password') }}" required autofocus autocomplete="password" />
                </div>

                <div class="flex items-center justify-center flex-col mt-6">
                    <button type="submit" class="mb-4 w-full md:w-1/2 py-3 rounded-full text-white bg-gradient-to-b from-pink-400 to-purple-400 hover:from-pink-300 hover:to-purple-300 text-lg md:text-xl xl:text-2xl font-semibold">
                        Register
                    </button>
                    <p class="text-sm">
                        Already registered?
                        <a class="underline text-gray-600 hover:text-purple-500 rounded-md " href="/login">
                            Login here
                        </a>
                    </p>

                </div>
            </form>
        </div>
    </div>
</body>

</html>
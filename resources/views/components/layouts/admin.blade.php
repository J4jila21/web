<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/img/seduhin_logo.ico" sizes="32x32">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-primary-50 flex flex-col min-h-screen">
    {{-- Header --}}
    <header class="bg-white shadow px-4 py-3 flex justify-between items-center md:px-6 fixed top-0 w-full z-30">
    <div class="flex items-center space-x-3">
        {{-- Mobile menu toggle --}}
        <button id="menu-toggle" class="md:hidden text-gray-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

                    <a href="{{ route('admin.dashboard') }}">
                <img class=" transition all duration-300 ease-in-out w-50 h-8" src="{{ asset('favicon.png') }}" alt="seduhin logo" width="100"
                    loading="lazy" height="24">
            </a>
    </div>

    {{-- Profile Dropdown --}}
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open"
            class="w-9 h-9 flex items-center justify-center bg-gray-200 hover:bg-gray-300 rounded-full focus:ring">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A13.937 13.937 0 
                    0112 15c2.582 0 4.985.729 
                    7.121 2.804M15 7a3 3 0 
                    11-6 0 3 3 0 016 0z" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false" x-transition x-cloak
            class="absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border py-2 z-50">

            <a href="#" onclick="alert('Halaman profil belum dibuat')"
                class="w-full flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="h-4 w-4"><path d="M18.656.93,6.464,13.122A4.966,4.966,0,0,0,5,16.657V18a1,1,0,0,0,1,1H7.343a4.966,4.966,0,0,0,3.535-1.464L23.07,5.344a3.125,3.125,0,0,0,0-4.414A3.194,3.194,0,0,0,18.656.93Zm3,3L9.464,16.122A3.02,3.02,0,0,1,7.343,17H7v-.343a3.02,3.02,0,0,1,.878-2.121L20.07,2.344a1.148,1.148,0,0,1,1.586,0A1.123,1.123,0,0,1,21.656,3.93Z"/><path d="M23,8.979a1,1,0,0,0-1,1V15H18a3,3,0,0,0-3,3v4H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2h9.042a1,1,0,0,0,0-2H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H16.343a4.968,4.968,0,0,0,3.536-1.464l2.656-2.658A4.968,4.968,0,0,0,24,16.343V9.979A1,1,0,0,0,23,8.979ZM18.465,21.122a2.975,2.975,0,0,1-1.465.8V18a1,1,0,0,1,1-1h3.925a3.016,3.016,0,0,1-.8,1.464Z"/></svg>

                 Edit Profil
            </a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" class="h-4 w-4"><path d="M22.829,9.172,18.95,5.293a1,1,0,0,0-1.414,1.414l3.879,3.879a2.057,2.057,0,0,1,.3.39c-.015,0-.027-.008-.042-.008h0L5.989,11a1,1,0,0,0,0,2h0l15.678-.032c.028,0,.051-.014.078-.016a2,2,0,0,1-.334.462l-3.879,3.879a1,1,0,1,0,1.414,1.414l3.879-3.879a4,4,0,0,0,0-5.656Z"/><path d="M7,22H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H7A1,1,0,0,0,7,0H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H7a1,1,0,0,0,0-2Z"/></svg>

                     Keluar
                </button>
            </form>

        </div>
    </div>
</header>


    <div class="flex flex-1">
        {{-- Sidebar --}}
        <aside id="sidebar" class="w-64 py-4 bg-white shadow-lg flex flex-col fixed inset-y-0 left-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-20">
            

            <nav class="mt-10 flex-1 p-4 space-y-1 text-sm" x-data="{ 
    openDashboard: false,
    openProducts: false,
    openBlog: false,
    openUsers: false,
    openOrders: false,
    openSettings: false
}">
    {{-- Dashboard --}}
    <div class="relative">
        <button @click="openDashboard = !openDashboard"
            class="flex items-center justify-between w-full px-4 py-2 rounded-lg 
                text-gray-600 hover:text-gray-800 dark:hover:text-gray-400">
            <span class="flex items-center font-semibold gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                 Dashboard
            </span>
            <span :class="openDashboard ? 'rotate-180' : ''" class="transition-transform">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
            </span>
        </button>
        <ul x-show="openDashboard"
            x-transition x-cloak
            class="mt-1 ml-8 space-y-1 text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="block px-3 py-1 font-semibold text-gray-600 hover:text-gray-800">Jelajahi Semua</a></li>
        </ul>
    </div>
    <div class="relative">
        <button @click="openOrders = !openOrders"
            class="flex items-center justify-between w-full px-4 py-2 rounded-lg 
                text-gray-600 hover:text-gray-800 dark:hover:text-gray-400">
            <span class="flex items-center font-semibold gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                 Pesanan
            </span>
            <span :class="openOrders ? 'rotate-180' : ''" class="transition-transform">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
            </span>
        </button>
        <ul x-show="openOrders"
            x-transition x-cloak
            class="mt-1 ml-8 space-y-1 text-gray-600">
            <li><a href="{{ route('admin.orders') }}" class="block px-3 py-1 font-semibold text-gray-600 hover:text-gray-800">Jelajahi Semua</a></li>
        </ul>
    </div>
    {{-- Pengguna --}}
    <div class="relative">
        <button @click="openUsers = !openUsers"
            class="flex items-center justify-between w-full px-4 py-2 rounded-lg 
                text-gray-600 hover:text-gray-800 dark:hover:text-gray-400">
            <span class="flex items-center font-semibold gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                 Pengguna
            </span>
            <span :class="openUsers ? 'rotate-180' : ''" class="transition-transform">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
            </span>
        </button>
        <ul x-show="openUsers"
            x-transition x-cloak
            class="mt-1 ml-8 space-y-1 text-gray-600">
            <li><a href="{{ route('admin.users') }}" class="block px-3 py-1 font-semibold text-gray-400 hover:text-gray-800 transition-all duration-300">Jelajahi Semua</a></li>
        </ul>
    </div>

    {{-- Products --}}
    <div class="relative">
        <button @click="openProducts = !openProducts"
            class="flex items-center justify-between w-full px-4 py-2 rounded-lg 
                text-gray-600 hover:text-gray-800 dark:hover:text-gray-400">
            <span class="flex items-center font-semibold gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z"></path></svg>
                 Products
            </span>
            <span :class="openProducts ? 'rotate-180' : ''" class="transition-transform">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
            </span>
        </button>

        <ul x-show="openProducts"
            x-transition x-cloak
            class="mt-1 ml-8 space-y-1 text-gray-600">
            <li>
                <a href="{{ route('admin.products.index') }}" class="block px-3 py-1 font-semibold text-gray-400 hover:text-gray-800 transition-all duration-300">
                    Jelajahi Semua
                </a>
            </li>
            
        </ul>
    </div>

    {{-- Blog --}}
    <div class="relative">
        <button @click="openBlog = !openBlog"
            class="flex items-center justify-between w-full px-4 py-2 rounded-lg text-gray-600 hover:text-gray-800 dark:hover:text-gray-400">
            <span class="flex items-center font-semibold gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"></path> <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"></path></svg>
                 Blog
            </span>
            <span :class="openBlog ? 'rotate-180' : ''" class="transition-transform">
                 <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
            </span>
        </button>

        <ul x-show="openBlog"
            x-transition x-cloak
            class="mt-1 ml-8 space-y-1 text-gray-600">
            <li>
                <a href="{{ route('admin.blogs') }}" class="block px-3 py-1 font-semibold text-gray-400 hover:text-gray-800 transition-all duration-300">
                    Jelajahi Semua
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blogs.create') }}" class="block px-3 py-1 font-semibold text-gray-400 hover:text-gray-800 transition-all duration-300">
                    Buat Artikel
                </a>
            </li>
            
        </ul>
    </div>
</nav>


            

        </aside>

        {{-- Overlay untuk mobile --}}
        <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-10 md:hidden"></div>

        {{-- Main Content --}}
        <main class="flex-1 ml-0 md:ml-64 p-6 transition-all duration-300">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggle = document.getElementById('menu-toggle');
        const overlay = document.getElementById('overlay');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
</body>
</html>

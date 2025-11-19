@props(['title' => ''])

<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'User Dashboard - KopiKu.id' }}</title>
        @vite('resources/css/app.css')
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-ZFfdf9..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>

    <body class="bg-white font-sans" x-data="{ showLogoutConfirm: false, sidebarOpen: false }">

    {{-- HEADER MOBILE --}}
    <header class="fixed top-0 z-30 flex w-full items-center justify-between bg-white px-4 py-3 shadow md:hidden md:px-6">
        <div class="flex w-full items-center justify-between">
            <div class="flex justify-center gap-5">
                <div class="flex items-center justify-center">
                    <a href="/">
                        <img class="all h-8 w-20 transition duration-300 ease-in-out"
                             src="{{ asset('favicon.png') }}" alt="seduhin logo" width="100" loading="lazy"
                             height="24">
                    </a>
                </div>
                <span>|</span>
                <h4 class="text-xl font-semibold">Dashboard</h4>
            </div>

            {{-- Mobile menu toggle --}}
            <button @click="sidebarOpen = !sidebarOpen" class="text-gray-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </header>
            <div x-show="showLogoutConfirm" x-cloak x-transition.opacity.duration.200ms
            class="fixed inset-0 z-[999] flex items-center justify-center bg-black/40">
            <div x-transition.scale.origin.center.duration.200ms @click.away="showLogoutConfirm = false"
                class="relative w-96 rounded-xl bg-white p-6 text-center shadow-xl">
                <button type="button" @click="showLogoutConfirm = false"
                    class="absolute right-4 top-4 text-gray-400 transition hover:text-gray-600">
                    <svg width="18" height="18" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.78 4.03a.5.5 0 0 0-.71-.71L7.5 6.89 3.93 3.32a.5.5 0 0 0-.71.71L6.79 7.6l-3.57 3.57a.5.5 0 1 0 .71.71L7.5 8.31l3.57 3.57a.5.5 0 0 0 .71-.71L8.21 7.6l3.57-3.57Z"
                            fill="currentColor" />
                    </svg>
                </button>

                <div class="flex flex-col items-center gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="gray"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-user">
                        <circle cx="12" cy="12" r="10"></circle>
                        <circle cx="12" cy="10" r="3"></circle>
                        <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
                    </svg>

                    <h2 class="text-lg font-semibold text-gray-800">Yakin akan keluar?</h2>
                    <p class="mb-5 text-sm text-gray-600">Anda akan keluar dari dashboard.</p>
                </div>

                <div class="flex justify-center gap-3">
                    <button @click="showLogoutConfirm = false"
                        class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700 transition hover:bg-gray-300">
                        Batal
                    </button>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="rounded-lg bg-red-500 px-4 py-2 text-white transition hover:bg-red-600">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    {{-- OVERLAY --}}
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 z-20 bg-black/50 md:hidden"
         @click="sidebarOpen = false"></div>

    <div class="flex">
        {{-- SIDEBAR --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
               class="fixed inset-y-0 left-0 z-30 w-64 border-r border-gray-200 bg-white py-5 transform transition-transform duration-300 md:translate-x-0 md:flex flex-col">

            <div class="hidden p-6 py-5 lg:flex">
                <a href="/">
                    <img class="h-8" src="{{ asset('favicon.png') }}" alt="Coffee Shop">
                </a>
            </div>

            <nav class="flex-1 space-y-2 px-4 lg:mt-5">
                <a href="{{ route('user.dashboard') }}"
                   class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg text-gray-700">
                    <div class="{{ request()->is('user/dashboard') ? 'bg-primary-500' : 'bg-white' }} flex p-2 border border-gray-200 items-center justify-center rounded-full">
                        <i class="{{ request()->is('user/dashboard') ? 'text-white' : 'text-gray-500' }} fa-solid fa-house"></i>
                    </div>
                    <span class="ml-3 font-medium">Dashboard</span>
                </a>

                <a href="{{ route('user.pesanan') }}"
                   class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg text-gray-700">
                    <div class="{{ request()->is('user/pesanan') ? 'bg-primary-500' : 'bg-white' }} flex p-2 border border-gray-200 items-center justify-center rounded-full">
                        <i class="{{ request()->is('user/pesanan') ? 'text-white' : 'text-gray-500' }} fa-solid fa-mug-hot"></i>
                    </div>
                    <span class="ml-3 font-medium">Pesanan</span>
                </a>

                <a href="{{ route('user.profile.edit') }}"
                   class="flex items-center px-4 py-2 hover:bg-gray-100 rounded-lg text-gray-700">
                    <div class="{{ request()->is('user/profile/edit') ? 'bg-primary-500' : 'bg-white' }} flex p-2 border border-gray-200 items-center justify-center rounded-full">
                        <i class="{{ request()->is('user/profile/edit') ? 'text-white' : 'text-gray-500' }} fa-solid fa-user"></i>
                    </div>
                    <span class="ml-3 font-medium">Edit Profil</span>
                </a>

                <button @click="showLogoutConfirm = true"
                        class="flex w-full items-center px-4 py-2 hover:bg-gray-100 rounded-lg text-gray-700">
                    <div class="flex p-2 border border-gray-200 items-center justify-center rounded-full">
                        <i class="fa-solid fa-right-from-bracket text-gray-500"></i>
                    </div>
                    <span class="ml-3 font-medium">Logout</span>
                </button>
            </nav>
        </aside>

        {{-- MAIN AREA --}}
        <main class="w-full md:ml-64 pt-[95px] h-screen overflow-y-auto">
            {{-- HEADER FIXED --}}
            <header class="fixed top-0 left-64 right-0 hidden md:block z-40 bg-white h-[95px] shadow">
                <nav class="flex items-center justify-between px-5 h-full">
                    <h1 class="text-2xl font-semibold text-gray-700">{{ $title }}</h1>
                    <a href="/product">
                        <button class="rounded-full bg-primary-500 px-4 py-2 text-white hover:bg-primary-600 transition-all duration-300">
                            Pesan Sekarang
                        </button>
                    </a>
                </nav>
            </header>

            <div class="p-5 md:p-10">
                {{ $slot }}
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js" defer></script>
</body>


</html>

<div class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="/">
                <img class="w-50 h-8" src="{{ asset('favicon.png') }}" alt="Coffee Shop" width="120"
                    loading="lazy" height="48">
            </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden items-center space-x-8 text-sm text-gray-700 md:flex">
            <a href="/product"
                class="{{ request()->is('product') ? 'font-semibold' : 'text-gray-900' }} transition hover:text-gray-900">
                Product
            </a>
            <a href="/blog"
                class="{{ request()->is('blog') ? 'font-semibold' : 'text-gray-900' }} transition hover:text-gray-900">
                Blog
            </a>
            <a href="/about"
                class="{{ request()->is('about') ? 'font-semibold' : 'text-gray-900' }} transition hover:text-gray-900">
                Tentang Kami
            </a>
            <a href="/contact"
                class="{{ request()->is('contact') ? 'font-semibold' : 'text-gray-900' }} transition hover:text-gray-900">
                Contact
            </a>
        </div>

        <!-- Right side -->
        <div class="flex items-center space-x-4">

            <div x-cloak x-data="cartMenu()" class="relative">
                <div @click="toggleCart" class="border border-gray-300 flex items-center w-10 h-10 justify-center cursor-pointer rounded-full relative"><!-- 🔹 Keranjang: tampil untuk semua user -->
                    <span x-show="totalItems > 0" x-text="totalItems"
                        class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                    </span>
                <button class="relative focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" id="Outline" viewBox="0 0 24 24"><path d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z"/><circle cx="7" cy="22" r="2"/><circle cx="17" cy="22" r="2"/></svg>
                    <!-- Badge jumlah item -->
                </div>
                </button>
                <!-- Modal Keranjang -->
                <div x-show="open" 
                    @click.away="open = false"
                    x-transition
                    x-cloak
                    class="fixed right-4 mt-3 w-80 bg-white shadow-lg border border-gray-200 rounded-xl p-4 z-50">

                    <template x-if="cart.length === 0">
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <p class="font-bold text-xl md:text-lg mb-5 text-left">Baru Ditambahkan</p>
                            <div class="w-full h-full rounded-lg">
                            <div class="flex flex-col gap-2 mb-2">Keranjang kosong ☕</div>
                            </div>
                            <div class="p-4 bg-white flex flex-col gap-2 rounded-md">
                                <div class="flex items-center justify-between mb-3 font-semibold">
                            <span>Total:</span>
                            <span>Rp <span x-text="total.toLocaleString()"></span></span>
                        </div>
                            <a href="{{ auth()->check() ? '/checkout' : '/login' }}"
                            @click="open=false"
                            class="flex justify-center items-center text-center w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Checkout
                        </a>
                        </div>
                            </div>
                        </div>
                    </template>

                    <template x-for="item in cart" :key="item.id">
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <div class="flex flex-col gap-2 mb-2">
                                <p class="font-bold text-xl md:text-lg mb-5 text-left">Baru Ditambahkan</p>
                                <div class="md:p-3 rounded-md flex justify-between gap-3 md:gap-20">
                            <div class="flex items-start gap-3">
                            <img :src="item.image" class="h-12 w-12 rounded-md object-cover">
                                <h4 class="font-semibold text-gray-800" x-text="item.name"></h4>
                            </div>
                                <div class="flex flex-col gap-1">
                                    <div class="flex">
                                <h3 class="text-xs text-gray-500 font-bold">Rp <span x-text="item.price.toLocaleString()"></span></h3></div>
                                <div class="flex items-center mt-1">
                                    <button @click="decrease(item)" class="px-2 text-gray-600 hover:text-blue-600">-</button>
                                    <span class="px-2 text-sm" x-text="item.quantity"></span>
                                    <button @click="increase(item)" class="px-2 text-gray-600 hover:text-blue-600">+</button>
                                </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    </template>

                    <div x-show="cart.length > 0" class="p-4 bg-white pt-3">
                        <div class="flex justify-between mb-3 font-semibold">
                            <span>Total:</span>
                            <span>Rp <span x-text="total.toLocaleString()"></span></span>
                        </div>

                        <!-- 🔸 Redirect ke login kalau belum login -->
                        <a href="{{ auth()->check() ? '/checkout' : '/login' }}"
                            @click="open=false"
                            class="block text-center w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                            Checkout
                        </a>
                    </div>
                </div>
            </div>

            <!-- 🔹 Akun User (jika login) -->
            @auth
                <div x-cloak x-data="{ openAccount: false, showLogoutConfirm: false }" class="relative flex items-center">
                    <!-- Avatar huruf -->
                    <button @click="openAccount = !openAccount" class="focus:outline-none">
                        @php
                            $colors = [
                                'bg-red-500','bg-orange-500','bg-amber-500','bg-yellow-500',
                                'bg-lime-500','bg-green-500','bg-emerald-500','bg-teal-500',
                                'bg-cyan-500','bg-sky-500','bg-blue-500','bg-indigo-500',
                                'bg-violet-500','bg-purple-500','bg-fuchsia-500','bg-pink-500','bg-rose-500'
                            ];
                            $identifier = Auth::user()->email ?? Auth::user()->name;
                            $hash = crc32($identifier);
                            $bgColor = $colors[$hash % count($colors)];
                            $initial = strtoupper(substr($identifier, 0, 1));
                        @endphp
                        <div class="{{ $bgColor }} flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-600 font-semibold text-white">
                            {{ $initial }}
                        </div>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="openAccount" @click.away="openAccount = false" x-transition x-cloak
                        class="absolute right-0 top-12 z-50 w-56 rounded-xl border border-gray-200 bg-white shadow-lg">
                        <div class="border-b border-gray-200 p-4">
                            <h2 class="text-sm font-semibold text-gray-700">My Account</h2>
                        </div>

                        <div class="flex flex-col p-2">
                            <a href="{{ route('user.dashboard') }}"
                                class="block rounded-lg px-4 py-2 text-gray-700 hover:bg-gray-100">
                                Dashboard
                            </a>
                            <button @click="showLogoutConfirm = true; openAccount = false"
                                class="w-full rounded-lg px-4 py-2 text-left text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Logout -->
                    <div x-show="showLogoutConfirm" x-cloak x-transition.opacity.duration.200ms
                        class="fixed mt-5 inset-0 z-[999] flex items-center justify-center bg-black/40">
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
                            <h2 class="mb-3 text-lg font-semibold text-gray-800">Yakin ingin keluar?</h2>
                            <p class="mb-5 text-sm text-gray-600">Anda akan keluar dari akun Anda.</p>
                </div>
                            <div class="flex justify-center gap-3">
                                <button @click="showLogoutConfirm = false"
                                    class="rounded-lg bg-gray-200 px-4 py-2 text-gray-700 hover:bg-gray-300">Batal</button>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="rounded-lg bg-red-500 px-4 py-2 text-white hover:bg-red-600">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth

            <!-- 🔹 Tombol login jika belum login -->
            @guest
                <div class="bg-primary-500 h-10 w-10 cursor-pointer flex items-center justify-center rounded-full">
                    <a href="/login" class="text-gray-900 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user h-5 w-5">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                </div>
            @endguest

        </div>
    </div>

    <!-- 🔹 Bottom Menu (Mobile) -->
    <div class="fixed bottom-0 left-0 right-0 z-50 flex w-full items-center justify-between border-t border-gray-200 bg-white px-4 py-1 shadow-md md:hidden">
        <a href="/about" class="{{ request()->is('about') ? 'text-blue-600 font-semibold' : 'text-gray-600' }} flex flex-col items-center gap-1 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M20 22H6.5A2.5 2.5 0 0 1 4 19.5V4a2 2 0 0 1 2-2h14v20Z"></path>
            </svg>
            About
        </a>
        <a href="/product" class="{{ request()->is('product') ? 'text-blue-600 font-semibold' : 'text-gray-600' }} flex flex-col items-center gap-1 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M20.5 9.5L12 4 3.5 9.5l8.5 5.5z"></path>
                <path d="M3.5 9.5v5l8.5 5 8.5-5v-5"></path>
            </svg>
            Product
        </a>
        <a href="/blog" class="{{ request()->is('blog') ? 'text-blue-600 font-semibold' : 'text-gray-600' }} flex flex-col items-center gap-1 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M3 4h18v18H3z"></path>
                <path d="M3 8h18M7 12h10M7 16h10"></path>
            </svg>
            Blog
        </a>
        <a href="/contact" class="{{ request()->is('contact') ? 'text-blue-600 font-semibold' : 'text-gray-600' }} flex flex-col items-center gap-1 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                <path d="M21 10v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"></path>
                <path d="M3 6h18M16 10V6m-8 4V6"></path>
            </svg>
            Contact
        </a>
    </div>
</div>

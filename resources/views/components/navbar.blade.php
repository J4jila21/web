<div class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/">
                    <img class="w-50 h-8" src="{{ asset('img/logo blue.svg') }}" alt="Coffee Shop" width="120"
                        height="48">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8 text-gray-700 text-sm">
                <a href="/buku"
                    class="{{ request()->is('buku') ? 'font-semibold' : 'text-gray-900' }} link hover:text-gray-900 hover:font-semibold transition-all duration-300">
                    Buku
                </a>
                <a href="/product"
                    class="{{ request()->is('product') ? 'font-semibold' : 'text-gray-900' }} link hover:text-gray-900 hover:font-semibold transition-all duration-300">
                    Product
                </a>
                <a href="/blog"
                    class="{{ request()->is('blog') ? 'font-semibold' : 'text-gray-900' }} link hover:text-gray-900 hover:font-semibold transition-all duration-300">
                    Blog
                </a>
                <a href="/about"
                    class="{{ request()->is('about') ? 'font-semibold' : 'text-gray-900' }} link hover:text-gray-900 hover:font-semibold transition-all duration-300">
                    Tentang Kami
                </a>
                <a href="/contact"
                    class="{{ request()->is('contact') ? 'font-semibold' : 'text-gray-900' }} link hover:text-gray-900 hover:font-semibold transition-all duration-300">
                    Contact
                </a>
            </div>

            <!-- Right side (Profile + Mobile Menu Button) -->
            <div class="flex items-center space-x-4">
                <!-- Profile Icon -->
                <a href="/login" class="text-gray-500 hover:text-gray-900 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A9 9 0 1118.879 17.804M12 11a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </a>

                <!-- Mobile Menu Button -->
                <button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
                    class="sm:hidden text-gray-400 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden space-y-1 px-2 pb-3 pt-2 sm:hidden">
        <a href="/buku"
            class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200 text-gray-500 hover:text-primary-700 hover:bg-primary-50">Buku</a>
        <a href="/product"
            class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200 text-gray-500 hover:text-primary-700 hover:bg-primary-50">Product</a>
        <a href="/blog"
            class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200 text-gray-500 hover:text-primary-700 hover:bg-primary-50">Blog</a>
        <a href="/about"
            class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200 text-gray-500 hover:text-primary-700 hover:bg-primary-50">Tentang Kami</a>
        <a href="/contact"
            class="block rounded-md px-3 py-2 text-base font-medium transition-colors duration-200 text-gray-500 hover:text-primary-700 hover:bg-primary-50">Contact</a>
    </div>
</div>

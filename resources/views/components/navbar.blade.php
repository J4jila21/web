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
            <div class="hidden items-center space-x-8 text-sm text-gray-700 md:flex">
                <a href="/buku"
                    class="{{ request()->is('buku') ? 'font-semibold' : 'text-gray-900' }} link transition-all duration-300 hover:font-semibold hover:text-gray-900">
                    Buku
                </a>
                <a href="/product"
                    class="{{ request()->is('product') ? 'font-semibold' : 'text-gray-900' }} link transition-all duration-300 hover:font-semibold hover:text-gray-900">
                    Product
                </a>
                <a href="/blog"
                    class="{{ request()->is('blog') ? 'font-semibold' : 'text-gray-900' }} link transition-all duration-300 hover:font-semibold hover:text-gray-900">
                    Blog
                </a>
                <a href="/about"
                    class="{{ request()->is('about') ? 'font-semibold' : 'text-gray-900' }} link transition-all duration-300 hover:font-semibold hover:text-gray-900">
                    Tentang Kami
                </a>
                <a href="/contact"
                    class="{{ request()->is('contact') ? 'font-semibold' : 'text-gray-900' }} link transition-all duration-300 hover:font-semibold hover:text-gray-900">
                    Contact
                </a>
            </div>

            <!-- Right side (Profile + Mobile Menu Button) -->
            <div class="flex items-center space-x-4">
                <!-- Profile Icon -->
                <a href="/login" class="text-gray-500 transition-colors duration-200 hover:text-gray-900">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Outline" viewBox="0 0 24 24" width="24"
                        height="24">
                        <path d="M12,12A6,6,0,1,0,6,6,6.006,6.006,0,0,0,12,12ZM12,2A4,4,0,1,1,8,6,4,4,0,0,1,12,2Z" />
                        <path
                            d="M12,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,12,14Z" />
                    </svg>

                </a>
            </div>
        </div>
    </div>

<div class="fixed bottom-0 z-50 flex w-full items-center justify-between bg-white border-t border-gray-200 shadow-md px-4 py-1 md:hidden">

    <a href="/buku"
        class="flex w-full flex-col items-center gap-1 rounded-md px-2 py-1 text-sm transition-all duration-300 
        {{ request()->is('buku') ? 'bg-primary-500 font-semibold' : 'text-gray-600 hover:text-[#0AEEEE]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
            <path d="M20 22H6.5A2.5 2.5 0 0 1 4 19.5V4a2 2 0 0 1 2-2h14v20Z"></path>
        </svg>
        Buku
    </a>

    <a href="/product"
        class="flex w-full flex-col items-center gap-1 rounded-md px-2 py-1 text-sm transition-all duration-300
        {{ request()->is('product') ? 'bg-primary-500 font-semibold' : 'text-gray-600 hover:text-[#0AEEEE]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M20.5 9.5L12 4 3.5 9.5l8.5 5.5z"></path>
            <path d="M3.5 9.5v5l8.5 5 8.5-5v-5"></path>
        </svg>
        Product
    </a>

    <a href="/blog"
        class="flex w-full flex-col items-center gap-1 rounded-md px-2 py-1 text-sm transition-all duration-300
        {{ request()->is('blog') ? 'text-[#0AEEEE] font-semibold' : 'text-gray-600 hover:text-[#0AEEEE]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M3 4h18v18H3z"></path>
            <path d="M3 8h18M7 12h10M7 16h10"></path>
        </svg>
        Blog
    </a>

    <a href="/contact"
        class="flex w-full flex-col items-center gap-1 rounded-md px-2 py-1 text-sm transition-all duration-300
        {{ request()->is('contact') ? 'text-[#0AEEEE] font-semibold' : 'text-gray-600 hover:text-[#0AEEEE]' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
            <path d="M21 10v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6"></path>
            <path d="M3 6h18M16 10V6m-8 4V6"></path>
        </svg>
        Contact
    </a>
</div>
</div>

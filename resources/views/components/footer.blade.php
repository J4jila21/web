<div class="bg-primary-500 relative flex flex-col gap-5 border-b border-white p-8 md:flex-row md:justify-between md:p-20">
    <div class="flex flex-col gap-5 md:w-3/12">
        <div class="flex w-8/12 items-center gap-2 md:w-11/12">
            <img class="w-50 h-auto" src="{{ asset('img/logo white.svg') }}" alt="Logo KopiKu" loading="lazy">
        </div>
        <p class="text-gray-400 md:text-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,
            consequatur. Doloribus,
            quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.</p>
    </div>
    <div>
        <h3 class="text-white font-bold">Company</h3>
        <div class="mt-3 flex flex-col gap-3 md:text-xs">
            <a class="text-gray-400 transition-all duration-300 hover:text-white" href="/buku">Buku</a>
            <a class="text-gray-400 transition-all duration-300 hover:text-white" href="/product">Product</a>
            <a class="text-gray-400 transition-all duration-300 hover:text-white" href="/blog">Blog</a>
            <a class="text-gray-400 transition-all duration-300 hover:text-white" href="/about">Tentang Kami</a>
            <a class="text-gray-400 transition-all duration-300 hover:text-white" href="/contact">Contact</a>
        </div>
    </div>
    <div class="flex gap-5 items-center md:items-end">
        <a target="_blank" aria-label="kunjungi faebook" href="https://facebook.com/jajila">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-facebook h-6 w-6" aria-hidden="true">
                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                </svg>
            </div>
        </a>
        <a target="_blank" aria-label="kunjungi faebook" href="https://youtube.com/jajila">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-youtube h-6 w-6" aria-hidden="true">
                    <path
                        d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17">
                    </path>
                    <path d="m10 15 5-3-5-3z"></path>
                </svg>
                </svg>
            </div>
        </a>
        <a target="_blank" aria-label="kunjungi faebook" href="https://instagram.com/jajila">
            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-instagram h-6 w-6" aria-hidden="true">
                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                </svg>
            </div>
        </a>
    </div>
</div>
<div class=" w-full justify-center bg-primary-500">
<p class="py-3 text-center text-sm text-white">&copy; {{ date('Y') }} Kopi Terbaik Nusantara. All rights reserved</p>
</div>

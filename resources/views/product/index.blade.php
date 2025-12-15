<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Header --}}
    <x-slot:header>
        <main class="relative overflow-hidden">
            {{-- Background gradient --}}
            <div class="absolute inset-0 bg-gradient-to-br from-[#0B2447] via-[#19376D] to-[#576CBC]"></div>

            {{-- Background image samar --}}
            <img src="/images/coffee-hero.jpg" alt="Seduhin Coffee"
                class="absolute inset-0 h-full w-full object-cover opacity-20">

            {{-- CONTENT --}}
            <div class="relative mx-auto max-w-7xl px-5 py-16 md:px-10 md:py-24">
                <div class="flex flex-col md:flex-row items-start md:items-center gap-10">

                    {{-- ======== LEFT TEXT ======== --}}
                    <div class="flex-1 flex flex-col gap-4">
                        {{-- Bullet --}}
                        <span class="inline-flex items-center gap-2 text-sm font-semibold text-yellow-300">
                            <span class="h-2 w-2 rounded-full bg-yellow-300"></span>
                            Produk Kami
                        </span>

                        {{-- Title --}}
                        <h1 class="text-3xl font-extrabold leading-tight text-white md:text-6xl">
                            Temukan Kopi Terbaik <span class="text-yellow-300">Seduhin</span>
                        </h1>

                        {{-- Description --}}
                        <p class="max-w-xl text-white/80">
                            Dari espresso yang bold sampai kopi susu yang lembut — jelajahi berbagai racikan Seduhin
                            yang dibuat dari biji kopi pilihan dan diproses dengan penuh cinta.
                        </p>

                        {{-- Buttons --}}
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="#product-list"
                                class="rounded-xl bg-yellow-400 px-4 py-2 font-semibold text-[#0B2447] hover:bg-yellow-300">
                                Lihat Produk
                            </a>
                            <a href="/contact"
                                class="rounded-xl bg-white/10 px-4 py-2 font-semibold text-white ring-1 ring-white/20 backdrop-blur hover:bg-white/15">
                                Hubungi Kami
                            </a>
                        </div>
                    </div>

                    {{-- ======== RIGHT SIGNATURE BOX ======== --}}
                    <div class="flex-1 flex justify-center md:justify-end">
                        <div class="relative w-56 h-56 md:w-64 md:h-64">
                            {{-- Glow --}}
                            <div class="absolute inset-0 rounded-full bg-yellow-300/20 blur-2xl"></div>

                            {{-- Card --}}
                            <div
                                class="relative w-full h-full rounded-[36px] bg-white/5 border border-white/20 backdrop-blur-md
                                   flex flex-col items-center justify-center shadow-2xl text-white px-4">
                                <span class="text-xs tracking-[0.25em] uppercase text-white/60 mb-2">
                                    Signature
                                </span>

                                <span class="text-2xl font-semibold mb-1">
                                    Seduhin Latte
                                </span>

                                <span class="text-sm text-white/60 mb-4">
                                    Best seller minggu ini
                                </span>

                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-full bg-yellow-300/90 shadow-lg"></div>

                                    <div class="space-y-1 text-left text-xs">
                                        <p class="text-white/80">Blend Arabica pilihan</p>
                                        <p class="text-white/50">Aroma caramel & nutty</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Coffee bean accents --}}
            <svg class="pointer-events-none absolute -bottom-16 -right-10 h-64 w-64 opacity-15 text-white"
                viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                <ellipse cx="60" cy="60" rx="22" ry="14" />
                <ellipse cx="120" cy="120" rx="22" ry="14" />
                <ellipse cx="160" cy="40" rx="18" ry="12" />
            </svg>
        </main>
    </x-slot:header>
    {{-- Search Bar --}}
    <section class="bg-[#FFF7ED] pb-20 pt-6 rounded-3xl">
        <div class="mx-auto max-w-3xl px-6">
            <div class="bg-white/90 border border-orange-100 rounded-2xl shadow-sm p-4 md:p-5 flex flex-col gap-3">
                <div class="flex items-center justify-between gap-2">
                    <div>
                        <p class="text-xs uppercase tracking-[0.25em] text-orange-400">Cari Menu</p>
                        <h2 class="text-sm md:text-base font-semibold text-gray-800">
                            Mau ngopi apa hari ini?
                        </h2>
                    </div>
                    <span class="hidden md:inline-flex items-center gap-1 text-xs text-gray-400">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                        Fresh roasted daily
                    </span>
                </div>

                <form action="{{ route('product.index') }}" method="GET" class="relative mt-1">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari kopi, misalnya Toraja, Arabica, Latte..."
                        class="w-full rounded-full border border-gray-200 bg-gray-50/60 py-3 pl-4 pr-11 text-sm
                               text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-400
                               focus:border-amber-400">
                    <button type="submit"
                        class="absolute right-2 top-1/2 -translate-y-1/2 rounded-full bg-amber-500 p-2.5 text-white
                               hover:bg-amber-600 transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-width="2"
                                d="m21 21-3.5-3.5M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </section>
    {{-- Produk Grid --}}
    <div x-data="productModal()">
        <div class="mx-auto max-w-7xl px-6 mt-10" x-data="filterProducts()">
            <div class="flex items-center justify-end gap-5 md:mb-5">
                <h3 class="text-gray-500">Urutkan:</h3>
        <select x-model="sort"
            class="border border-gray-300 rounded-lg px-3 py-2 text-sm shadow">
            <option value="">Urutkan</option>
            <option value="cheap">Termurah</option>
            <option value="expensive">Termahal</option>
        </select>
    </div>
            <div class="grid grid-cols-2 gap-2 md:grid-cols-3 lg:grid-cols-4">
                <template x-for="product in sortedProducts" :key="product.id">
        <div class="flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white">

            <!-- Gambar -->
            <div class="relative">
                <div class="aspect-square w-full md:aspect-[4/3]">
                    <img :src="product.image ? '/storage/images/' + product.image : '/storage/images/default.png'"
                         class="h-full w-full object-cover rounded-t-lg">
                </div>

                {{-- <div class="absolute left-3 top-3 rounded-full bg-blue-600 px-3 py-1 text-xs text-white shadow">
                    Stok: <span x-text="product.quantity"></span>
                </div> --}}
            </div>

            <!-- Detail -->
            <div class="p-5 flex flex-col justify-between flex-grow">
                <h3 class="text-lg font-semibold" x-text="product.name"></h3>

                <p class="text-sm text-gray-500">
                    <span x-text="product.description.substring(0, 70) + '...'"></span>
                </p>

                <div class="mt-2 flex flex-col items-stretch justify-between gap-1.5 rounded-md py-1 pl-1 pr-1 md:flex-row md:items-center md:gap-2 md:rounded-lg md:bg-neutral-100 md:py-1.5 md:pl-4 md:pr-1.5">
                    <span class="font-bold" x-text="'Rp ' + new Intl.NumberFormat().format(product.price)"></span>

                    <button
                        @click="openModal(product)"
                        class="bg-primary-600 text-white px-3 py-2 rounded-lg text-sm hover:bg-primary-700">
                        Detail
                    </button>
                </div>
            </div>

        </div>
    </template>

            </div>
        </div>
        <div x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 p-4"
            x-transition.opacity>

            <div class="relative w-full max-w-2xl rounded-xl bg-white p-4 shadow-lg" x-transition>

                <!-- Close button -->
                <button type="button" @click="open=false"
                    class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">
                    <svg width="20" height="20" viewBox="0 0 15 15" fill="none">
                        <path
                            d="M11.78 4.03a.5.5 0 0 0-.71-.71L7.5 6.89 3.93 3.32a.5.5 0 0 0-.71.71L6.79 7.6l-3.57 3.57a.5.5 0 1 0 .71.71L7.5 8.31l3.57 3.57a.5.5 0 0 0 .71-.71L8.21 7.6l3.57-3.57Z"
                            fill="currentColor" />
                    </svg>
                </button>

                <h3 class="mb-4 border-b pb-2 font-bold text-gray-700">
                    Product Detail
                </h3>

                <div class="flex flex-col gap-6 md:flex-row">

                    <div class="flex w-full justify-center md:w-1/2">
                        <div class="aspect-square w-56 md:w-48">
                            <img :src="data.image" class="h-full w-full rounded-lg object-cover shadow">
                        </div>
                    </div>


                    <!-- Info -->
                    <div class="flex w-full flex-col md:w-1/2">

                        <h2 class="mt-2 text-xl font-semibold md:mt-0" x-text="data.name"></h2>

                        <p class="mt-1 text-sm text-gray-600" x-text="data.desc"></p>

                        <!-- Harga -->
                        <p class="text-primary-600 mt-2 text-lg font-bold">
                            <span x-text="formatPrice(data.price)"></span>
                        </p>

                        <!-- Qty -->
                        <div class="mt-4 flex items-center gap-4">
                            <button @click="decreaseQty" class="rounded-lg bg-gray-200 px-3 py-1">-</button>

                            <span class="text-lg" x-text="qty"></span>

                            <button @click="increaseQty" class="rounded-lg bg-gray-200 px-3 py-1">+</button>
                        </div>

                        <!-- Add to cart -->
                        <button @click="addToCart" class="bg-primary-600 mt-4 w-full rounded-lg py-2 text-white">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
    <script>
    function filterProducts() {
    return {
        sort: '',
        products: @json($products), // dari controller

        get sortedProducts() {
            let data = [...this.products];

            if (this.sort === 'cheap') {
                data.sort((a, b) => a.price - b.price);
            }
            if (this.sort === 'expensive') {
                data.sort((a, b) => b.price - a.price);
            }

            return data;
        }
    }
}
    </script>


</x-layout>
 
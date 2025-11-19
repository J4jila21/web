<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Header --}}
    <x-slot:header>
        <main class="bg-primary-100 px-5 py-8 md:gap-10 md:p-10 md:px-20 md:py-12">
            <div class="flex flex-col gap-3 py-20 text-center md:mx-auto md:w-9/12">
                <div class="flex items-start justify-center gap-2">
                    <div class="dots bg-primary-600 mt-2 h-3 w-3 rounded-full bg-opacity-50"></div>
                    <h2 class="text-center text-3xl font-bold">Berbagai kopi terbaik kami</h1>
                </div>
                <h1 class="text-3xl font-bold md:text-6xl">Temukan Kopi Terbaik Sesuai Pilihanmu</h1>
                <p class="text-base font-light text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, consequatur. Doloribus, quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.
                </p>
            </div>
        </main>
    </x-slot:header>
    <nav class="p-3 md:px-20" aria-label="Breadcrumb">
        <ol class="flex flex-wrap gap-1 text-sm text-gray-400">
            <li>
                <a href="/" class="font-semibold transition-colors hover:text-black" aria-current="page">Home</a>
            </li>
            <li class="[&>svg]:size-3.5">-</li>
            <li>
                <a href="/product" class="font-semibold transition-colors hover:text-black">Products</a>
            </li>
        </ol>
    </nav>
    {{-- Search Bar --}}
    <div class="mx-auto mb-20 max-w-3xl px-6">
        <form action="{{ route('product.index') }}" method="GET" class="relative">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Cari kopi, misalnya Toraja, Arabica..."
                class="w-full rounded-full border border-gray-300 py-3 pl-5 pr-12 text-gray-700 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-blue-600 p-2 text-white transition hover:bg-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-width="2"
                        d="m21 21-3.5-3.5M17 10a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
    </div>
    {{-- Produk Grid --}}
    <div x-data="productModal()">
        <div class="mx-auto max-w-7xl px-6" x-data="filterProducts()">
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

                <div class="absolute left-3 top-3 rounded-full bg-blue-600 px-3 py-1 text-xs text-white shadow">
                    Stok: <span x-text="product.quantity"></span>
                </div>
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

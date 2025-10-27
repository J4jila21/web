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
    <div class="mx-auto max-w-7xl px-6">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse ($products as $product)
                <div
                    class="flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white transition-all duration-300">
                    {{-- Gambar Produk --}}
                    <div class="relative">
                        <img src="{{ $product->image ? asset('storage/images/' . $product->image) : asset('storage/images/default.png') }}"
                            alt="product image"
                            class="h-52 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute left-3 top-3 rounded-full bg-blue-600 px-3 py-1 text-xs text-white shadow">
                            Stok: {{ $product->quantity }}
                        </div>
                    </div>
                    {{-- Detail Produk --}}
                    <div class="flex flex-grow flex-col justify-between p-5">
                        <div>
                            <h3 class="mb-2 text-lg font-semibold text-gray-800 group-hover:text-blue-600">
                                {{ $product->name }}
                            </h3>
                            <p class="mb-4 text-sm leading-relaxed text-gray-500">
                                {{ Str::limit($product->description, 70, '...') }}
                            </p>
                        </div>
                        {{-- Harga & Tombol --}}
                        <div class="mt-auto">
                            <div class="mb-3 flex items-center justify-between">
                                <span class="text-lg font-bold text-gray-900">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                            <button
                                class="bg-primary-600 w-full rounded-full py-2 font-semibold text-white transition hover:bg-blue-700">
                                Tambah ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <dotlottie-wc src="https://lottie.host/70b04043-3df6-470e-9770-02da5ab76921/PQfCwEPrix.lottie"
                        style="width: 300px;height: 300px; margin:auto" autoplay loop></dotlottie-wc>
                    <h3 class="text-xl font-semibold text-gray-600">Belum ada produk yang tersedia</h3>
                </div>
            @endforelse
        </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
</x-layout>

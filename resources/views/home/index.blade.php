<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>
        <main class="md:gap 20 bg-primary-100 px-5 py-8 md:p-10 md:px-20 md:py-12">
            <div class="gap-3 py-20 md:mx-auto md:text-left">
                <h1 class="flex items-center justify-center text-3xl font-bold md:text-3xl">Selamat Datang di indoweb
                </h1>
                <p class="flex items-center justify-center">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quisquam, consequatur. Doloribus, quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.
                </p>
            </div>

        </main>
    </x-slot:header>
    <div class="mx-auto max-w-7xl px-6">
        <h1 class="mb-5 text-3xl font-bold md:mx-auto md:text-center md:text-3xl">Produk Kopi Terbaik Untuk Menemani
            Santai</h1>
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @forelse ($products as $item)
                    <div
                        class="flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white transition-all duration-300">
                        {{-- Gambar Produk --}}
                        <div class="relative">
                            <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->name }}"
                                class="h-52 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div
                                class="absolute left-3 top-3 rounded-full bg-blue-600 px-3 py-1 text-xs text-white shadow">
                                Stok: {{ $item->quantity }}
                            </div>
                        </div>

                        {{-- Detail Produk --}}
                        <div class="flex flex-grow flex-col justify-between p-5">
                            <div>
                                <h3 class="mb-2 text-lg font-semibold text-gray-800 group-hover:text-blue-600">
                                    {{ $item->name }}
                                </h3>
                                <p class="mb-4 text-sm leading-relaxed text-gray-500">
                                    {{ Str::limit($item->description, 70, '...') }}
                                </p>
                            </div>

                            {{-- Harga & Tombol --}}
                            <div class="mt-auto">
                                <div class="mb-3 flex items-center justify-between">
                                    <span class="text-lg font-bold text-gray-900">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
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
                        <img src="{{ asset('img/empty-state.svg') }}" alt="Produk Kosong"
                            class="mx-auto mb-6 w-48 opacity-80">
                        <h3 class="text-xl font-semibold text-gray-600">Belum ada produk yang tersedia</h3>
                        <p class="mt-2 text-gray-500">Silakan kembali lagi nanti atau hubungi admin toko.</p>
                        <a href="/"
                            class="mt-6 inline-block rounded-full bg-blue-600 px-5 py-2 text-white transition hover:bg-blue-700">
                            Kembali ke Beranda
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="mt-10 flex w-full justify-center">
            <a class="bg-primary-600 hover:bg-primary-700 flex h-11 items-center justify-center rounded-full px-5 text-white transition-all duration-300"
                href="/product">Lihat lainnya
            </a>
        </div>
    </div>
</x-layout>

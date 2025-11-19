<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>
        <main 
    class="relative bg-primary-100 px-5 py-8 md:p-10 bg-cover bg-center bg-no-repeat"
    style="background-image: url('/img/coffe.jpg');"
>
    <!-- Overlay gelap tipis -->
    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative md:gap-20">
        <div class="flex items-center justify-center md:items-center">
            <div class="flex flex-col gap-3 py-32 items-start md:mx-auto md:w-9/12">
                <div class="flex flex-col gap-3 md:w-8/12">
                    <h1 class="text-3xl font-bold md:text-6xl text-white">
                        Waktunya Ngopi Bareng Seduhin
                    </h1>
                    <p class="text-base font-light text-gray-200">
                        Nikmati momen terbaikmu bersama secangkir kopi racikan Seduhin —
                        dibuat dari biji kopi pilihan, diseduh dengan cinta, dan siap menemani
                        setiap langkah harimu.
                    </p>

                    <div class="flex gap-3 flex-col md:flex-row w-full text-center">
                        <a class="px-6 py-3 bg-primary-500 text-white font-bold hover:bg-white rounded-lg hover:text-primary-500 transition-all duration-300" href="/product">
                            Pesan Sekarang
                        </a>
                        <a class="px-6 py-3 bg-white text-primary-500 font-bold hover:bg-primary-500 rounded-lg hover:text-white transition-all duration-300" href="/about">
                            Lihat Selengkapnya
                        </a>
                    </div>
                </div>
            </div>
        </div>
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
        <div class="flex flex-col gap-3 mt-20">
            <h1 class="text-xl text-start md:text-3xl text-primary-500">Kata Customer Kami</h1>
            <div class="flex flex-col gap-3 items-start md:mx-auto md:w-full md:flex-row md:gap-5">
                <div class="flex flex-col gap-2 p-5 border hover:bg-white transition-colors border-gray-200 rounded-lg">
                    <div class="flex flex-row gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                    </div>
                        <h2 class="text-lg font-bold text-primary-500 flex flex-row gap-2 items-center">yanto
                        <div class="flex justify-center items-center w-[16px] h-[16px] bg-green-500 rounded-full shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 text-white"><path d="M20 6 9 17l-5-5"></path></svg></div>
                        </h2>
                        <p class="text-gray-500 text-base italic">"kopinya enak rasanya pas diminum bisa bikin semangat dan santai"</p>
                </div>
                <div class="flex flex-col gap-2 p-5 border hover:bg-white transition-colors border-gray-200 rounded-lg">
                    <div class="flex flex-row gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" data-slot="icon" class="w-4 h-4 text-yellow-500"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"></path></svg>
                    </div>
                        <h2 class="text-lg font-bold text-primary-500 flex flex-row gap-2 items-center">Alex
                        <div class="flex justify-center items-center w-[16px] h-[16px] bg-green-500 rounded-full shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check w-3 h-3 text-white"><path d="M20 6 9 17l-5-5"></path></svg></div>
                        </h2>
                        <p class="text-gray-500 text-base italic">"Rasa kopi yang enak rasanya pas diminum bisa bikin semangat dan santai"</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>

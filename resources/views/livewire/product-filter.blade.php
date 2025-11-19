<div>

    {{-- Filter --}}
    <div class="mb-5 flex justify-end">
        <select wire:model="sort" 
            class="border border-gray-300 rounded-lg px-3 py-2 text-sm shadow">
            <option value="">Urutkan</option>
            <option value="cheap">Termurah</option>
            <option value="expensive">Termahal</option>
        </select>
    </div>

    {{-- Produk Grid --}}
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">
        @forelse ($products as $product)
            <div class="flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white">

                {{-- Gambar --}}
                <div class="relative">
                    <div class="w-full aspect-square md:aspect-[4/3]">
                        <img src="{{ $product->image ? asset('storage/images/' . $product->image) : asset('storage/images/default.png') }}"
                             class="w-full h-full object-cover rounded-t-lg">
                    </div>

                    <div class="absolute left-3 top-3 bg-blue-600 px-3 py-1 text-xs text-white rounded-full shadow">
                        Stok: {{ $product->quantity }}
                    </div>
                </div>

                {{-- Detail --}}
                <div class="p-5 flex flex-col justify-between flex-grow">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-500">
                            {{ Str::limit($product->description, 70) }}
                        </p>
                    </div>

                    <div class="mt-3 flex items-center justify-between">
                        <span class="font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>

                        <button 
                            wire:click="$emit('openProduct', {{ $product->id }})"
                            class="bg-primary-600 text-white px-3 py-2 rounded-lg text-sm hover:bg-primary-700">
                            Detail
                        </button>
                    </div>
                </div>

            </div>

        @empty
            <p class="col-span-full text-center text-gray-500 py-10">
                Tidak ada produk ditemukan.
            </p>
        @endforelse
    </div>

</div>

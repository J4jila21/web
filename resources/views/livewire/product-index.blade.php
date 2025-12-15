
<main class="h-full w-full md:ltr:ml-64 md:ltr:mr-64">
    
    <div class="max-w-full px-6 py-12 lg:px-20">

        {{-- Notifikasi popup --}}
        @if (session('message'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition.opacity.duration.500ms
        class="fixed right-1/2 top-5 z-50 translate-x-1/2 transform rounded border border-green-500 bg-green-100 px-4 py-2 text-green-700 shadow-lg"
    >
        {{ session('message') }}
    </div>
@endif
        <div class="mt-20 px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 border-gray-200 rounded-t-lg">
            <div class="sm:flex items-center justify-between">
                    <p class="text-sm font-bold text-gray-800">Product</p>
                {{-- Live Search Input --}}
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari Produk..."
                        class="focus:border-primary-500 w-full rounded border-gray-300 p-2 sm:w-1/2">
                    <div class="space-x-3 flex">
                    {{-- Sorting Dropdown --}}
                    <select wire:model.live.debounce.300ms="shortBy"
                        class="focus:border-primary-500 w-full rounded border-gray-300 p-2 sm:w-44">
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                        <option value="expensive">Termahal</option>
                        <option value="quantity">Terbanyak</option>
                    </select>
                <button wire:click="openModal()" class="flex items-center rounded bg-blue-600 px-4 py-2 text-white">
            Buat Product
        </button>
                </div>

            </div>
        </div>
        <div class="w-full border-collapse overflow-hidden border !border-t-0 border-gray-200 shadow-sm">
            {{-- Modal Tambah/Edit --}}
            <div x-data="{ open: @entangle('showModal') }" x-show="open" x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div x-transition
                    class="w-96 scale-95 transform rounded-lg bg-white p-6 transition-transform duration-200"
                    @click.away="open = false">
                    <h3 class="mb-3 text-lg font-semibold">{{ $isEdit ? 'Edit Produk' : 'Tambah Produk' }}</h3>
                    <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="space-y-3">
                        <input type="text" wire:model="name" placeholder="Nama Produk"
                            class="w-full rounded border p-2">
                        <input type="number" wire:model="price" placeholder="Harga" class="w-full rounded border p-2">
                        <input type="number" wire:model="quantity" placeholder="Quantity"
                            class="w-full rounded border p-2">
                        <textarea wire:model="description" placeholder="Deskripsi" class="w-full rounded border p-2"></textarea>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700">Upload Gambar</label>

                            <!-- Input File Custom -->
                            <label for="imageUpload"
                                class="flex h-40 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed bg-gray-50 transition hover:bg-gray-100">
                                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                    <svg class="mb-1 h-8 w-8 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                    </svg>
                                        <p class="text-sm text-gray-500">Klik untuk pilih gambar</p>
                                        <p class="text-xs text-gray-400">JPEG, JPG, PNG, WEBP | Max 2MB</p>
                                </div>
                                <input id="imageUpload" type="file" class="hidden" wire:model="image"
                                    accept="image/*">
                            </label>

                            <!-- Validasi -->
                            @error('image')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror

                            @if ($previewImage)
                                <div class="relative mt-2 w-40" wire:loading.remove wire:target="image">
                                    <img src="{{ $previewImage }}"
                                        class="h-40 w-full rounded-lg border object-cover shadow-md">

                                    <button type="button" wire:click="removeImage"
                                        class="absolute right-1 top-1 rounded-full bg-red-500 p-1 text-xs text-white shadow hover:bg-red-700">
                                        ✕
                                    </button>
                                </div>
                            @endif

                            <!-- Loading saat upload -->
                            <div wire:loading wire:target="image" class="text-sm text-gray-600">
                                Mengupload gambar...
                            </div>
                        </div>


                        <div class="mt-3 flex justify-end gap-2">
                            <button type="button" @click="open=false" wire:click="closeModal()"
                                class="rounded border px-4 py-2">Batal</button>
                            <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white"
                                wire:loading.attr="disabled">
                                <span wire:loading.remove>Simpan</span>
                                <span wire:loading>Loading...</span>
                            </button>


                        </div>
                    </form>
                </div>
            </div>

            {{-- Modal View --}}{{-- Modal View Product --}}
            <div x-data="{ openView: @entangle('showViewModal') }" x-show="openView" x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div x-transition
                    class="w-96 scale-95 transform rounded-lg bg-white p-6 shadow-lg transition duration-200"
                    @click.away="openView = false">

                    <h3 class="mb-3 text-lg font-semibold">Detail Produk</h3>

                    @if ($selectedProduct)
                        <img src="{{ asset('storage/images/' . $selectedProduct->image) }}"
                            class="mx-auto mb-3 h-24 w-24 rounded-lg">

                        <p><strong>Nama:</strong> {{ $selectedProduct->name }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($selectedProduct->price) }}</p>
                        <p><strong>Quantity:</strong> {{ $selectedProduct->quantity }}</p>
                        <p><strong>Deskripsi:</strong> {{ $selectedProduct->description }}</p>
                    @endif

                    <div class="mt-4 text-right">
                        <button @click="openView=false"
                            class="border-primary-500 rounded border px-4 py-2">Tutup</button>
                    </div>
                </div>
            </div>

            <div x-data="{ openModalView: @entangle('showModal') }" x-show="openModalView" x-cloak
                class="z-40top-right absolute right-0 mt-2 w-44 rounded-md bg-white shadow-lg">
                <div class="py-1">
                    <a class="flex items-center px-4 py-2 text-sm text-gray-800" href="/blog"
                        wire:click="openModalView()"></a>
                </div>
            </div>
            {{-- Modal Hapus --}}
            <div x-data="{ openDelete: @entangle('showDeleteModal') }" x-show="openDelete" x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div x-transition class="w-80 rounded-lg bg-white p-6 text-center">
                    <p class="mb-4">Apakah Anda yakin ingin menghapus produk ini?</p>
                    <div class="flex justify-center gap-3">
                        <button wire:click="$set('showDeleteModal', false)"
                            class="rounded border px-4 py-2">Batal</button>
                        <button wire:click="delete()" class="rounded bg-red-600 px-4 py-2 text-white">Hapus</button>
                    </div>
                </div>
            </div>

            
            {{-- Daftar Produk --}}
            <table class="w-full overflow-hidden shadow-sm">
                <thead>
                    <tr class="bg-gray-200 h-16">
                        <th class="p-5 text-start">Products</th>
                        <th class="p-2">Harga</th>
                        <th class="p-2">Quantity</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr wire:key="row-{{ $product->id }}" class="border-b hover:bg-gray-100">
                            
                            <td class="p-5 text-start">
                                <div class="flex">
                                    <div>
                                <img src="{{ asset('storage/images/' . $product->image) }}"
                                    alt="{{ $product->name }}" class="mx-auto h-12 w-12 rounded-lg">
                            </div>
                                <div class="ml-3">
                                    <span class="font-semibold">{{ $product->name }}</span>
                                </div>
                            </td>
                            
                            <td class="p-2 text-center">Rp {{ number_format($product->price) }}</td>
                            <td class="p-2 text-center">{{ $product->quantity }}</td>
                            <td class="p-2 text-center">
                                <div x-data="{
                                    open: false,
                                    position: 'bottom',
                                    checkPosition() {
                                        this.$nextTick(() => {
                                            const dropdown = this.$refs.dropdown.getBoundingClientRect();
                                            const spaceBelow = window.innerHeight - dropdown.bottom;
                                
                                            this.position = spaceBelow < 120 ? 'top' : 'bottom';
                                        });
                                    }
                                }" class="relative inline-block">

                                    <!-- Trigger Button -->
                                    <button @click="open = !open; checkPosition()"
                                        class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>

                                    <!-- Dropdown -->
                                    <div x-show="open" x-ref="dropdown" @click.away="open = false" x-transition x-cloak
                                        :class="position === 'top'
                                            ?
                                            'bottom-full mb-2' :
                                            'top-full mt-2'"
                                        class="absolute right-0 z-50 w-44 rounded-lg border bg-white shadow-lg">

                                        <button @click="$wire.openModalView({{ $product->id }}); open=false"
                                            class="flex w-full items-center gap-2 px-4 py-2 text-gray-800 hover:bg-gray-100">
                                            View Product
                                        </button>

                                        <button @click="$wire.openModalEdit({{ $product->id }}); open=false"
                                            class="flex w-full items-center gap-2 px-4 py-2 text-blue-600 hover:bg-gray-100">
                                            Edit
                                        </button>

                                        <button @click="$wire.openDeleteModal({{ $product->id }}); open=false"
                                            class="flex w-full items-center gap-2 px-4 py-2 text-red-600 hover:bg-gray-100">
                                            Delete
                                        </button>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-t-0 border-gray-200 rounded-b-lg ">
            <div class="mt-2">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</main>

<main class="mt-20 h-full w-full md:ltr:ml-64 md:ltr:mr-64">
<div class="py-12 container !max-w-full px-6 lg:px-20">
    <div class="px-4 flex justify-between md:px-3 py-4 md:py-5 bg-white border !border-b-0 border-gray-200 rounded-t-lg">
        <input type="text" wire:model.live.debounce.300ms="search"
            class="border-gray-500 focus:border-primary-500 rounded-lg p-2 w-1/3" placeholder="pending, porcess, done.....">

        <div class="flex items-center gap-2">
            <label class="text-sm text-gray-600">Urutkan:</label>
            <select wire:model.live="sortOrder"
                class="focus:border-primary-500 w-full rounded border-gray-300 p-2 sm:w-44">
                <option value="desc">Terbaru</option>
                <option value="asc">Terlama</option>
            </select>
        </div>
        </div>
    <div class="bg-white border-gray-300 shadow-sm rounded-lg">
    <table class="w-full overflow-hidden shadow-sm border border-b-0 border-t-0">
        <thead class="bg-gray-200">
            <tr class="w-full h-16 text-sm text-slate-500">
                <th class="p-2 text-center">ID</th>
                <th class="p-2 text-start">PEMBELI</th>
                <th class="p-2 text-start">PRODUK</th>
                <th class="p-2 text-center">TOTAL</th>
                <th class="p-2 text-center">DITEMPATKAN</th>
                <th class="p-2 text-center">STATUS</th>
                <th class="p-2 text-center">PILIHAN</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="p-2 text-center">{{ $order->id }}</td>
                    <td class="p-2 text-start">
                        <span class="font-semibold">{{ $order->user->name }}</span>
                        <span class="text-gray-600 block text-xs font-medium">{{ $order->user->email }}</span>
                    </td>
                    <td class="p-2 text-start flex items-center gap-5">
    @foreach ($order->items as $item)
        <div>
            <img src="{{ asset('storage/images/' . $item->product->image) }}"
                 class="w-12 h-12 object-cover rounded">
        </div>
                 <div class="text-sm">
            <span class="font-semibold">{{ $item->product->name }}</span>
            <span class="text-gray-600">(x{{ $item->quantity }})</span>
        </div>
    @endforeach
</td>

                    <td class="p-2 text-center">Rp {{ number_format($order->total) }}</td>
                    <td class="p-2 text-center">{{ $order->payment_method }}</td>
                    <td class="p-2 text-center">
    @if ($order->status == 'pending')
        <span class="px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-600 rounded-full">
            Pending
        </span>
    @elseif ($order->status == 'process')
        <span class="px-3 py-1 text-xs font-semibold bg-purple-100 text-purple-600 rounded-full">
            Process
        </span>
    @elseif ($order->status == 'done')
        <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-600 rounded-full">
            Done
        </span>
    @endif
</td>

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
    
                                            {{-- <a href="{{ route('admin.blogs.show', $post->id) }}"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-gray-800 hover:bg-gray-100">
                                                View Product
                                            </a> --}}
    
                                            {{-- <a href="{{ route('admin.blogs.edit', $post->id) }}"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-blue-600 hover:bg-gray-100">
                                                Edit
                                            </a> --}}
    
                                            <button wire:click="UpdateOrder({{ $order->id }}, 'pending'); open=false"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-yellow-600 hover:bg-gray-100">
                                                Pending
                                            </button>

                                            <button wire:click="UpdateOrder({{ $order->id }}, 'process'); open=false"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-purple-600 hover:bg-gray-100">
                                                Process
                                            </button>

                                            <button wire:click="UpdateOrder({{ $order->id }}, 'done'); open=false"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-green-600 hover:bg-gray-100">
                                                Done
                                            </button>
    
                                        </div>
                                    </div>
                                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
<div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-t-0 border-gray-300 rounded-b-lg ">
        <div class="mt-4">{{ $orders->links() }}</div>
        </div>
</div>
</main>

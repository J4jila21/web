<x-layouts :title="$title">
        <h1 class="mb-4 text-2xl font-semibold text-primary-700">Pesanan Saya</h1>
        <div class="flex flex-col md:flex-row flex-wrap gap-2 justify-between mt-4 relative">
        <div class="flex flex-row items-center gap-4">

    <form method="POST" action="{{ route('user.pesanan') }}">
        @csrf
        <input type="hidden" name="status" value="all">
        <button type="submit"
            class="px-3 py-1 rounded-lg text-sm
            {{ $status == 'all' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Semua
        </button>
    </form>

    <form method="POST" action="{{ route('user.pesanan') }}">
        @csrf
        <input type="hidden" name="status" value="pending">
        <button type="submit"
            class="px-3 py-1 rounded-lg text-sm
            {{ $status == 'pending' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Pending
        </button>
    </form>

    <form method="POST" action="{{ route('user.pesanan') }}">
        @csrf
        <input type="hidden" name="status" value="process">
        <button type="submit"
            class="px-3 py-1 rounded-lg text-sm
            {{ $status == 'process' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Process
        </button>
    </form>

    <form method="POST" action="{{ route('user.pesanan') }}">
        @csrf
        <input type="hidden" name="status" value="done">
        <button type="submit"
            class="px-3 py-1 rounded-lg text-sm
            {{ $status == 'done' ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-700' }}">
            Done
        </button>
    </form>

</div>

        <div class="flex flex-row items-center gap-2 mb-4">
            <label for="sort_by" class="mr-2 font-medium text-gray-700">Urutkan:</label>
            <form method="GET" action="{{ route('user.pesanan') }}">
                <select name="sort_order"  class="border-gray-300 focus:border-primary-500 w-44 p-2 rounded-lg " onchange="this.form.submit()">
                    <option value="desc" {{ $sortOrder == 'desc' ? 'selected' : '' }}>Terbaru</option>
                    <option value="asc" {{ $sortOrder == 'asc' ? 'selected' : '' }}>Terlama</option>
                </select>
            </form>
        </div>
        </div>
        <div class="mt-4 flex flex-col gap-4">
            @forelse ($orders as $order)
                <div class="flex flex-col gap-4 rounded-lg border border-gray-200 bg-white p-4">

                    @foreach ($order->items as $item)
                            <div class="flex flex-col gap-4 md:flex-row">
                                {{-- Gambar produk --}}
                                <div class="flex flex-row gap-4">
                                <img src="{{ asset('storage/images/' . $item->product->image) }}"
                                    alt="{{ $item->product->name }}" class="h-16 w-16 rounded-lg object-cover">

                                <div class="flex flex-col">
                                    <h3 class="font-semibold text-gray-700">
                                        {{ $item->product->name }}
                                    </h3>
                                    <div class="flex items-center gap-2">
                                        <p class="text-sm text-gray-500">
                                            x{{ $item->quantity }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Rp {{ number_format($item->product->price * $item->quantity) }}
                                        </p>
                                    </div>
                                </div>
                                </div>
                                <div class="flex flex-row flex-wrap gap-4 ps-2 mt-4 md:mt-0">
                                    <div class="flex flex-col">
                                        <p class="text-sm text-gray-500">Tanggal Order</p>
                                        <span class="text-sm text-gray-500">{{ $order->created_at }}</span>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-sm text-gray-500">Status</p>
                                        <span class="text-sm text-gray-500">
                                            @if ($order->status == 'pending')
                                                <span
                                                    class="rounded-lg bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-600">
                                                    Pending
                                                </span>
                                            @elseif ($order->status == 'process')
                                                <span
                                                    class="rounded-lg bg-purple-100 px-3 py-1 text-xs font-semibold text-purple-600">
                                                    Process
                                                </span>
                                            @elseif ($order->status == 'done')
                                                <span
                                                    class="rounded-lg bg-green-100 px-3 py-1 text-xs font-semibold text-green-600">
                                                    Done
                                                </span>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="flex flex-col">
                                        <p class="text-sm text-gray-500">Total</p>
                                        <span class="text-sm text-gray-500">Rp
                                            {{ number_format($item->product->price * $item->quantity) }}</span>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-gray-500">Total Pesanan: 
                            <span class="text-primary-600 font-bold">Rp {{ number_format($order->total) }}</span>
                        </p>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('user.detail.pesanan', $order->id) }}"
                                class="text-sm bg-primary-600 py-1 px-4 rounded-full text-white hover:bg-primary-700 transition-all duration-300">Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">Belum ada pesanan</p>
            @endforelse
        </div>
</x-layouts>

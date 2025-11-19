{{-- resources/views/user/detail-pesanan.blade.php --}}
<x-layouts>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-semibold text-primary-700 mb-4">Detail Pesanan</h1>

        {{-- Info Utama Pesanan --}}
        <div class="mb-6 border-b pb-4">
            <p class="text-sm text-gray-600">ID Pesanan:</p>
            <p class="font-semibold text-gray-800">#{{ $order->id }}</p>

            <p class="text-sm text-gray-600 mt-2">Tanggal Pesanan:</p>
            <p class="font-semibold text-gray-800">{{ $order->created_at }}</p>

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
        </div>

        {{-- Daftar Item Pesanan --}}
        <h2 class="text-lg font-semibold text-gray-800 mb-3">Item Pesanan</h2>

        <div class="flex flex-col gap-4 mb-6">
            @foreach ($order->items as $item)
                <div class="flex flex-col md:flex-row gap-4 border rounded-lg p-4">
                    <img src="{{ asset('storage/images/' . $item->product->image) }}" class="w-20 h-20 object-cover rounded-lg" />

                    <div class="flex flex-col justify-between">
                        <div>
                            <p class="font-semibold text-gray-700 text-lg">{{ $item->product->name }}</p>
                            <p class="text-sm text-gray-500">x{{ $item->quantity }}</p>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Harga: Rp {{ number_format($item->product->price) }}</p>
                        <p class="text-sm font-semibold text-primary-600">Subtotal: Rp {{ number_format($item->product->price * $item->quantity) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Total Pesanan --}}
        <div class="flex items-center justify-between border-t pt-4">
            <p class="font-semibold text-gray-700">Total Pembayaran:</p>
            <p class="text-xl font-bold text-primary-700">Rp {{ number_format($order->total) }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('user.pesanan') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-gray-700 hover:bg-gray-300 transition">Kembali</a>
        </div>
    </div>
</x-layouts>

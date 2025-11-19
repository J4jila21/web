<x-layouts :title="$title">

    <div class="text-gray-500 text-sm">Halo, Selamat Datang</div>
    <h3 class="text-2xl">{{ auth()->user()->name }}</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <h4 class="text-6xl mt-10 font-bold text-amber-700">{{ $total_orders }}</h4>
            <h3 class="text-xl sm:text-xltext-gray-500">Total Pesanan</h3>
        </div>

        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <h4 class="text-6xl font-bold text-amber-700 mt-10">{{ $orders_process }}</h4>
            <h3 class="text-gray-500 text-xl sm:text-2xl">Pesanan Diproses</h3>
        </div>

        <div class="bg-white rounded-xl p-6 border border-gray-200 text-center">
            <h4 class="text-6xl font-bold text-amber-700 mt-10">{{ $orders_done }}</h4>
            <h3 class="text-gray-500 text-xl sm:text-2xl">Pesanan Selesai</h3>
        </div>
    </div>

    <div class="mt-10 bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Pesanan Terbaru</h2>

        <table class="min-w-full border text-sm text-gray-700">
            <tbody>
    @foreach ($latest_orders as $order)
        <tr class="border-b">
            <td class="py-2 px-4">{{ $order->items->first()->product->name ?? '-' }}</td>
            <td class="py-2 px-4">{{ $order->created_at->format('d M Y') }}</td>

            <td class="py-2 px-4">
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
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</x-layouts>

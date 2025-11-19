<div>
    <div class="p-6 max-w-xl mx-auto">
    <h2 class="text-xl font-semibold mb-4">Edit Pesanan #{{ $order->id }}</h2>

    @if (session('success'))
        <div class="p-3 bg-green-200 text-green-800 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-3">
        <div>
            <label class="font-medium">Nama Customer</label>
            <p class="border p-2 rounded bg-gray-100">{{ $order->customer_name }}</p>
        </div>

        <div>
            <label class="font-medium">Total Pembayaran</label>
            <p class="border p-2 rounded bg-gray-100">Rp {{ number_format($order->total) }}</p>
        </div>

        <div>
            <label class="font-medium">Status Pesanan</label>
            <select wire:model="status" class="border p-2 rounded w-full">
                <option value="pending">Pending</option>
                <option value="process">Process</option>
                <option value="done">Done</option>
            </select>
        </div>

        <button 
            wire:click="updateOrder"
            class="w-full p-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
            Update Status
        </button>
    </div>
</div>

</div>

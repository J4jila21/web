<x-layout title="Checkout">
    <div 
        x-data="checkoutPage()" 
        class="max-w-2xl mx-auto bg-white shadow-sm border border-gray-200 rounded-xl p-6 space-y-6"
    >
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Payment</h2>

        <!-- Item -->
        <template x-for="item in cart" :key="item.id">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <img :src="item.image" alt="" class="w-16 h-16 rounded-md object-cover">
                    <div>
                        <h3 class="text-gray-800 font-medium" x-text="item.name"></h3>
                        <p class="text-gray-500 text-sm" x-text="item.category ?? 'Produk'"></p>
                    </div>
                </div>

                <div class="text-right">
                    <p class="text-gray-800 font-semibold" 
                        x-text="formatRupiah(item.price * item.quantity)">
                    </p>
                    <div class="flex items-center justify-end mt-2">
                        <button @click="decrease(item)" class="px-2 border rounded-l">−</button>
                        <span class="px-3 border-t border-b" x-text="item.quantity"></span>
                        <button @click="increase(item)" class="px-2 border rounded-r">+</button>
                    </div>
                </div>
            </div>
        </template>

        <!-- Metode Pembayaran -->
        <div class="bg-gray-50 p-4 rounded-lg">
            <label class="block text-gray-800 font-semibold mb-2">Metode Pembayaran</label>
            <select 
                x-model="paymentMethod" 
                class="w-full border-gray-300 rounded-lg focus:ring-amber-500 focus:border-amber-500"
            >
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="qris">QRIS</option>
                <option value="cash">Tunai (Cash)</option>
            </select>
        </div>

        <!-- Detail Pembayaran -->
        <div class="space-y-1 text-gray-700 text-sm">
            <div class="flex justify-between"><span>Payment Fee</span><span x-text="formatRupiah(paymentFee)"></span></div>
            <div class="flex justify-between"><span>Sub total</span><span x-text="formatRupiah(subtotal)"></span></div>
            <div class="flex justify-between"><span>Diskon</span><span x-text="formatRupiah(discount)"></span></div>
            <div class="flex justify-between font-semibold text-lg border-t pt-2">
                <span>Total</span><span x-text="formatRupiah(total)"></span>
            </div>
        </div>

        <!-- Tombol Checkout -->
        <button 
            @click="checkout"
            class="w-full bg-teal-400 hover:bg-teal-500 text-white rounded-full py-3 font-semibold flex items-center justify-center gap-2 transition"
        >
            Checkout
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Modal Pembayaran -->
        <div 
            x-show="showModal"
            x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
        >
            <div class="bg-white rounded-xl p-6 w-96 text-center relative">
                <button @click="showModal=false" class="absolute right-3 top-3 text-gray-400 hover:text-gray-600">✕</button>

                <!-- QRIS -->
                <template x-if="paymentMethod === 'qris'">
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Pembayaran QRIS</h3>
                        <img 
                            :src="qrisImage" 
                            alt="QRIS Code" 
                            class="mx-auto w-56 h-56 border rounded-lg shadow"
                        >
                        <p class="mt-4 text-gray-700">Total: <span class="font-semibold" x-text="formatRupiah(total)"></span></p>
                        <p class="text-sm text-gray-500 mt-2">Silakan scan QR di atas untuk menyelesaikan pembayaran.</p>
                        <button 
        @click="confirmPayment"
        class="mt-4 w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded-lg">
        Saya Sudah Bayar
    </button>
                    </div>

                </template>

                <!-- Tunai -->
                <template x-if="paymentMethod === 'cash'">
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800">Pembayaran Tunai (Cash)</h3>
                        <div class=" w-full border-green-400 rounded-lg"><p class="text-gray-700">Silakan beritahu kasir untuk melakukan pembayaran tunai.</p></div>

                    </div>
                </template>
            </div>
        </div>
    </div>


<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('checkoutPage', () => ({
    cart: Alpine.store('cart').items,
    paymentMethod: '',
    coupon: '',
    discount: 0,
    paymentFee: 5000,
    showModal: false,
    qrisImage: '',

    get subtotal() {
        return this.cart.reduce((sum, i) => sum + (i.price * i.quantity), 0);
    },
    get total() {
        return this.subtotal - this.discount + this.paymentFee;
    },

    formatRupiah(value) {
        return 'Rp ' + value.toLocaleString('id-ID');
    },

    increase(item) { Alpine.store('cart').increase(item); },
    decrease(item) { Alpine.store('cart').decrease(item); },

    checkout() {
        if (!this.paymentMethod) {
            alert('Pilih metode pembayaran terlebih dahulu!');
            return;
        }

        if (this.paymentMethod === 'qris') {
            const qrText = `Pembayaran sebesar Rp${this.total}`;
            this.qrisImage = `https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=${encodeURIComponent(qrText)}`;
        }

        this.showModal = true;
    },

    // 🔥 FIX: ini yang hilang
    confirmPayment() {
        fetch('/checkout/store', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token]').content
            },
            body: JSON.stringify({
                payment_method: this.paymentMethod,
                payment_fee: this.paymentFee,
                discount: this.discount,
                total: this.total,
                cart: this.cart
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                this.showModal = false;
                alert('Pembayaran berhasil! Pesanan sedang diverifikasi.');
                Alpine.store('cart').clear();
                window.location.href = '/user/pesanan';
            }
        });
    }
}));
});


</script>
</x-layout>

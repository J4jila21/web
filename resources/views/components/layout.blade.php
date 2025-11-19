@props(['title' => 'Coffe Shop', 'hideNavbar', 'hideFooter' => false])
<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <link rel="icon" type="image/png" href="https://unweeded-mabel-unobstruently.ngrok-free.dev/img/seduhin_logo.ico">


    <title>{{ $title }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script>
        document.addEventListener('alpine:init', () => {

            // ✅ Store untuk keranjang
            Alpine.store('cart', {
                items: JSON.parse(localStorage.getItem('cart') || '[]'),

                get totalItems() {
                    return this.items.reduce((sum, i) => sum + i.quantity, 0);
                },
                get total() {
                    return this.items.reduce((sum, i) => sum + i.price * i.quantity, 0);
                },
                save() {
                    localStorage.setItem('cart', JSON.stringify(this.items));
                },
                add(product) {
                    const existing = this.items.find(i => i.id === product.id);
                    if (existing) existing.quantity++;
                    else this.items.push(product);
                    this.save();
                },
                increase(item) {
                    item.quantity++;
                    this.save();
                },
                decrease(item) {
                    if (item.quantity > 1) item.quantity--;
                    else this.remove(item.id);
                    this.save();
                },
                remove(id) {
                    this.items = this.items.filter(i => i.id !== id);
                    this.save();
                },
                clear() {
                    this.items = [];
                    this.save();
                }
            });

            // ✅ Component Modal Cart
            Alpine.data('cartMenu', () => ({
                open: false,
                get cart() {
                    return Alpine.store('cart').items;
                },
                get totalItems() {
                    return Alpine.store('cart').totalItems;
                },
                get total() {
                    return Alpine.store('cart').total;
                },
                toggleCart() {
                    this.open = !this.open;
                },
                showCart() {
                    this.open = true;
                },
                increase(item) {
                    Alpine.store('cart').increase(item);
                },
                decrease(item) {
                    Alpine.store('cart').decrease(item);
                },
                remove(id) {
                    Alpine.store('cart').remove(id);
                }
            }));
            
            Alpine.data('cartHandler', () => ({
    addToCart(product) {
        Alpine.store('cart').add(product);
    },
}));
// ✅ Component Checkout Page
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

    applyCoupon() {
        if (this.coupon === 'DISKON10') {
            this.discount = this.subtotal * 0.1;
            alert('Kupon berhasil diterapkan!');
        } else {
            this.discount = 0;
            alert('Kode kupon tidak valid');
        }
    },

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
    @livewireStyles
</head>
<body class="bg-white font-sans overflow-visible pb-20 md:pb-0">
    <div class="sticky top-0 z-50 w-full border-b border-gray-200 bg-white">
        @include('components.navbar')
    </div>

    @isset($header)
        <header>{{ $header }}</header>
    @endisset

    <main class="pt-20 mx-auto max-w-7xl py-6 sm:px-6 lg:px-8 pb-20">
        {{ $slot }}
    </main>

    @unless ($hideFooter ?? false)
        @include('components.footer')
    @endunless
    @stack('scripts')
    <script> 
function productModal() {
    return {
        open: false,
        data: {},
        qty: 1,

        openModal(product) {
            this.data = {
                id: product.id,
                name: product.name,
                desc: product.description,
                price: product.price,
                image: product.image 
                    ? '/storage/images/' + product.image 
                    : '/storage/images/default.png'
            };

            this.qty = 1;
            this.open = true;
        },

        closeModal() {
            this.open = false;
        },

        increaseQty() { this.qty++ },
        decreaseQty() { if (this.qty > 1) this.qty-- },

        formatPrice(value) {
    if (!value) return 'Rp 0';
    return 'Rp ' + Number(value).toLocaleString('id-ID');
},

        addToCart() {
            // 🔥 Kirim event Alpine global ke cartMenu()
            window.dispatchEvent(new CustomEvent("add-to-cart", {
                detail: {
                    id: this.data.id,
                    name: this.data.name,
                    price: this.data.price,
                    image: this.data.image,
                    quantity: this.qty
                }
            }));

            this.open = false; // tutup modal produk
        }
    }
}
// Listener untuk menerima event 'add-to-cart'
    window.addEventListener("add-to-cart", (event) => {
        Alpine.store('cart').add({
            id: event.detail.id,
            name: event.detail.name,
            price: event.detail.price,
            image: event.detail.image,
            quantity: event.detail.quantity,
        });

        // 🔥 Auto buka keranjang setelah tambah item
        const cartMenu = document.querySelector('[x-data="cartMenu()"]')?._x_dataStack?.[0];
        if (cartMenu) {
            cartMenu.open = true;
        }
    });

</script>

@livewireScripts

</body>
</html>

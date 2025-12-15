<nav x-data="{ mobileOpen: false }"
    class="fixed top-0 left-0 w-full z-50 border-b border-white/10
           bg-gradient-to-r from-[#0B2447]/90 via-[#19376D]/90 to-[#0B2447]/90
           backdrop-blur-md shadow-lg">
    <div class="mx-auto max-w-7xl px-4 lg:px-6">
        <div class="flex items-center justify-between py-3 lg:py-4 text-white">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3 group">
                <img src="{{ asset('favicon.png') }}" class="h-9 w-auto drop-shadow-md" alt="Logo">
                <div class="flex flex-col leading-tight">
                    <span class="font-semibold tracking-wide text-lg group-hover:text-yellow-300 transition">
                        Seduhin
                    </span>
                    <span class="text-[11px] text-white/60 uppercase tracking-[0.2em] hidden sm:block">
                        Coffee & Stories
                    </span>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden md:flex items-center gap-8 text-sm">
                @php
                    $navItems = [
                        ['label' => 'Product', 'url' => '/product', 'match' => 'product'],
                        ['label' => 'Blog', 'url' => '/blog', 'match' => 'blog'],
                        ['label' => 'Tentang Kami', 'url' => '/about', 'match' => 'about'],
                        ['label' => 'Contact', 'url' => '/contact', 'match' => 'contact'],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    @php
                        $active = request()->is($item['match'] . '*');
                    @endphp
                    <a href="{{ $item['url'] }}"
                        class="relative px-1 pb-1 text-[13px] tracking-wide
                               {{ $active ? 'text-yellow-300 font-semibold' : 'text-white/80 hover:text-yellow-300' }}
                               transition-colors">
                        {{ $item['label'] }}
                        <span
                            class="absolute left-0 -bottom-0.5 h-[2px] w-full rounded-full
                                   bg-yellow-300 transform origin-left
                                   transition-transform duration-200
                                   {{ $active ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}">
                        </span>
                    </a>
                @endforeach
            </div>

            {{-- Right Section --}}
            <div class="flex items-center gap-4">

                {{-- Cart --}}
                <div x-data="cartMenu()" class="relative">
                    <button @click="toggleCart"
                        class="relative flex items-center justify-center h-9 w-9 rounded-full
                               bg-white/5 hover:bg-white/10 border border-white/10
                               transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                            <path fill="currentColor"
                                d="M18 6H6l-1-2H2v2h2l3.6 7.59-1.35 2.45A1 1 0 0 0 7 18h10v-2H8.42l.93-1.67h6.98a1 1 0 0 0 .9-.55L22 4H6" />
                        </svg>

                        {{-- Badge --}}
                        <span x-show="totalItems > 0" x-text="totalItems"
                            class="absolute -top-1.5 -right-1.5 bg-yellow-400 text-[#0B2447]
                                     text-[10px] font-semibold rounded-full w-5 h-5 flex items-center justify-center shadow-md">
                        </span>
                    </button>

                    {{-- Cart Dropdown --}}
                    <div x-show="open" x-cloak @click.away="open=false" x-transition
                        class="absolute right-0 mt-3 w-80 bg-[#19376D]/95 border border-white/10
                                rounded-2xl shadow-2xl p-4 text-white backdrop-blur-md">
                        <div class="flex items-center justify-between mb-3">
                            <h4 class="font-semibold text-sm tracking-wide">Keranjang</h4>
                            <span class="text-xs text-white/60" x-text="totalItems + ' item'"></span>
                        </div>

                        <template x-if="cart.length === 0">
                            <p class="text-center py-6 text-white/70 text-sm">Keranjang kosong ☕</p>
                        </template>

                        <div class="space-y-3 max-h-64 overflow-y-auto pr-1">
                            <template x-for="item in cart" :key="item.id">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-3">
                                        <img :src="item.image" class="h-12 w-12 rounded-lg object-cover shadow-sm">
                                        <div>
                                            <p class="font-semibold text-sm" x-text="item.name"></p>
                                            <p class="text-xs text-white/60">
                                                Rp <span x-text="item.price.toLocaleString()"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm">
                                        <button @click="decrease(item)"
                                            class="px-2 rounded-full bg-white/5 hover:bg-white/15">
                                            −
                                        </button>
                                        <span x-text="item.quantity"></span>
                                        <button @click="increase(item)"
                                            class="px-2 rounded-full bg-white/5 hover:bg-white/15">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </template>
                        </div>

                        <div class="border-t border-white/10 mt-4 pt-3 space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-white/70">Total</span>
                                <span class="font-semibold">
                                    Rp <span x-text="total.toLocaleString()"></span>
                                </span>
                            </div>
                            <a href="{{ auth()->check() ? '/checkout' : '/login' }}"
                                class="block text-center py-2.5 bg-yellow-400 text-[#0B2447]
                                      font-semibold rounded-full hover:bg-yellow-300
                                      transition shadow-md text-sm">
                                Checkout
                            </a>
                        </div>
                    </div>
                </div>

                {{-- User --}}
                @auth
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="h-9 w-9 flex items-center justify-center rounded-full
                                       bg-gradient-to-br from-yellow-300 to-yellow-500
                                       text-[#0B2447] font-bold shadow-md hover:shadow-lg
                                       transition-transform hover:-translate-y-0.5">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>

                        <div x-show="open" x-cloak @click.away="open=false" x-transition
                            class="absolute right-0 mt-3 w-52 bg-[#19376D]/95 border border-white/10
                                    rounded-2xl shadow-2xl text-white p-2 backdrop-blur-md">
                            <div class="px-3 py-2 border-b border-white/10 mb-1">
                                <p class="text-xs text-white/60">Masuk sebagai</p>
                                <p class="text-sm font-semibold truncate">{{ Auth::user()->name }}</p>
                            </div>
                            <a href="{{ route('user.dashboard') }}"
                                class="block px-3 py-2 text-sm hover:bg-white/10 rounded-lg">
                                Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="w-full text-left px-3 py-2 text-sm hover:bg-white/10 rounded-lg">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="/login"
                        class="hidden sm:flex h-9 items-center px-4 text-xs font-semibold
                              rounded-full border border-yellow-400 text-yellow-300
                              hover:bg-yellow-400 hover:text-[#0B2447] transition shadow-sm">
                        Login
                    </a>

                    <a href="/login"
                        class="sm:hidden h-9 w-9 rounded-full bg-yellow-400 text-[#0B2447]
                              flex items-center justify-center hover:bg-yellow-300 transition shadow-md">
                        <i class="lucide lucide-user"></i>
                    </a>
                @endguest

                {{-- Mobile menu button --}}
                <button
                    class="md:hidden h-9 w-9 flex items-center justify-center rounded-full
                           bg-white/5 hover:bg-white/10 border border-white/10 ml-1"
                    @click="mobileOpen = !mobileOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div class="md:hidden pb-3" x-show="mobileOpen" x-transition x-cloak>
            <div class="flex flex-col gap-1 text-sm text-white/80 mt-1">
                <a href="/product"
                    class="px-3 py-2 rounded-lg hover:bg-white/5 {{ request()->is('product*') ? 'bg-white/10 text-yellow-300' : '' }}">
                    Product
                </a>
                <a href="/blog"
                    class="px-3 py-2 rounded-lg hover:bg:white/5 {{ request()->is('blog*') ? 'bg-white/10 text-yellow-300' : '' }}">
                    Blog
                </a>
                <a href="/about"
                    class="px-3 py-2 rounded-lg hover:bg-white/5 {{ request()->is('about*') ? 'bg:white/10 text-yellow-300' : '' }}">
                    Tentang Kami
                </a>
                <a href="/contact"
                    class="px-3 py-2 rounded-lg hover:bg-white/5 {{ request()->is('contact*') ? 'bg:white/10 text-yellow-300' : '' }}">
                    Contact
                </a>
            </div>
        </div>
    </div>
</nav>
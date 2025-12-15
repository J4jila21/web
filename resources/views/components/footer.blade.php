<footer class="relative overflow-hidden bg-[#0B2447] text-white">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-gradient-to-tr from-[#0B2447] via-[#19376D] to-[#576CBC] opacity-90"></div>

    <!-- Newsletter CTA -->
    <div class="relative z-10 border-b border-white/10">
        <div
            class="mx-auto flex w-11/12 max-w-7xl flex-col items-center gap-5 py-10 text-center md:flex-row md:justify-between">
            <div class="max-w-xl">
                <p class="text-sm tracking-wider text-yellow-300">BERLANGGANAN</p>
                <h3 class="mt-1 text-xl font-semibold">Seduh Ceritamu — Langganan info & promo terbaru</h3>
                <p class="mt-1 text-sm text-white/80">Nikmati inspirasi kopi & update produk setiap minggu. Tidak ada
                    spam, hanya aroma kopi hangat ☕</p>
            </div>
            <form action="/subscribe" method="POST" class="w-full max-w-md">
                @csrf
                <div
                    class="flex overflow-hidden rounded-2xl bg-white/10 ring-1 ring-white/20 focus-within:ring-yellow-400">
                    <input id="newsletter-email" type="email" name="email" required
                        placeholder="Masukkan email kamu"
                        class="w-full bg-transparent px-4 py-3 text-sm placeholder-white/60 outline-none text-white">
                    <button type="submit"
                        class="bg-yellow-400 px-4 py-3 text-sm font-semibold text-[#0B2447] transition hover:bg-yellow-300">
                        Langganan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Main Footer -->
    <div class="relative z-10 mx-auto w-11/12 max-w-7xl py-14 md:py-20">
        <div class="grid gap-10 md:grid-cols-4">
            <!-- Brand -->
            <div class="md:col-span-1">
                <a href="/" class="inline-flex items-center gap-3">
                    <img src="{{ asset('img/seduhin_logo.ico') }}" alt="Logo Seduhin" width="80px"
                        loading="lazy">
                </a>
                <p class="mt-4 text-sm text-white/70">
                    <span class="font-semibold text-yellow-300">Seduhin</span> adalah perayaan rasa dan cerita.
                    Kami menghadirkan kopi pilihan Indonesia, disangrai dengan hati untuk setiap tegukan yang berarti.
                </p>

                <!-- Social Icons -->
                <div class="mt-6 flex items-center gap-3">
                    <a href="https://facebook.com/jajila" target="_blank"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-400 text-[#0B2447] hover:scale-105 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg>
                    </a>
                    <a href="https://youtube.com/jajila" target="_blank"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-400 text-[#0B2447] hover:scale-105 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path
                                d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                            <path d="m10 15 5-3-5-3z" />
                        </svg>
                    </a>
                    <a href="https://instagram.com/jajila" target="_blank"
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-yellow-400 text-[#0B2447] hover:scale-105 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Menu -->
            <div>
                <h4 class="text-sm font-semibold tracking-wide text-yellow-300">PERUSAHAAN</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/product">Produk</a></li>
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/blog">Blog</a></li>
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/about">Tentang Kami</a></li>
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/contact">Kontak</a></li>
                </ul>
            </div>

            <!-- Bantuan -->
            <div>
                <h4 class="text-sm font-semibold tracking-wide text-yellow-300">BANTUAN</h4>
                <ul class="mt-4 space-y-2 text-sm">
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/faq">FAQ</a></li>
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/shipping">Pengiriman</a></li>
                    <li><a class="text-white/80 hover:text-yellow-300 transition" href="/returns">Retur & Refund</a>
                    </li>
                </ul>
            </div>

            <!-- Kontak -->
            <div>
                <h4 class="text-sm font-semibold tracking-wide text-yellow-300">KONTAK & TOKO</h4>
                <ul class="mt-4 space-y-3 text-sm text-white/80">
                    <li>
                        <span class="block">Email</span>
                        <a href="mailto:hello@seduhin.com"
                            class="font-medium text-white hover:text-yellow-300">seduhin01@gmail.com</a>
                    </li>
                    <li>
                        <span class="block">Telepon</span>
                        <a href="tel:+6281234567890" class="font-medium text-white hover:text-yellow-300">+62
                            812-3456-7890</a>
                    </li>
                    <li>
                        <span class="block">Alamat</span>
                        <p>Jl. Aroma Nusantara No. 10, Brebes</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom -->
    <div class="relative z-10 border-t border-white/10 bg-[#19376D]">
        <div
            class="mx-auto flex w-11/12 max-w-7xl flex-col items-center justify-between gap-3 py-4 text-xs text-white/70 md:flex-row">
            <p>&copy; {{ date('Y') }} <span class="text-yellow-300 font-semibold">Seduhin</span>. Kopi Cerita
                Nusantara.</p>
            <div class="flex items-center gap-4">
                <a href="/privacy" class="hover:text-yellow-300">Privasi</a>
                <span class="opacity-40">•</span>
                <a href="/terms" class="hover:text-yellow-300">S&K</a>
            </div>
        </div>
    </div>
</footer>
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- ===== HERO SECTION ===== --}}
    <x-slot:header>
        <main class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-[#0B2447] via-[#19376D] to-[#576CBC]"></div>
            <img src="/images/coffee-hero.jpg" alt="Seduh kopi"
                class="absolute inset-0 h-full w-full object-cover opacity-20">
            <div class="relative mx-auto max-w-7xl px-5 py-16 md:px-10 md:py-24">
                <div class="flex flex-col gap-4 md:w-8/12">
                    <span class="inline-flex items-center gap-2 text-sm font-semibold text-yellow-300">
                        <span class="h-2 w-2 rounded-full bg-yellow-300"></span> Tentang Kami
                    </span>
                    <h1 class="text-3xl font-extrabold leading-tight text-white md:text-6xl">
                        Cerita di Balik <span class="text-yellow-300">Seduhin</span>
                    </h1>
                    <p class="max-w-2xl text-white/80">
                        Kopi yang baik lahir dari proses. Kami merayakan momen sederhana di setiap seduhan—untuk pagi
                        yang jernih dan obrolan yang hangat.
                    </p>
                    <div class="mt-4 flex flex-wrap gap-3">
                        <a href="/product"
                            class="rounded-xl bg-yellow-400 px-4 py-2 font-semibold text-[#0B2447] hover:bg-yellow-300">Lihat
                            Produk</a>
                        <a href="/contact"
                            class="rounded-xl bg-white/10 px-4 py-2 font-semibold text-white ring-1 ring-white/20 backdrop-blur hover:bg-white/15">Hubungi
                            Kami</a>
                    </div>
                </div>
            </div>

            {{-- aksen coffee-beans halus --}}
            <svg class="pointer-events-none absolute -bottom-16 -right-10 h-64 w-64 opacity-15 text-white"
                viewBox="0 0 200 200" fill="currentColor" aria-hidden="true">
                <ellipse cx="60" cy="60" rx="22" ry="14" />
                <ellipse cx="120" cy="120" rx="22" ry="14" />
                <ellipse cx="160" cy="40" rx="18" ry="12" />
            </svg>
        </main>
    </x-slot:header>

    {{-- ===== BREADCRUMB ===== --}}
    <nav class="mt-4 px-5" aria-label="Breadcrumb">
        <ol class="flex flex-wrap gap-1 text-sm text-gray-400">
            <li><a href="/" class="font-semibold transition-colors hover:text-black" aria-current="page">Home</a>
            </li>
            <li class="[&>svg]:size-3.5">-</li>
            <li><a href="/about" class="font-semibold transition-colors hover:text-black">About</a></li>
        </ol>
    </nav>

    {{-- ===== SECTION: CERITA AWAL (2 kolom) ===== --}}
    <section class="mx-auto my-16 w-11/12 max-w-7xl md:my-20">
        <div class="grid items-center gap-8 md:grid-cols-2">
            <div>
                <h2 class="mb-3 text-2xl font-bold text-gray-900">Cerita Kami</h2>
                <p class="leading-relaxed text-gray-700">
                    Di setiap tegukan kopi, selalu ada cerita. <span class="font-semibold">Seduhin</span> lahir dari
                    kecintaan kami terhadap kopi dan momen yang tercipta bersamanya.
                    Kami percaya bahwa kopi bukan sekadar minuman—ia adalah cara menikmati waktu, berbagi kisah, dan
                    menemukan ketenangan di tengah hiruk pikuk dunia.
                </p>
                <p class="mt-4 leading-relaxed text-gray-700">
                    Berawal dari dapur kecil dan rasa penasaran untuk menemukan racikan sempurna,
                    <span class="font-semibold">Seduhin</span> tumbuh menjadi rumah bagi para pecinta kopi sejati.
                    Kami memilih biji kopi terbaik dari petani lokal Indonesia—dari Aceh Gayo, Toraja, hingga Flores
                    Bajawa—dan mengolahnya dengan teliti dan penuh cinta.
                </p>
            </div>
            <div class="relative">
                <img src="/img/biji.jpg" alt="Biji kopi Seduhin" class="rounded-2xl shadow-xl">
                <div
                    class="absolute -bottom-4 -left-4 rounded-xl bg-yellow-400 px-4 py-2 font-semibold text-[#0B2447] shadow-md">
                    Sejak 2025</div>
            </div>
        </div>
    </section>

    {{-- ===== SECTION: NILAI (cards) ===== --}}
    <section class="mx-auto my-12 w-11/12 max-w-7xl">
        <h3 class="mb-6 text-center text-xl font-bold text-gray-900 md:text-2xl">Apa yang Kami Junjung</h3>
        <div class="grid gap-5 md:grid-cols-3">
            <div
                class="rounded-2xl border border-gray-200 p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700">
                    {{-- ikon leaf/traceability --}}
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 13c0 6 7 7 9 3 3-5-2-10-7-9 2-2 6-3 9 0 3 3 3 8 0 11-3 3-8 3-11 0" />
                    </svg>
                </div>
                <h4 class="font-semibold">Kemitraan Berkelanjutan</h4>
                <p class="mt-2 text-sm text-gray-600">Bersama petani lokal dengan transparansi dan keberlanjutan.</p>
            </div>
            <div
                class="rounded-2xl border border-gray-200 p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-full bg-yellow-100 text-yellow-700">
                    {{-- ikon quality --}}
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m9 12 2 2 4-4M7 21h10a2 2 0 0 0 2-2V7l-5-5H7a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2z" />
                    </svg>
                </div>
                <h4 class="font-semibold">Kualitas Tanpa Kompromi</h4>
                <p class="mt-2 text-sm text-gray-600">Roasting presisi, profil rasa yang jujur, dan segar.</p>
            </div>
            <div
                class="rounded-2xl border border-gray-200 p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div
                    class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-full bg-blue-100 text-blue-700">
                    {{-- ikon community --}}
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 20h5v-2a4 4 0 0 0-4-4h-1M9 20H4v-2a4 4 0 0 1 4-4h1m6-3a3 3 0 1 0-6 0 3 3 0 0 0 6 0Z" />
                    </svg>
                </div>
                <h4 class="font-semibold">Komunitas & Edukasi</h4>
                <p class="mt-2 text-sm text-gray-600">Workshop, cupping, dan ruang berbagi untuk semua penyeduh.</p>
            </div>
        </div>
    </section>

    {{-- ===== SECTION: FILOSOFI ===== --}}
    <section
        class="mx-auto my-16 w-11/12 max-w-4xl rounded-3xl bg-gradient-to-tr from-blue-50 to-yellow-50 p-8 ring-1 ring-blue-100 md:p-10">
        <h2 class="text-xl font-bold mb-3 text-gray-900">Filosofi Kami</h2>
        <p class="leading-relaxed text-gray-700">
            <span class="font-semibold">Seduhin</span> berarti “buatlah sendiri.” Kami mengajak semua orang menikmati
            proses menyeduh dengan caranya sendiri—tanpa aturan, tanpa batasan.
            Karena kami percaya, <span class="italic">kopi terbaik adalah kopi yang kamu seduh dengan caramu
                sendiri.</span>
        </p>
    </section>

    {{-- ===== SECTION: VISI MISI + TIMELINE ===== --}}
    <section class="mx-auto my-16 w-11/12 max-w-7xl md:my-20">
        <div class="grid gap-10 md:grid-cols-2">
            <div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Visi Kami</h3>
                <p class="leading-relaxed text-gray-700 mb-5">
                    Menjadi brand kopi lokal yang menginspirasi setiap orang untuk menemukan kebahagiaan sederhana—lewat
                    satu cangkir kopi yang diseduh dengan hati.
                </p>

                <h3 class="text-xl font-bold mb-3 text-gray-900">Misi Kami</h3>
                <ul class="list-disc list-inside leading-relaxed text-gray-700 space-y-1">
                    <li>Mendukung petani kopi lokal melalui kemitraan berkelanjutan.</li>
                    <li>Menyajikan produk berkualitas dengan transparansi dan kejujuran.</li>
                    <li>Membangun budaya “menyeduh sendiri” yang hangat dan inklusif.</li>
                    <li>Menyebarkan semangat cinta kopi Indonesia ke dunia.</li>
                </ul>
            </div>

            {{-- Timeline proses seduh --}}
            <div class="rounded-2xl border border-gray-200 p-6">
                <h4 class="mb-4 font-semibold text-gray-900">Proses Seduh Seduhin</h4>
                <ol class="relative ml-3 space-y-6">
                    <span
                        class="absolute left-0 top-1 h-[calc(100%-8px)] w-0.5 bg-gradient-to-b from-blue-300 to-yellow-300"></span>
                    <li class="relative pl-6">
                        <span
                            class="absolute -left-3 top-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-blue-100"></span>
                        Pilih biji terbaik dari petani mitra.
                    </li>
                    <li class="relative pl-6">
                        <span
                            class="absolute -left-3 top-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-blue-100"></span>
                        Roasting presisi sesuai profil rasa.
                    </li>
                    <li class="relative pl-6">
                        <span
                            class="absolute -left-3 top-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-blue-100"></span>
                        Grinding & seduh sesuai metode favoritmu.
                    </li>
                    <li class="relative pl-6">
                        <span
                            class="absolute -left-3 top-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-blue-100"></span>
                        Nikmati—cerita pun dimulai.
                    </li>
                </ol>
            </div>
        </div>
    </section>

    {{-- ===== CTA PENUTUP ===== --}}
    <section class="mx-auto my-20 w-11/12 max-w-6xl rounded-3xl bg-[#0B2447] p-8 text-white md:p-12">
        <div class="grid items-center gap-8 md:grid-cols-2">
            <div>
                <h2 class="text-2xl font-bold md:text-3xl">Yuk, Seduhin Ceritamu.</h2>
                <p class="mt-2 text-white/80">
                    Setiap cangkir punya makna. Apa pun rasanya—manis, pahit, atau seimbang—semuanya bagian dari
                    perjalananmu.
                </p>
                <div class="mt-5 flex gap-3">
                    <a href="/product"
                        class="rounded-xl bg-yellow-400 px-4 py-2 font-semibold text-[#0B2447] hover:bg-yellow-300">Mulai
                        Seduh</a>
                    <a href="/about#workshop"
                        class="rounded-xl bg-white/10 px-4 py-2 font-semibold text-white ring-1 ring-white/20 hover:bg-white/15">Ikut
                        Workshop</a>
                </div>
            </div>
            <img src="/img/cangkir.png" alt="Secangkir kopi" class="rounded-2xl shadow-xl">
        </div>
    </section>
</x-layout>
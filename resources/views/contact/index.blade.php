<x-layout>
    <x-slot:title>Contact</x-slot:title>

    <main class="bg-white min-h-screen">
        <!-- Breadcrumb -->
        <nav class="p-3 md:px-20" aria-label="Breadcrumb">
            <ol class="flex flex-wrap gap-1 text-sm text-gray-400">
                <li>
                    <a href="/" class="font-semibold transition-colors hover:text-black" aria-current="page">Home</a>
                </li>
                <li class="[&>svg]:size-3.5">-</li>
                <li>
                    <a href="/contact" class="font-semibold transition-colors hover:text-black">Contact</a>
                </li>
            </ol>
        </nav>

        <!-- Contact Section -->
        <section class="px-5 py-10 md:p-10">
            <div class="mx-auto grid grid-cols-1 gap-10 p-5 md:w-11/12 md:grid-cols-2 md:gap-16">

                <!-- Gambar -->
                <div class="flex justify-center items-center p-5">
                    <div class="w-full max-w-[528px] h-auto flex justify-center items-center">
                        <img 
                            src="{{ asset('img/contact.svg') }}" 
                            alt="Contact Illustration" 
                            width="528" 
                            height="522" 
                            class="w-full h-auto object-contain" 
                            loading="eager"
                        >
                    </div>
                </div>

                <!-- Konten -->
                <div class="flex flex-col justify-center gap-6 p-5">
                    <h1 class="text-center text-3xl font-bold md:text-left md:text-6xl">Hubungi Kami</h1>
                    <p class="text-gray-600 text-center text-base font-light md:text-left">
                        Mengalami kebingungan dalam menemukan kopi? Kami siap membantu Anda.
                    </p>

                    <!-- Kontak Telepon -->
                    <div class="flex items-center justify-between border-b pb-2 md:w-8/12">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-phone h-4 w-4" aria-hidden="true">
                                    <path
                                        d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-sm font-medium">+62 123 456 789</p>
                        </div>
                        <button class="lucide-copy h-5 w-5 text-gray-600 hover:text-black transition" 
                            data-copy="+62 123 456 789" title="Salin nomor telepon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Kontak Email -->
                    <div class="flex items-center justify-between border-b pb-2 md:w-8/12">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-white shadow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-mail h-4 w-4" aria-hidden="true">
                                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                </svg>
                            </div>
                            <p class="text-sm font-medium">infokopi@gmail.com</p>
                        </div>
                        <button class="lucide-copy h-5 w-5 text-gray-600 hover:text-black transition"
                            data-copy="infokopi@gmail.com" title="Salin email">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="14" height="14" x="8" y="8" rx="2" ry="2"></rect>
                                <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Sosial Media -->
                    <div class="flex flex-col items-center gap-3 md:items-start mt-5">
                        <p class="text-lg font-bold">Sosial Media Kami</p>
                        <div class="flex gap-4">
                            <a href="https://facebook.com/jajila" target="_blank"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white shadow hover:bg-gray-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-facebook" aria-hidden="true">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>

                            <a href="https://youtube.com/jajila" target="_blank"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white shadow hover:bg-gray-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-youtube" aria-hidden="true">
                                    <path
                                        d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17">
                                    </path>
                                    <path d="m10 15 5-3-5-3z"></path>
                                </svg>
                            </a>

                            <a href="https://instagram.com/j4j1la" target="_blank"
                                class="flex h-9 w-9 items-center justify-center rounded-full bg-white shadow hover:bg-gray-200 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-instagram" aria-hidden="true">
                                    <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.querySelectorAll('.lucide-copy').forEach(btn => {
            btn.addEventListener('click', () => {
                const textToCopy = btn.getAttribute('data-copy');
                navigator.clipboard.writeText(textToCopy);
                alert('Teks disalin ke clipboard!');
            });
        });
    </script>
</x-layout>

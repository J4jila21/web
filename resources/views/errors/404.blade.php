<x-layout title="Kopi Terbaik Nusantara" :hideNavbar="true" :hideFooter="true">
    <div class="flex min-h-[80vh] flex-col items-center justify-center text-center">
        <dotlottie-wc src="https://lottie.host/fd730af1-2da7-4610-b41d-dcc02227db21/pfbKasDyXf.lottie"
            style="width: 300px;height: 300px" autoplay loop></dotlottie-wc>
        <h1 class="mt-6 text-3xl font-bold text-gray-800">Halaman Tidak Ditemukan</h1>
        <p class="mt-3 text-gray-500">Coba kembali ke halaman utama.</p>
        <div class="w-full flex justify-center mt-3">
        <a href="{{ url('/') }}"
            class="mt-6 flex justify-between items-center gap-2 ps-3 pe-1 w-max rounded-full bg-blue-600 px-6 py-2 text-black hover:bg-black hover:text-white duration-300 transition-all">
            <div class="bg-white rounded-full flex items-center justify-center h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-900" aria-hidden="true" id="Outline" viewBox="0 0 24 24" width="24" height="24"><path d="M19,11H9l3.29-3.29a1,1,0,0,0,0-1.42,1,1,0,0,0-1.41,0l-4.29,4.3A2,2,0,0,0,6,12H6a2,2,0,0,0,.59,1.4l4.29,4.3a1,1,0,1,0,1.41-1.42L9,13H19a1,1,0,0,0,0-2Z"/></svg>
            </div>
            <span class="text-base text-gray-900 hover:text-white px-2">Kembali ke Beranda</span>
        </a>
        </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
</x-layout>

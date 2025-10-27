<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- Header --}}
    <x-slot:header>
        <main class="flex flex-col bg-white px-5 py-8  md:flex-row-reverse md:gap-20 md:px-20 md:py-12">
            <div class="flex flex-col gap-3 py-6 text-center md:mx-auto md:w-6/12 md:text-left">
                <div class="flex items-start justify-center gap-2 md:justify-start">
                    <div class="dots  h-3 w-3 rounded-full bg-[#3b82f6] mt-2"></div>
                    <h2 class="text-lg font-medium">Blog</h2>
                </div>
                <h1 class="text-3xl font-bold md:text-6xl">Baca artikel terbaru kami</h1>
                <p>Baca artikel terbaru kami untuk mendapatkan informasi segar, pengetahuan baru, dan cerita inspiratif yang bisa menemani waktu santai Anda.
                </p>
            </div>
            <div class="hidden md:block">
                <img src="{{ asset('img/article.svg') }}" alt="Ilustrasi artikel" width="300" height="200"
                    loading="lazy" style="border-radius: 10px; object-fit: cover;">
            </div>  
        </main>
    </x-slot:header>

    {{-- Breadcrumb --}}
    <nav class="mt-4 px-3 md:px-5" aria-label="Breadcrumb">
        <ol class="flex flex-wrap gap-1 text-sm text-gray-400">
            <li>
                <a href="/" class="font-semibold transition-colors hover:text-black" aria-current="page">Home</a>
            </li>
            <li class="[&>svg]:size-3.5">-</li>
            <li>
                <a href="/about" class="font-semibold transition-colors hover:text-black">about</a>
            </li>
        </ol>
    </nav>

    {{-- Search --}}
    <div class="mx-auto max-w-screen-xl px-4 py-6 lg:px-6">
        <div class="mx-auto max-w-screen-md sm:text-center">
            <form>
                <div class="mx-auto mb-3 max-w-screen-sm items-center space-y-4 sm:flex sm:space-y-0">
                    <div class="relative w-full">
                        <label for="search"
                            class="mb-2 hidden text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <div class="relative w-full">
                            <input type="search" id="search" name="search" placeholder="Cari artikel ..."
                                autocomplete="off"
                                class="focus:border-primary-500 focus:ring-primary-500 block w-full rounded-full border border-gray-300 bg-gray-50 p-3 pr-20 text-sm text-gray-900 dark:border-primary-500 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
                            <button type="submit"
                                class="focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 absolute right-2 top-1/2 -translate-y-1/2 rounded-full bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:ring-4">
                                <svg class="h-6 w-6 text-white dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Blog list --}}
    <div class="mx-auto my-10 max-w-screen-xl px-4 lg:px-0">
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $post)
                <article
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <a href="/blog/{{ $post->slug }}">
                        <h2 class="mb-2 border-b-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}
                        </h2>
                    </a>
                    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                        {{ Str::limit($post->body, 150, '...') }}
                    </p>
                    <div class="flex justify-between">
                        <div class="flex items-center justify-between text-gray-500">
                            <span class="text-sm">{{ $post->created_at->format('M j, Y') }}</span>
                        </div>
                        
                        <a href="/blog/{{ $post->slug }}"
                            class="inline-flex items-center font-medium text-blue-600 hover:underline dark:text-blue-500">
                            Read more
                            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-20 text-center">
                    <dotlottie-wc src="https://lottie.host/70b04043-3df6-470e-9770-02da5ab76921/PQfCwEPrix.lottie"
                        style="width: 300px;height: 300px; margin:auto" autoplay loop></dotlottie-wc>
                    <h3 class="text-xl font-semibold text-gray-600">Tidak ada artikel</h3>
                </div>
            @endforelse
        </div>
    </div>
    {{ $posts->links() }}
        <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.5/dist/dotlottie-wc.js" type="module"></script>
</x-layout>

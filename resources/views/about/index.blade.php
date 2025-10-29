<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:header>
        <main class="md:gap-20 bg-primary-100 px-5 py-8 md:p-10 md:px-20 md:py-12">
            <div class="flex flex-col gap-3 py-10 text-center md:mx-auto md:w-6/12">
                <div class="justify-center md:justify-start flex items-start gap-2">
                    <div class="dots w-3 h-3 bg-primary-600 rounded-full mt-2 bg-opacity-50"></div>
                    <h2 class="font-medium text-lg">Tentang Kami</h2>
                </div>
                <h1 class="md:text-left text-3xl font-bold md:text-6xl">Tentang Kami</h1>
            </div> 
        </main>
    </x-slot:header>
    <nav class="mt-4 px-3 md:px-5" aria-label="Breadcrumb">
        <ol class="flex flex-wrap gap-1 text-sm text-gray-400">
            <li>
                <a href="/" class="font-semibold transition-colors hover:text-black" aria-current="page">Home</a>
            </li>
            <li class="[&>svg]:size-3.5">-</li> 
            <li>
                <a href="/about" class="font-semibold transition-colors hover:text-black">About</a>
            </li>
        </ol>
    </nav>
    <div class="w-11/12 mx-auto md:w-7/12 mb-5 my-10">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, consequatur. Doloribus, quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.</p>
    </div>
    <div class="w-11/12 mx-auto md:w-7/12 mb-5 my-10">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, consequatur. Doloribus, quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.</p>
    </div>
    <div class="w-11/12 mx-auto md:w-7/12 mb-5 my-10">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, consequatur. Doloribus, quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.</p>
    </div>
    <div class="w-11/12 mx-auto md:w-7/12 mb-5 my-10">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, consequatur. Doloribus, quibusdam. Molestias molestiae, accusantium. Doloribus, quibusdam.</p>
    </div>
</x-layout>
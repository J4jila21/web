<x-layout>
    <x-slot name="title">
        {{ $post['title'] }}
    </x-slot>
        {{-- Breadcrumb --}}
    <nav class="mt-0 px-3 md:px-5" aria-label="Breadcrumb">
        <ol class="flex flex-wrap gap-1 text-sm text-gray-400">
            <li>
                <a href="/" class="hover:text-black font-semibold transition-colors" aria-current="page">Home</a>
            </li>
            <li class="[&>svg]:size-3.5">-</li>
            <li>
                <a href="/blog" class="hover:text-black font-semibold transition-colors">Blog</a>
            </li>
            <li class="[&>svg]:size-3.5">-</li>
            <li>
                <span class="font-medium text-black">{{ strlen($post['title']) > 10 ? substr($post['title'], 0, 20) . '...' : $post['title'] }}</span>
            </li>
        </ol>
    </nav>
    <main class="max-w-7xl items-center justify-centerborder-md border-b border-gray-300 px-5 py-10 md:p-10 flex flex-col-reverse md:flex-row-reverse md:px-120 md:gap-28">
        <div class="w-11/12 md:w-8/12 mx-auto py-5">
        <h2 class="mb-1 text-3xl font-bold tracking-tight text-gray-900">{{ $post['title'] }}</h2>
<img src="{{ $post->image ? asset('storage/images/' . $post->image) : asset('storage/images/default.png') }}"
                            alt="product image"
                            class="flex justify-center" width="600px" height="50px">
        <div class="text-base text-gray-500">
            <a href="/posts">{{ $post['author']}}</a> | {{ $post->created_at->diffForHumans() }}
        </div>
        <p my-4 font-light>
            {{ ($post['body']) }}
        </p>
        <a href="/blog" class="font-medium text-blue-600 hover:underline">Back to posts &laquo;</a>
        </div>
    </main>
</x-layout>

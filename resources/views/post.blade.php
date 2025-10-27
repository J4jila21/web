<x-layout>
    <x-slot:title>{{ $post['title'] }}</x-slot:title>
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
                <span class="font-medium text-black">{{ $post['title'] }}</span>
            </li>
        </ol>
    </nav>
    <article class="max-w-7xl border-md border-b border-gray-300 py-6">
        <h2 class="mb-1 text-3xl font-bold tracking-tight text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/posts">{{ $post['author']}}</a> | {{ $post->created_at->diffForHumans() }}
        </div>
        <p my-4 font-light>
            {{ ($post['body']) }}
        </p>
        <a href="/blog" class="font-medium text-blue-600 hover:underline">Back to posts &laquo;</a>
    </article>
</x-layout>

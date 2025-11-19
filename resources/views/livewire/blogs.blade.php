<main class="mt-20 h-full w-full md:ltr:ml-64 md:ltr:mr-64">
    <div class="py-12 container !max-w-full px-6 lg:px-20">
@if (session('message'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition.opacity.duration.500ms
        class="fixed right-1/2 top-5 z-50 translate-x-1/2 transform rounded border border-green-500 bg-green-100 px-4 py-2 text-green-700 shadow-lg"
    >
        {{ session('message') }}
    </div>
@endif
        <div wire:ignore.self x-data="{open: @entangle('showDeleteModal')}" x-show="open" x-transition.opacity.duration.200ms x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div x.transition.scale.origin.center.duration.200ms @click.away="open = false" class="w-96 rounded-lg bg-white p-6 shadow-xl text-center">
                    <h2 class="text-lg font-semibold mb-2 text-gray-800">Anda yakin ingin menghapus Artikel ini?</h2>
                    <div class="flex justify-center gap-3">
                        <button @click="open = false" class="rounded border px-4 py-2 mr-2">Batal</button>
                        <button wire:click="delete" class="bg-red-600 text-white rounded px-4 py-2">Hapus</button>
                    </div>
                </div>
            </div>
        <div class="px-4 flex justify-between md:px-3 py-4 md:py-5 bg-white border !border-b-0 border-gray-200 rounded-t-lg">
        <input type="text" wire:model.live.debounce.300ms="search"
            class="border-gray-500 focus:ring-2 focus:ring-primary-500 transition-all duration-100 rounded-lg p-2 w-1/3" placeholder="Cari blog...">

        <a href="{{ route('admin.blogs.create') }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
           Buat
        </a>
        </div>
        <div class="bg-white border-gray-300 shadow-sm rounded-lg">
        <table class="w-full overflow-hidden shadow-sm border border-b-0 border-t-0">
            <thead class="bg-gray-200">
                <tr class="w-full h-16 text-sm">
                    <th class="p-5 text-start">Artikel</th>
                    <th class="p-2 text-center">Author</th>
                    <th class="p-2 text-center">Dibuat</th>
                    <th class="p-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="p-5">
                            <div class="flex gap-2 items-center">
                                @if ($post->image)
                                <img src="{{ asset('storage/images/' . $post->image) }}" class="h-12 w-12 rounded-lg" alt="image" loading="lazy">
                            @endif
                            <div>
                            <a href="/blog/{{ $post->slug }}"><p class="text-xs font font-semibold text-[13px] text-gray-800 hover:text-primary-500 transition-all duration-200">{{ $post->title }}</p></a>
                            <p class="text-sm text-[10px] font-medium text-gray-600">{{ $post->slug }}</p>
                            </div>
                            </div>
                        </td>
                        <td class="p-2 text-center">{{ $post->author }}</td>
                        
                        <td class="p-2 text-center">{{ $post->created_at->diffForHumans() }}</td>
                        <td class="p-2 text-center">
                                    <div x-data="{
                                        open: false,
                                        position: 'bottom',
                                        checkPosition() {
                                            this.$nextTick(() => {
                                                const dropdown = this.$refs.dropdown.getBoundingClientRect();
                                                const spaceBelow = window.innerHeight - dropdown.bottom;
                                    
                                                this.position = spaceBelow < 120 ? 'top' : 'bottom';
                                            });
                                        }
                                    }" class="relative inline-block">
    
                                        <!-- Trigger Button -->
                                        <button @click="open = !open; checkPosition()"
                                            class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
    
                                        <!-- Dropdown -->
                                        <div x-show="open" x-ref="dropdown" @click.away="open = false" x-transition x-cloak
                                            :class="position === 'top'
                                                ?
                                                'bottom-full mb-2' :
                                                'top-full mt-2'"
                                            class="absolute right-0 z-50 w-44 rounded-lg border bg-white shadow-lg">
    
                                            {{-- <a href="{{ route('admin.blogs.show', $post->id) }}"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-gray-800 hover:bg-gray-100">
                                                View Product
                                            </a> --}}
    
                                            <a href="{{ route('admin.blogs.edit', $post->id) }}"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-blue-600 hover:bg-gray-100">
                                                Edit
                                            </a>
    
                                            <button @click="$wire.openDeleteModal({{ $post->id }}); open=false"
                                                class="flex w-full items-center gap-2 px-4 py-2 text-red-600 hover:bg-gray-100">
                                                Delete
                                            </button>
    
                                        </div>
                                    </div>
                                </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-t-0 border-gray-300 rounded-b-lg ">
        <div class="mt-4">{{ $posts->links() }}</div>
        </div>
    </div>
    

</main>

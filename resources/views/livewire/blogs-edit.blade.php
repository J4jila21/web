<main class="mt-20 h-full w-full md:ltr:ml-64 md:ltr:mr-64">
    <div class="container !max-w-full px-6 py-12 lg:px-20">
        <div class="w-full rounded-t-lg border border-b-2 bg-white p-6 shadow-md">
            <h2 class="mb-4 text-xl font-bold">Edit Blog</h2>

            <form wire:submit.prevent="update" class="space-y-4">
                <div class="flex flex-col gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="flex-col">
                        <label class="text-sm font-medium text-gray-600 dark:text-white">Judul</label>
                        <input type="text" wire:model="title" class="w-full border-gray-300 focus:border-primary-500 rounded-lg border p-2">
                    </div>
                    <div class="flex-col">
                        <label class="text-sm font-medium text-gray-600 dark:text-white">Penulis</label>
                        <input type="text" wire:model="author" class="w-full border-gray-300 focus:border-primary-500 rounded-lg border p-2">
                    </div>
                    <div class="flex-col">
                        <label class="text-sm font-medium text-gray-600 dark:text-white">Isi</label>
                        <textarea wire:model="body" class="w-full border-gray-300 focus:border-primary-500 rounded-lg border p-2"></textarea>
                    </div>
                    <div class="flex-col">
                        <label class="text-sm font-medium text-gray-600 dark:text-white">Gambar</label>
                        <input type="file" wire:model="newImage" class="w-full border-gray-300 focus:border-primary-500 rounded-lg border p-2">
                    </div>
                    @if ($image)
                        <img src="{{ asset('storage/images/' . $image) }}" class="w-32 rounded">
                    @endif
                </div>
                <div class="w-full rounded-b-lg bg-white p-6 shadow-md flex justify-end gap-2">
                    <button
                        class="rounded bg-blue-600 px-8 py-4 text-white transition-all duration-300 hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</main>

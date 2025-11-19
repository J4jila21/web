<main class="mt-20 h-full w-full md:ltr:ml-64 md:ltr:mr-64">
    <div class="py-12 container !max-w-full px-6 lg:px-20">
        <div class="px-4 md:px-3 py-4 md:py-5 bg-white border  border-gray-300 rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Edit Pengguna</h2>

     @if (session('success'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition.opacity.duration.500ms
        class="fixed right-1/2 top-5 z-50 translate-x-1/2 transform rounded border border-green-500 bg-green-100 px-4 py-2 text-green-700 shadow-lg"
    >
        {{ session('success') }}
    </div>
@endif

    <form wire:submit.prevent="updateUser" class="space-y-4">
        <div>
            <label class="text-sm text-gray-600">Nama</label>
            <input type="text" wire:model="name"
                class="w-full border-gray-300 rounded p-2 text-sm focus:border-primary-500">
            @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Email</label>
            <input type="email" wire:model="email"
                class="w-full border-gray-300 rounded p-2 text-sm focus:border-primary-500">
            @error('email') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="text-sm text-gray-600">Password (kosongkan jika tidak ingin diubah)</label>
            <input type="password" wire:model="password"
                class="w-full border-gray-300 rounded p-2 text-sm focus:border-primary-500">
            @error('password') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="px-8 py-4 bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white rounded">Update</button>
        </div>
    </form>
        </div>
    </div>
</main>

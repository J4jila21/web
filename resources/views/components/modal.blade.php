<div x-data="{ open: @entangle($attributes->wire('model')) }" x-show="open" x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div @click.away="open = false" class="w-96 rounded-lg bg-white p-6">
        {{ $slot }}
        <div class="mt-3 flex justify-end">
            <button @click="open = false" class="rounded border px-4 py-2">Tutup</button>
        </div>
    </div>
</div>

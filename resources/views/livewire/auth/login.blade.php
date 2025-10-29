<div class="mx-auto max-w-md p-6 bg-white rounded-lg shadow-md">
    <h2 class="mb-4 text-2xl font-semibold text-center">Login</h2>

    <form wire:submit.prevent="login" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model.defer="email" class="w-full rounded border p-2">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" wire:model.defer="password" class="w-full rounded border p-2">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
            class="w-full rounded bg-blue-600 py-2 text-white hover:bg-blue-700 transition">
            Login
        </button>
    </form>

    <p class="mt-4 text-center text-sm text-gray-600">
        Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600">Daftar</a>
    </p>
</div>

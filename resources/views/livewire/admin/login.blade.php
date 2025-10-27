<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form wire:submit.prevent="login" class="bg-white p-6 rounded-lg shadow w-80">
        <h2 class="text-2xl font-bold text-center mb-4">Admin Login</h2>

        <input wire:model="email" type="email" placeholder="Email"
            class="w-full mb-3 px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" />

        <input wire:model="password" type="password" placeholder="Password"
            class="w-full mb-4 px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" />

        @error('email')
            <p class="text-sm text-red-500 mb-3">{{ $message }}</p>
        @enderror

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md">
            Login
        </button>
    </form>
</div>

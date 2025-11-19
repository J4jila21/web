<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div>
        <div class="relative flex lg:flex-row w-full h-screen justify-center flexcol dark:bg-gray-900 sm:p-0">
        <div class="flex-1 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-3xl font-bold">Login Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Masukkan email dan password untuk masuk</p>
        </div>

        <form wire:submit.prevent="login" class="space-y-4">
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 rounded">
                    {{ $errors->first() }}
                </div>
            @endif

            <div>
                <input type="email" wire:model.defer="email"
                    class="w-full rounded-lg border-gray-300 px-3 py-2 focus:ring focus:ring-primary-500"
                    placeholder="Email admin" required>
            </div>

            <div>
                <input type="password" wire:model.defer="password"
                    class="w-full rounded-lg border-gray-300 px-3 py-2 focus:ring focus:ring-primary-500"
                    placeholder="Password" required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Masuk
            </button>
        </form>
        </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>

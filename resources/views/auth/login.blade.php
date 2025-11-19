<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/seduhin_logo.ico">
    <title>Login - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 w-full">
    <main>
        <div class="relative bg-white dark:bg-gray-900">
            <div class="flex min-h-screen flex-col justify-center lg:flex-row">
                <!-- Bagian Kiri (Form Login) -->
                <div class="flex flex-1 flex-col items-center justify-center p-6 sm:p-12">
                    <div class="w-full max-w-md text-center">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">Selamat Datang Kembali</h1>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            Masukkan kredensial untuk mengakses dashboard
                        </p>

                        <!-- Form Login -->
                        <form method="POST" action="{{ route('admin.login.submit') }}" class="mt-6 space-y-4 text-left">
                            @csrf

                            @if ($errors->any())
                                <div class="rounded bg-red-100 p-2 text-sm text-red-700">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <div class="relative mt-1">
                                    <input type="email" name="email" id="email"
                                        class="focus:ring-primary-500 focus:border-primary-500 w-full rounded-lg border border-gray-300 px-3 py-2 pr-10 text-sm outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100 placeholder:text-gray-200"
                                        placeholder="Masukkan alamat email" required>

                                    <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="h-4 w-4">
                                            <path fill="currentColor"
                                                d="M12 0a12 12 0 100 24 12 12 0 000-24zm0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10z" />
                                            <path fill="currentColor"
                                                d="M12 6a6 6 0 100 12 6 6 0 000-12zm0 10a4 4 0 110-8 4 4 0 010 8z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div x-data="{ show: false }">
                                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                                <div class="relative mt-1">
                                    <input :type="show ? 'text' : 'password'" name="password" id="password" autocomplete="off"
                                        class="focus:ring-primary-500 focus:border-primary-500 w-full rounded-lg border border-gray-300 px-3 py-2 pr-10 text-sm outline-none dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100 placeholder:text-gray-200"
                                        placeholder="Masukkan password" required>

                                    <!-- Eye Icon -->
                                    <button type="button" @click="show = !show"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                        <!-- Mata tertutup -->
                                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="h-5 w-5">
                                            <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0
                                            8.268 2.943 9.542 7-1.274 4.057-5.065
                                            7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>

                                        <!-- Mata terbuka -->
                                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="h-5 w-5">
                                            <path d="M13.875 18.825A10.05 10.05 0
                                            0112 19c-4.477 0-8.268-2.943-9.542-7a9.948
                                            9.948 0 013.183-4.683M9.88
                                            9.88a3 3 0 104.243 4.243"/>
                                            <path d="M3 3l18 18"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="mt-2 flex items-center">
                                <input id="remember" name="remember" type="checkbox"
                                    class="h-4 w-4 rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                                <label for="remember" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                    Ingat saya
                                </label>
                            </div>

                            <!-- Tombol Login -->
                            <button type="submit"
                                class="bg-primary-500 hover:bg-primary-600 w-full rounded-lg px-4 py-2 font-medium text-white transition">
                                Masuk
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Bagian Kanan (Ilustrasi / Branding) -->
                <div class="bg-primary-500 hidden w-full items-center justify-center lg:flex lg:w-1/2">
                    <div class="text-center p-12">
                        <a class="block mb-4" href="{{ route('admin.dashboard') }}"><img src="{{ asset('favicon.png') }}" alt="Logo Seduhin" width="200" height="50"></a>
                        <p class="text-white/90">dashboard for seduhin</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="/img/20.jpg">
        <title>Login Admin</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <main class="flex min-h-screen items-center justify-center bg-white text-gray-600 antialiased">

        <div class="w-full max-w-md space-y-8 px-6">

            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang kembali</h1>
                <p class="mt-1 text-sm text-gray-500">Masukkan kredensial untuk mengakses dasbor</p>
            </div>

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

                @if ($errors->any())
                    <div class="rounded bg-red-100 p-2 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Email Field -->
                <div class="col-span-12">
                    <div class="relative w-full shadow-sm rounded-md">   
                        <input type="email" name="email"
                            class="w-full rounded-lg border px-3 py-2 pr-10 text-sm outline-none focus:ring-primary-500 focus:border-primary-500 border-gray-300"
                            placeholder="Masukkan alamat email" required>

                        <!-- Email SVG Icon -->
                        <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                viewBox="0 0 24 24" class="h-4 w-4"">
                                <path
                                    d="M12,0A12.013,12.013,0,0,0,0,12c-.126,9.573,11.159,15.429,18.9,9.817a1,1,0,1,0-1.152-1.634C11.3,24.856,1.9,19.978,2,12,2.549-1.266,21.453-1.263,22,12v2a2,2,0,0,1-4,0V12C17.748,4.071,6.251,4.072,6,12a6.017,6.017,0,0,0,10.52,3.933A4,4,0,0,0,24,14V12A12.013,12.013,0,0,0,12,0Zm0,16a4,4,0,0,1,0-8A4,4,0,0,1,12,16Z" />
                            </svg>

                        </span>
                    </div>
                </div>


                <!-- Password Field -->
                <div class ="col-span-12" x-data="{ show: false }">
                    <div class="relative w-full shadow-sm rounded-md">
                        <input :type="show ? 'text' : 'password'" name="password"
                            class="w-full rounded-lg border px-3 py-2 pr-10 text-sm outline-none focus:ring-primary-500 focus:border-primary-500 border-gray-300"
                            placeholder="Masukkan Password" required>

                        <!-- Eye Icon -->
                        <button type="button" @click="show = !show"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0
                                   8.268 2.943 9.542 7-1.274 4.057-5.065
                                   7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5"
                                fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0
                                   0112 19c-4.477 0-8.268-2.943-9.542-7a9.948
                                   9.948 0 013.183-4.683M9.88
                                   9.88a3 3 0 104.243 4.243" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <button
                    class="w-full rounded-lg bg-primary-500 px-4 py-2 font-medium text-white transition hover:bg-primary-600">
                    Masuk
                </button>
            </form>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    </main>

</html>

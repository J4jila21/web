<div class="flex flex-col items-center p-5 md:p-10">
        <a class="flex items-center justify-center" href="/">
            <img class="w-50 h-8" src="{{ asset('favicon.png') }}" alt="Coffee Shop" width="120" height="48" loading="lazy"></a>
        <div class="mt-20 w-full rounded-lg border-[1px] border-gray-100 bg-white p-5 md:w-[400px] shadow-sm">
            <h3 class="text-primary-500 mb-5 text-lg font-bold">Masuk</h3>
            @error('email')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
            <form wire:submit.prevent="login" class="mt-5 flex flex-col gap-2">
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-mail text-primary h-5 w-5">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        <input type="email" wire:model.defer="email" placeholder="jhondoe@gmail.com" autocomplete="off"
                            class="focus:ring-primary-500 flex h-8 w-full rounded-lg border-0 bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 focus:ring-2">
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-lock text-primary h-5 w-5">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <div class="relative w-full">
                            <div x-data="{ show: false }" class="relative w-full">
                                <input :type="show ? 'text' : 'password'" wire:model.defer="password"
                                    placeholder="Password"
                                    class="focus:ring-primary-500 h-10 w-full rounded-lg border-0 bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 focus:ring-2">

                                <button type="button" @click="show = !show"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700 focus:outline-none">

                                    <!-- Icon "eye" (tampilkan password) -->
                                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477
                0 8.268 2.943 9.542 7-1.274 4.057-5.065
                7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>

                                    <!-- Icon "eye-off" (sembunyikan password) -->
                                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112
                19c-4.477 0-8.268-2.943-9.542-7a9.948
                9.948 0 013.183-4.683M9.88 9.88a3 3
                0 104.243 4.243" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3l18 18" />
                                    </svg>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <a href="{{ route('forgot-password') }}" class="text-primary-600 mt-2 block text-right text-sm">
                            Forgot Password
                        </a>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-600 text-center">{{ $message }}</span>
                    @enderror
<button type="submit"
    wire:loading.attr="disabled"
    class="mt-2 w-full rounded-lg bg-blue-600 p-2 font-semibold text-white transition hover:bg-blue-700">
    <span wire:loading.remove>Masuk</span>
    <span wire:loading>Memproses...</span>
</button>

            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600">Daftar</a>
            </p>
        </div>
        <img class="absolute left-1/2 top-[50%] -z-10 hidden -translate-x-1/2 -translate-y-1/2 items-center md:block"
            src="{{ asset('img/coffe.png') }}" alt="background-decoration" loading="lazy" width="400"
            height="400" decoding="async">
    </div>
</div>

    <div class="flex flex-col items-center p-5 md:p-10">
        <a class="flex items-center justify-center" href="/">
            <img class="w-50 h-8" src="{{ asset('img/logo blue.svg') }}" alt="Coffee Shop" width="120" height="48"></a>
        <div class="mt-10 w-full rounded-lg border-[1px] border-gray-100 bg-white p-5 md:w-[400px]">
            <h3 class="text-primary-500 mb-5 text-lg font-bold">Masuk</h3>
            <form wire:submit.prevent="login" class="mt-5 flex flex-col gap-2">
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-mail text-primary h-5 w-5">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        <input type="email" wire:model.defer="email" placeholder="jhondoe@gmail.com"
                            class="focus:ring-primary-500 flex h-8 w-full rounded-lg border-0 bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 focus:ring-2">
                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
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
                        <input type="password" wire:model.defer="password" placeholder="Password"
                            class="focus:ring-primary-500 h-10 w-full rounded-lg border-0 bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 focus:ring-2">
                        <button type="button"
                            class="hover:text-primary-600 absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="lucide lucide-eye h-5 w-5" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                viewBox="0 0 24 24">
                                <path
                                    d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                        </div>
                    </div>
                    <a href="/forgot-password" class="text-primary-600 mt-2 block text-right text-sm">
                        Forgot Password
                    </a>
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                <button type="submit"
                    class="w-full rounded-lg bg-blue-600 p-2 font-semibold text-white transition hover:bg-blue-700">
                    Masuk
                </button>
            </form>
            <p class="mt-4 text-center text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="text-blue-600">Daftar</a>
            </p>
        </div>
        <img class="hidden md:block items-center absolute -z-10 top-[60%] left-1/2 -translate-x-1/2 -translate-y-1/2" src="{{ asset('img/contact.svg') }}" alt="background-decoration" loading="lazy" width="500" height="500" decoding="async">


    </div>

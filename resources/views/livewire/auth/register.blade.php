<div class="flex flex-col items-center p-5 md:p-10">
        <a class="flex items-center justify-center" href="href="">
            <img class="w-50 h-8" src="{{ asset('favicon.png') }}" alt="Coffee Shop" width="120" height="48" loading="lazy">
        </a>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition.opacity.duration.500ms
        class="fixed mt-20 right-1/2 top-5 z-50 translate-x-1/2 transform rounded border border-green-500 bg-green-100 px-4 py-2 text-green-700 shadow-lg sm: flex items-center text-center justify-center"
    >
        {{ session('success') }}
    </div>
@endif
        <div class="mt-20 w-full rounded-lg border-[1px] border-gray-100 bg-white p-5 md:w-[400px] shadow-md">
            <h3 class="text-primary-500 mb-5 text-lg font-bold">Daftar</h3>
            <form wire:submit.prevent="register" class="mt-5 flex flex-col gap-2">
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user text-primary h-5 w-5">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input type="text" wire:model.defer="name" placeholder="Nama Lengkap"
                            class="focus:ring-primary-500 transition-all duration-100 w-full rounded-lg border-0 bg-gray-100 p-2 placeholder:text-gray-400 focus:ring-2">
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-mail text-primary h-5 w-5">
                            <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                        </svg>
                        <input type="email" wire:model.defer="email" placeholder="Email"
                            class="w-full rounded-lg border-0 border-gray-300 bg-gray-100 p-2 placeholder:text-gray-400 focus:ring-2 focus:ring-blue-500 transition-all duration-100">
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
                        <div x-data="{ show: false }" class="relative w-full">
                            <input :type="show ? 'text' : 'password'" wire:model.defer="password" placeholder="Password"
                                class="focus:ring-primary-500 transition-all duration-100 h-10 w-full rounded-lg border-0 bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 focus:ring-2">

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

                        @error('password')
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
                        <div x-data="{ show: false }" class="relative w-full">
                            <input :type="show ? 'text' : 'password'" wire:model.defer="password_confirmation"
                                placeholder="Password"
                                class="focus:ring-primary-500 transition-all duration-100 h-10 w-full rounded-lg border-0 bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 focus:ring-2">

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

                <button type="submit"
                    class="w-full rounded-lg bg-blue-600 py-2 font-semibold text-white transition-all hover:bg-blue-700">
                    Daftar
                </button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a>
            </p>
        </div>
        <img class="absolute left-1/2 top-[50%] -z-10 hidden -translate-x-1/2 -translate-y-1/2 items-center md:block"
            src="{{ asset('img/coffe.png') }}" alt="background-decoration" loading="lazy" width="500"
            height="500" decoding="async">
    </div>

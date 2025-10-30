    <div class="flex flex-col items-center p-5 md:p-10">
        <a class="flex items-center justify-center" href="href="">
            <img class="w-50 h-8" src="{{ asset('img/logo blue.svg') }}" alt="Coffee Shop" width="120" height="48">
        </a>

        {{-- Notifikasi sukses --}}
        @if (session()->has('success'))
            <div x-data="{ show: true }" x-show="show" x-transition
                class="mb-4 flex items-center justify-between rounded-lg border border-green-400 bg-green-100 px-4 py-3 text-green-800">
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="text-lg font-bold">&times;</button>
            </div>
        @endif
        <div class="mt-10 w-full rounded-lg border-[1px] border-gray-100 bg-white p-5 md:w-[400px]">
            <h3 class="text-primary-500 mb-5 text-lg font-bold">Daftar</h3>
            <form wire:submit.prevent="register" class="mt-5 flex flex-col gap-2">
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <input type="text" wire:model.defer="name" placeholder="alex"
                            class="w-full rounded-lg border-gray-300 p-2 bg-gray-100 placeholder:text-gray-400 border-0 focus:ring-blue-500">
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                        <input type="email" wire:model.defer="email" placeholder="1@gmail.com"
                            class="w-full rounded-lg border-gray-300 p-2 bg-gray-100 placeholder:text-gray-400 border-0 focus:ring-blue-500">
                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                            <input type="password" wire:model.defer="password" placeholder="password"
                                class="w-full rounded-lg border-gray-300 p-2 bg-gray-100 placeholder:text-gray-400 border-0 focus:ring-blue-500">
                            @error('password')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-2">
                            <input type="password" wire:model.defer="password_confirmation"
                                placeholder="confirm password"
                                class="w-full rounded-lg border-gray-300 p-2 bg-gray-100 placeholder:text-gray-400 border-0 focus:ring-blue-500">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full rounded-lg bg-blue-600 py-2 font-semibold text-white transition-all hover:bg-blue-700">
                        Daftar
                    </button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-600">
                Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login di sini</a>
            </p>
        </div>

    </div>

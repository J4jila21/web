<div 
    x-data="{ 
        showSuccess: false,
        showExpired: false,
        expiresAt: new Date('{{ $expiresAt }}').getTime(),
        remaining: 0, minutes: 0, seconds: 0,
        startCountdown() {
            const timer = setInterval(() => {
                const now = new Date().getTime();
                this.remaining = this.expiresAt - now;


                if (this.remaining <= 0) {
                    clearInterval(timer);
                    this.remaining = 0;
                    this.showExpired = true;
                }

                this.minutes = Math.floor((this.remaining % (1000 * 60 * 60)) / (1000 * 60));
                this.seconds = Math.floor((this.remaining % (1000 * 60)) / 1000);
            }, 1000);
        }
    }"
    x-init="startCountdown();
        Livewire.on('passwordResetSuccess', () => {
            showSuccess = true;
            setTimeout(() => window.location.href = '{{ route('login') }}', 3000);
        });
    "
    class="flex flex-col items-center p-5 md:p-10"
>
<a class="flex items-center justify-center" href="href="">
            <img class="w-50 h-8" src="{{ asset('favicon.png') }}" alt="Coffee Shop" width="120" height="48" loading="lazy">
        </a>
        <div class="mt-20 w-full rounded-lg border-[1px] border-gray-100 bg-white p-5 md:w-[400px] shadow-sm">
    <h3 class="text-primary-500 mb-5 text-lg font-bold">Reset Password</h3>

    <div class="mb-4 text-sm text-primary-500">
        Token berlaku selama: 
        <span x-text="minutes"></span> menit 
        <span x-text="seconds"></span> detik
    </div>

    <form wire:submit.prevent="resetPassword" class="w-full max-w-sm flex flex-col gap-4">
        <input type="email" wire:model.defer="email" placeholder="Email Anda"
            class="focus:ring-primary-500 w-full rounded-lg border-0 bg-gray-100 p-2 placeholder:text-gray-400 focus:ring-2" readonly />

        <input type="password" wire:model.defer="password" placeholder="Password baru"
            class="focus:ring-primary-500 w-full rounded-lg border-0 bg-gray-100 p-2 placeholder:text-gray-400 focus:ring-2" />

        <input type="password" wire:model.defer="password_confirmation" placeholder="Konfirmasi password"
            class="focus:ring-primary-500 w-full rounded-lg border-0 bg-gray-100 p-2 placeholder:text-gray-400 focus:ring-2" />
        @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <button type="submit"
            class="bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Simpan Password Baru
        </button>
    </form>

    <!-- ✅ Popup Notifikasi Sukses -->
    <div 
        x-show="showSuccess"
        x-transition
        x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black/40 z-50"
    >
        <div class="bg-white rounded-xl shadow-lg p-6 text-center w-80">
            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3 text-green-500" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <h4 class="text-lg font-semibold text-gray-800 mb-2">Password Diperbarui!</h4>
            <p class="text-gray-600 text-sm mb-4">Password berhasil diubah. Anda akan diarahkan ke halaman login...</p>
            <div class="animate-pulse text-blue-600 text-sm">Mengalihkan...</div>
        </div>
    </div>
    <div x-show="showExpired" x-transition.opacity x-cloak class="fixed inset-0 flex items-center justify-center bg-black/40 z-50">
        <div class="bg-white rounded-xl shadow-lg p-6 text-center w-80">
            <img src="{{ asset('img/time.png') }}" alt="sadframe" width="50" height="50" loading="lazy" class="mx-auto mb-3">
            <h4 class="text-lg font-semibold text-gray-800 mb-2">Waktu Token Habis</h4>
            <p class="text-gray-600 text-sm mb-4">Token Anda sudah tidak aktif. Yuk, kirim ulang permintaan reset password agar bisa lanjut ganti password</p>
            <button @click="window.location.href = '{{ route('forgot-password') }}'" class="bg-blue-600 w-full text-white py-2 rounded-lg hover:bg-blue-700 transition">
                ok
            </button>
        </div>

    </div>
        </div>
</div>

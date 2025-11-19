<div class="flex flex-col items-center p-5 md:p-10">
<a class="flex items-center justify-center" href="/">
            <img class="w-50 h-8" src="{{ asset('favicon.png') }}" alt="Coffee Shop" width="120" height="48" loading="lazy"></a>
    <div class="mt-20 w-full rounded-lg border-[1px] border-gray-100 bg-white p-5 md:w-[400px] shadow-sm">
        <div class="flex items-center gap-2 mb-4"><a class="flex items-center gap-1 text-primary" href="/login"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left h-4 w-4"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg><span class="text-sm">Kembali</span></a></div>
        <h3 class="text-primary-500 mb-5 text-lg font-bold">Lupa Password</h3>
        <p class="text-sm text-gray-800 my-2 text-center">Masukkan email Anda untuk melakukan reset password</p>
    <form wire:submit.prevent="submit" class="w-full max-w-sm flex flex-col gap-4">
        <input type="email" wire:model.defer="email" placeholder="Masukkan email Anda"
            class="h-8 w-full border-gray-300 rounded-lg bg-gray-100 px-3 py-6 text-sm placeholder:text-gray-400 p-2  focus:border-primary-500" />
        @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <button type="submit"
            class="bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            Reset Password 
        </button>
    </form>
    </div>
</div>

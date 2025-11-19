<x-layouts :title="$title">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
        <form action="{{ route('user.profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" name="name" class="w-full border-gray-200 rounded-lg p-2 focus:border-primary-500"
                    value="{{ auth()->user()->name }}" id="username">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" class="w-full border-gray-200 rounded-lg p-2 focus:ring-2 focus:border-primary-500"
                    value="{{ auth()->user()->email }}" id="email">
            </div>

            <button type="submit" class="bg-primary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-800 transition-all duration-300">
                Simpan Perubahan
            </button>
        </form>
    </div>
</x-layouts>

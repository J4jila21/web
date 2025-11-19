{{-- <x-layouts.admin title="Pengguna | Seduhin"> --}}
<main class="mt-20 h-full w-full md:ltr:ml-64 md:ltr:mr-64">
    <div class="py-12 container !max-w-full px-6 lg:px-20">
        {{-- Notifikasi popup --}}
        @if (session('success'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 5000)"
        x-show="show"
        x-transition.opacity.duration.500ms
        class="fixed right-1/2 top-5 z-50 translate-x-1/2 transform rounded border border-green-500 bg-green-100 px-4 py-2 text-green-700 shadow-lg"
    >
        {{ session('success') }}
    </div>
@endif

        <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 border-gray-300 rounded-t-lg ">
            <div wire:ignore.self x-data="{open: @entangle('showDeleteModal')}" x-show="open" x-transition.opacity.duration.200ms x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div x.transition.scale.origin.center.duration.200ms @click.away="open = false" class="w-96 rounded-lg bg-white p-6 shadow-xl text-center">
                    <h2 class="text-lg font-semibold mb-2 text-gray-800">Anda yakin ingin menghapus pengguna ini?</h2>
                    <p class="text-sm text-gray-600 mb-4">Data yang telah dihapus tidak dapat dikembalikan.</p>
                    <div class="flex justify-center gap-3">
                        <button @click="open = false" class="rounded border px-4 py-2 mr-2">Batal</button>
                        <button wire:click="deleteuser()" class="bg-red-600 text-white rounded px-4 py-2">Hapus</button>
                    </div>
                </div>

            </div>
            <div class="sm:flex items-center justify-between">
                <p class="text-sm font-bold text-gray-800">Pengguna</p>
                <div class="flex items-center gap-2">
            <label class="text-sm text-gray-600">Urutkan:</label>
            <select wire:model.live="sortOrder"
                class="focus:border-primary-500 w-full rounded border-gray-300 p-2 sm:w-44">
                <option value="desc">Terbaru</option>
                <option value="asc">Terlama</option>
            </select>
        </div>
            </div>
        </div>
        <div class="bg-white border !border-t-0 border-gray-300 shadow-sm">
        <table class="w-full border-collapse overflow-hidden shadow-sm">
            <thead class="bg-gray-200">
                <tr class="w-full h-16 text-sm">
                    <th class="p-2">ID</th>
                    <th class="p-2 text-start">Pengguna</th>
                    <th class="p-2">Tanggal Daftar</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr wire:key="row-{{ $user->id }}" class="border-b hover:bg-gray-100">
                        <td class="p-2 text-center">{{ $user->id }}</td>
                        <td class="p-2 text-start flex items-center gap-5">
                            <div>
                    @php
                        // === Warna avatar unik ===
                        $colors = [
                            'bg-red-500',
                            'bg-orange-500',
                            'bg-amber-500',
                            'bg-yellow-500',
                            'bg-lime-500',
                            'bg-green-500',
                            'bg-emerald-500',
                            'bg-teal-500',
                            'bg-cyan-500',
                            'bg-sky-500',
                            'bg-blue-500',
                            'bg-indigo-500',
                            'bg-violet-500',
                            'bg-purple-500',
                            'bg-fuchsia-500',
                            'bg-pink-500',
                            'bg-rose-500',
                        ];
                        $identifier = $user->email ?? $user->name;
                        $hash = crc32($identifier);
                        $index = $hash % count($colors);
                        $bgColor = $colors[$index];
                        $initial = strtoupper(substr($user->name ?? 'U', 0, 1));
                    @endphp

                    <div class="{{ $bgColor }} flex h-10 w-10 items-center justify-center rounded-full text-white font-bold">
                        {{ $initial }}
                    </div>
                </div>
                <div>
                            <p>{{ $user->name }}</p>
                            <p class="text-[11px] pt-1 text-gray-500">{{ $user->email }}</p>
                        </div>
                        </td>
                        {{-- <td class="p-2 text-center">{{ $user->email }}</td> --}}
                        <td class="p-2 text-center">{{ $user->created_at->format('d M Y') }}</td>
                        <td class="p-2 text-center">
                            <div x-data="{
                                open: false,
                                position: 'bottom',
                                checkPosition() {
                                    this.$nextTick(() => {
                                        const dropdown = this.$refs.dropdown.getBoundingClientRect();
                                        const spaceBelow = window.innerHeight - dropdown.bottom;
                            
                                        this.position = spaceBelow < 120 ? 'top' : 'bottom';
                                    });
                                }
                            }" class="relative inline-block">

                                <!-- Trigger Button -->
                                <button @click="open = !open; checkPosition()"
                                    class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>

                                <!-- Dropdown -->
                                    <div x-show="open" x-ref="dropdown" @click.away="open = false" x-transition x-cloak
                                        :class="position === 'top'
                                            ?
                                            'bottom-full mb-2' :
                                            'top-full mt-2'"
                                        class="absolute right-0 z-50 w-44 rounded-lg border bg-white shadow-lg">
                                        <a class="flex w-full items-center gap-2 px-4 py-2 text-gray-800 hover:bg-gray-100 " href="{{ route('admin.users.edit', $user->id) }}" 
       class="text-blue-600 hover:underline">Edit</a>

                                        <button @click="$wire.openDeleteModal({{ $user->id }}); open=false"
                                            class="flex w-full items-center gap-2 px-4 py-2 text-red-600 hover:bg-gray-100">
                                            Delete
                                        </button>
                            </div>
    </div>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
        </div>
        <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-t-0 border-gray-300 rounded-b-lg ">
            <div class="mt2">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</main>
{{-- </x-layouts.admin> --}}

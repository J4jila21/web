<x-layout>
 @if(session('success'))
<div id="notifSuccess" 
     class="fixed top-5 left-1/2 bg-white text-black border border-gray-300 px-6 py-3 rounded-lg shadow-lg z-[9999] animate-fade-in">
    <p>{{ session('success') }}</p>
</div>
@endif

    {{-- Modal Notifikasi Error --}}
    @if ($errors->any())
        <div id="errorModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-sm p-6 rounded shadow text-center animate-fade-in">
                <h3 class="text-red-600 font-bold text-lg mb-2">Terjadi Kesalahan!</h3>
                <ul class="text-gray-700 text-left list-disc list-inside">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
                <div class="mt-4 text-center">
                    <button onclick="closeErrorModal()" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Konten Utama --}}
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Daftar Buku</h1>
                <button onclick="openFormModal()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    + Tambah Buku
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-4 py-2 text-left">No</th>
                            <th class="px-4 py-2 text-left">Judul Buku</th>
                            <th class="px-4 py-2 text-left">Pengarang</th>
                            <th class="px-4 py-2 text-left">Tahun Terbit</th>
                            <th class="px-4 py-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($buku as $item)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $item->judul }}</td>
                                <td class="px-4 py-2">{{ $item->pengarang }}</td>
                                <td class="px-4 py-2">{{ $item->tahun_terbit }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <button 
                                        onclick="openFormModal('{{ $item->id }}', '{{ $item->judul }}', '{{ $item->pengarang }}', '{{ $item->tahun_terbit }}')" 
                                        class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500">
                                        Edit
                                    </button>
                                    <form id="form-hapus-{{ $item->id }}" action="{{ route('buku.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            onclick="openModal({{ $item->id }})" 
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 py-4">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Tambah/Edit --}}
    <div id="modalForm" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-40">
        <div class="bg-white w-full max-w-md p-6 rounded shadow relative animate-fade-in">
            <span onclick="closeFormModal()" class="absolute top-2 right-3 text-2xl font-bold text-gray-600 cursor-pointer">&times;</span>
            <h3 id="modalTitle" class="text-xl font-bold mb-4">Tambah Data Buku</h3>
            <form id="formBuku" method="POST" action="{{ route('buku.store') }}">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="">
                <div class="mb-4">
                    <label for="judul" class="block font-semibold mb-1">Judul Buku</label>
                    <input type="text" id="judul" name="judul" autocomplete="off" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="pengarang" class="block font-semibold mb-1">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" autocomplete="off" class="w-full border border-gray-300 px-3 py-2 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="tahun_terbit" class="block font-semibold mb-1">Tahun Terbit</label>
                    <input type="number" id="tahun_terbit" name="tahun_terbit" class="w-full border border-gray-300 px-3 py-2 rounded" min="1900" max="2099" required>
                </div>
                <div class="text-right">
                    <button id="editButton" type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah</button>
                </div>
            </form>
        </div>
    </div>

 <div id="confirmModal" 
     class="fixed inset-0 bg-black bg-opacity-50 hidden z-[9998]">
    <div class="flex items-center justify-center w-full h-full">
        <div class="bg-white w-full max-w-sm p-6 rounded-lg shadow text-center relative animate-fade-in">
            <span onclick="closeModal()" 
                  class="absolute top-2 right-3 text-2xl font-bold text-gray-600 cursor-pointer">&times;</span>
            <p class="text-lg mb-4">Apakah Anda yakin ingin menghapus data ini?</p>
            <div class="flex justify-end gap-2">
                <button onclick="closeModal()" 
                        class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
                    Batal
                </button>
                <button id="confirmDelete" 
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Hapus
                </button>
            </div>
        </div>
    </div>
</div>

    {{-- Script --}}
    <script>
        // MODAL TAMBAH / EDIT
        function openFormModal(id = null, judul = '', pengarang = '', tahun = '') {
            const modal = document.getElementById('modalForm');
            const form = document.getElementById('formBuku');
            const methodField = document.getElementById('methodField');

            if (id) {
                form.action = `/buku/${id}`;
                methodField.value = 'PUT';
                document.getElementById('judul').value = judul;
                document.getElementById('pengarang').value = pengarang;
                document.getElementById('tahun_terbit').value = tahun;
                document.getElementById('modalTitle').innerText = 'Edit Data Buku';
                document.getElementById('editButton').innerText = 'Update';
            } else {
                form.action = `/buku`;
                methodField.value = '';
                form.reset();
                document.getElementById('modalTitle').innerText = 'Tambah Data Buku';
                document.getElementById('editButton').innerText = 'Tambah';
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeFormModal() {
            document.getElementById('modalForm').classList.remove('flex');
            document.getElementById('modalForm').classList.add('hidden');
        }

        // KONFIRMASI HAPUS
        let selectedId = null;
        function openModal(id) {
            selectedId = id;
            document.getElementById('confirmModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('confirmModal').classList.add('hidden');
            selectedId = null;
        } 

        document.getElementById('confirmDelete').addEventListener('click', () => {
            if (selectedId) {
                document.getElementById(`form-hapus-${selectedId}`).submit();
            }
        });

        // MODAL NOTIFIKASI
        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
        }

        function closeErrorModal() {
            document.getElementById('errorModal').classList.add('hidden');
        }

        document.addEventListener("DOMContentLoaded", function() {
        const notifSuccess = document.getElementById('notifSuccess');
        if (notifSuccess) {
            setTimeout(() => {
                notifSuccess.classList.add('opacity-0', 'transition', 'duration-500');
                setTimeout(() => notifSuccess.remove(), 500); // Hapus dari DOM setelah efek hilang
            }, 5000); // 5 detik
        }
    });
        // Animasi Fade-in
        const style = document.createElement('style');
        style.innerHTML = `
            @keyframes fadeIn {
                from { opacity: 0; transform: scale(0.95); }
                to { opacity: 1; transform: scale(1); }
            }
            .animate-fade-in {
                animation: fadeIn 0.3s ease-out;
            }
        `;
        document.head.appendChild(style);
    </script>
</x-layout>

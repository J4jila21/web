<main class="mt-20 h-full w-full md:ltr:ml-64 md:ltr:mr-64">
    <div class="py-12 container !max-w-full px-6 lg:px-20">
        <div class="w-full bg-white rounded-t-lg shadow-md p-6 border-b-2 border">
                <h2 class="text-xl font-bold mb-4">Buat Artikel </h2>
    <form wire:submit.prevent="store" class="space-y-4">
        <div class ="flex flex-col gap-5 sm:grid-cols-2 lg:grid-cols-3">
            <div class="flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-white">Judul</label>
                <input type="text" wire:model="title" placeholder="Masukan Judul" class="w-full border-gray-300 focus:border-primary-500 p-2 rounded-lg">
            </div>
            <div class="flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-white">Penulis</label>
                <input type="text" wire:model="author" placeholder="Masukan Penulis" class="w-full border-gray-300 focus:border-primary-500 p-2 rounded-lg">
            </div>
            <div class="flex-col">
                <label class="text-sm font-medium text-gray-600 dark:text-white">Isi</label>
                <textarea wire:model="body" placeholder="Masukan Konten Artikel" class="w-full border-gray-300 focus:border-primary-500 p-2 rounded"></textarea>
            </div>
            <div class="flex-col">
                <input type="file" wire:model="image" class="w-full border p-2 rounded">
            </div>  
    </div>
    <div class="w-full bg-white rounded-b-lg shadow-md p-6 flex justify-end">   
    <button class="bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white px-8 py-4 rounded">Buat</button>
    </div> 
</form>
</div>
    </div>
</main>

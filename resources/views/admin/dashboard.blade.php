<x-layouts.admin>
     @section('title', 'Dashboard')
    <main class="mt-20 h-full w-full md:ltr:ml-64 md:rtl:mr-64">
        <div class="py-12 container !max-w-full px-6 lg:px-20">
            <div class="container mx-auto px-4 py-6">
                <div class="mb-8 flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        
                            
                                <h3 class="text-lg font-semibold text-gray-700">Jumlah Layanan</h3>
                                <p class="text-2xl font-bold text-gray-800">{{ $totalProducts }}</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        
                                <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                                <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
                            
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md"> 
                        
                                <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
                                {{-- <p class="text-lg font-semibold text-gray-800">{{ $totalOrders }}</p> --}}
                           
                    </div>
                </div>
                <div class="w-full  rounded-lg bg-white p-6 shadow-md">
                    <h2 class="p-4 text-lg font-semibold">Latest Users</h2>
                    @foreach ($latestUsers as $user)
                        <div class="border-b border-gray-100 px-4 py-2">
                            <div class="flex items-center justify-between text-gray-700">
                                <div class="w-1/2 truncate">{{ $user->email }}</div>
                                <div class="text-sm text-gray-500">{{ $user->created_at->format('d M Y') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-layouts.admin>

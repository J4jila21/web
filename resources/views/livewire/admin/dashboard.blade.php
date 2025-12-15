{{-- <x-layouts.admin title="Dashboard | Seduhin"> --}}
<main class="mt-20 h-full w-full md:ltr:ml-64 md:rtl:mr-64">
    <div class="container !max-w-full px-6 py-12 lg:px-20">
        <div class="container mx-auto px-4 py-6">
            <div class="mb-4 rounded-lg bg-gray-100 p-6 shadow">
                {{-- Filter Section --}}
                <div 
    x-data="{
        open: false,
        selected: @entangle('filter'),
        inputValue: '',
        options: [
            { value: 'today', label: 'Today' },
            { value: '7days', label: 'Last 7 Days' },
            { value: '30days', label: 'Last 30 Days' }
        ],
        updateInput() {
            const opt = this.options.find(o => o.value === this.selected);
            this.inputValue = opt ? opt.label : this.selected;
        }
    }"
    x-init="updateInput()"
    @click.away="open = false"
    class="flex items-center gap-3 relative lg:justify-start"
>
    <!-- Input (bisa diketik manual) -->
    <div class="relative w-1/4">
        <input 
            type="text"
            class="border border-gray-300 rounded-lg py-3 text-sm w-full focus:border-primary-500 bg-white"
            autocomplete="off"
            x-model="inputValue"
            @click="open = !open"
            @input="selected = inputValue"  <!-- update Livewire saat user mengetik -->
        

        <!-- Dropdown -->
        <div 
            x-show="open"
            x-cloak
            class="absolute z-10 mt-1 w-full bg-white border rounded-lg shadow-md"
        >
            <ul class="divide-y text-sm">
                <template x-for="option in options" :key="option.value">
                    <li 
                        class="px-3 py-2 hover:bg-gray-100 cursor-pointer"
                        @click="
                            selected = option.value;
                            inputValue = option.label;
                            open = false;
                        "
                        x-text="option.label"
                    ></li>
                </template>
            </ul>
        </div>
    </div>

    <!-- Tombol Filter -->
    <button 
        wire:click="applyFilter"
        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg"
    >
        <span wire:loading.remove>Filter</span>
        <span wire:loading class="flex items-center gap-2 text-blue-500 text-sm">
    <svg class="animate-spin h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
    </svg>
</span>

    </button>
</div>


            </div>

            <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-3">
                
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700">Total Income</h3>
                    <p class="text-2xl font-bold text-gray-800"> Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
                </div>
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700">Jumlah Layanan</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalProducts }}</p>
                </div>
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalUsers }}</p>
                </div>
                <div class="rounded-lg bg-white p-6 shadow-md">
                    <h3 class="text-lg font-semibold text-gray-700">Total Orders</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalOrders }}</p>
                </div>
            </div>

            <div class="w-full rounded-lg bg-white p-6 shadow-md">
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
            <div class="mt-8 rounded-xl bg-white p-6 shadow-md" wire:ignore>
    <div class="mb-4 flex items-center justify-between">
        <div>
            <h3 class="text-lg font-semibold text-gray-700">
                Statistik Orders & Users
            </h3>
            <p class="text-sm text-gray-400">
                6 bulan terakhir
            </p>
        </div>
        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-600">
            Monthly
        </span>
    </div>

    <div class="relative h-[320px]">
        <canvas id="orderUserChart"></canvas>
    </div>
</div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('livewire:navigated', initChart);
document.addEventListener('DOMContentLoaded', initChart);

let chartInstance = null;

function initChart() {
    const ctx = document.getElementById('orderUserChart');
    if (!ctx) return;

    if (chartInstance) {
        chartInstance.destroy();
    }

    chartInstance = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartMonths),
            datasets: [
                {
                    label: 'Total Orders',
                    data: @json($chartOrders),
                    backgroundColor: 'rgba(37, 99, 235, 0.85)',
                    borderRadius: 8,
                    barThickness: 26
                },
                {
                    label: 'Total Users',
                    data: @json($chartUsers),
                    backgroundColor: 'rgba(16, 185, 129, 0.85)',
                    borderRadius: 8,
                    barThickness: 26
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                },
                tooltip: {
                    backgroundColor: '#111827',
                    padding: 12,
                    cornerRadius: 8
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#E5E7EB'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
}
</script>

</main>
{{-- </x-layouts.admin> --}}

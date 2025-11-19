<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Layout;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    public $filter = ''; // Default filter
    public $totalUsers;
    public $totalProducts;
    public $latestUsers;
    public $totalOrders;
    public $totalIncome;

    public function mount()
    {
        $this->applyFilter();
    }

    public function updatedFilter()
    {
        $this->applyFilter();
    }

    public function applyFilter()
    {   
        if ($this->filter == 'all' || $this->filter == '') {
            $this->totalUsers = User::count();
            $this->totalProducts = Product::count();
            $this->totalOrders = Order::count();
            $this->latestUsers = User::latest()->take(10)->get();
            $this->totalIncome = Order::sum('total');
            return;
        }
        $queryRange = match ($this->filter) {
            'today' => [Carbon::today(), Carbon::now()],
            '7days' => [Carbon::now()->subDays(7), Carbon::now()],
            '30days' => [Carbon::now()->subDays(30), Carbon::now()],
            default => [Carbon::today(), Carbon::now()],
        };

        [$start, $end] = $queryRange;
        $income = Order::whereBetween('created_at', [$start, $end])->sum('total');
        $this->totalIncome = $income;

        $this->totalUsers = User::whereBetween('created_at', [$start, $end])->count();
        $this->totalProducts = Product::whereBetween('created_at', [$start, $end])->count();
        $this->totalOrders = Order::whereBetween('created_at', [$start, $end])->count();
        $this->latestUsers = User::whereBetween('created_at', [$start, $end])
            ->latest()
            ->take(10)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->layout('components.layouts.admin', [
                'title' => 'Dashboard | Seduhin',
            ]);
    }
}

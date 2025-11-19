<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use Livewire\WithPagination;
use Livewire\Component;

class Orders extends Component
{   
    use WithPagination;

    public $search = '';
    public $sortOrder = 'desc';
    public $queryString = ['sortOrder'];
    

    protected $paginationTheme = 'tailwind';

    public function updatingSortOrder()
    {
        $this->resetPage();
    }
    public function render()
    {
       $orders = Order::orderby('created_at', $this->sortOrder)->with(['user', 'items.product'])
    ->whereHas('user', function($q) {
        $q->where('name', 'like', '%' . $this->search . '%');
    })
    ->orWhere('payment_method', 'like', '%' . $this->search . '%')
    ->orWhere('status', 'like', '%' . $this->search . '%')
    ->latest()
    ->paginate(10);


        return view('livewire.admin.orders', [
            'orders' => $orders
            ])->layout('components.layouts.admin', [
                'title' => 'Pesanan | Seduhin',
            ]);
            
    }

    public function UpdateOrder($id, $status)
{
    $order = Order::find($id);

    if ($order) {
        $order->status = $status;
        $order->save();
    }

    session()->flash('message', 'Status berhasil diperbarui!');
}
}

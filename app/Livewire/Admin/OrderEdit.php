<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderEdit extends Component
{
    public $order;
    public $status;

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->status = $order->status;
    }

    public function updateOrder()
    {
        $this->order->update([
            'status' => $this->status
        ]);

        session()->flash('success', 'Status pesanan berhasil diupdate');
        return redirect()->route('admin.orders');
    }

    public function render()
    {
        return view('livewire.admin.order-edit');
    }
}

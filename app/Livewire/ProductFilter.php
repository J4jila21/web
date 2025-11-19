<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductFilter extends Component
{
    public $sort = ''; // default kosong

    public function updatedSort()
    {
        // Memicu re-render saat sort berubah
    }

    public function render()
    {
        $products = Product::query();

        if ($this->sort === 'cheap') {
            $products->orderBy('price', 'asc');
        } elseif ($this->sort === 'expensive') {
            $products->orderBy('price', 'desc');
        } else {
            $products->latest();
        }

        return view('livewire.product-filter', [
            'products' => $products->get()
        ]);
    }
}

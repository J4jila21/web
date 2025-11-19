<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Order;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        
        $query = Product::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%");
            });
        }

        $products = $query->latest()->get();
        return view('product.index', [
            'title' => 'Product - Kopi Terbaik dari Nusantara',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'product_id' => 'required',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);

    Order::create([
        'user_id' => auth()->id(),
        'product_id' => $product->id,
        'quantity' => $request->quantity,
        'total' => $product->price * $request->quantity,
        'status' => 'pending'
    ]);

    return back()->with('success', 'Pesanan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}

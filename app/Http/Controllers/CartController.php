<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        // Pastikan user login
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Unauthorized',
                'message' => 'Silakan login terlebih dahulu sebelum menambah ke keranjang.'
            ], 401);
        }

        // Validasi data
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'image' => 'nullable|string'
        ]);

        // Simpan data ke session (bisa nanti ubah ke database)
        $cart = session()->get('cart', []);
        $id = $validated['id'];

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $validated['quantity'];
        } else {
            $cart[$id] = [
                'name' => $validated['name'],
                'price' => $validated['price'],
                'quantity' => $validated['quantity'],
                'image' => $validated['image']
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan ke keranjang.',
            'cart' => $cart
        ]);
    }
}

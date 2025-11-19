<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'payment_method' => 'required',
            'payment_fee' => 'required',
            'discount' => 'required',
            'total' => 'required',
            'cart' => 'required|array',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'payment_method' => $data['payment_method'],
            'payment_fee' => $data['payment_fee'],
            'discount' => $data['discount'],
            'total' => $data['total'],
            'status' => 'pending',
        ]);

        foreach ($data['cart'] as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        return response()->json([
            'success' => true,
            'order_id' => $order->id
        ]);
    }
}

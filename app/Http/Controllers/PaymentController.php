<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\CoreApi;

class PaymentController extends Controller
{
    public function createQrisPayment(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Ambil data dari frontend
        $items = $request->input('items');
        $total = $request->input('total');

        // Data transaksi
        $params = [
            'payment_type' => 'qris',
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),
                'gross_amount' => $total,
            ],
            'item_details' => $items,
            'customer_details' => [
                'first_name' => 'Customer',
                'email' => 'user@example.com',
            ],
        ];

        try {
            // Request ke Midtrans
            $response = CoreApi::charge($params);

            return response()->json([
                'status' => 'success',
                'qr_url' => $response->actions[0]->url, // URL QRIS
                'order_id' => $response->order_id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}

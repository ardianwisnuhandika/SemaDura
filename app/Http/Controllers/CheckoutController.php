<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'product' => 'required|string',
            'quantity' => 'required|integer',
        ]);
        $validated['status'] = 'Diproses';
        Order::create($validated);
        return redirect()->route('checkout')->with('success', 'Pesanan Anda berhasil dikirim!');
    }
}

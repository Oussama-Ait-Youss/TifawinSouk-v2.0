<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CommandesController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $orders = Order::where('user_id', $userId)
            ->latest()
            ->paginate(10);

        return view('client.commandes.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Security check
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('client.commandes.show', compact('order'));
    }
}

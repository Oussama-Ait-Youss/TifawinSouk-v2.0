<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Routing\Middleware\Authorize;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        $total = collect($cart)->reduce(function ($carry, $item) {
            return $carry + ($item['unit_price'] * $item['quantity']);
        }, 0);

        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name' => Auth::user()->name,
            'customer_address' => Auth::user()->email,
            'customer_phone' => '',
            'status' => Order::STATUS_PENDING,
            'total' => $total,
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'line_total' => $item['unit_price'] * $item['quantity'],
            ]);

            // Optional: decrease stock
            $product = Produit::find($item['id']);
            if ($product) {
                $product->decrement('stock', $item['quantity']);
            }
        }

        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Commande passée avec succès.');
    }
}

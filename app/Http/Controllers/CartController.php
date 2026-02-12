<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $data = $request->all();
        $productId = $data['product_id'] ?? $data['id'] ?? null;
        $qty = isset($data['quantity']) ? intval($data['quantity']) : 1;

        if (! $productId) {
            return response()->json(['success' => false, 'message' => 'product_id is required'], 400);
        }

        $product = Produit::find($productId);
        if (! $product) {
            return response()->json(['success' => false, 'message' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->nom,
                'unit_price' => $product->prix_vente,
                'quantity' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart' => $cart,
        ]);
    }

    public function show()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->reduce(function ($carry, $item) {
            return $carry + ($item['unit_price'] * $item['quantity']);
        }, 0);

        return response()->json([ 'cart' => $cart, 'total' => $total ]);
    }

    public function clear()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }

    public function remove(Request $request)
    {
        $data = $request->all();
        $productId = $data['product_id'] ?? $data['id'] ?? null;

        if (! $productId) {
            return response()->json(['success' => false, 'message' => 'product_id is required'], 400);
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        $total = collect($cart)->reduce(function ($carry, $item) {
            return $carry + ($item['unit_price'] * $item['quantity']);
        }, 0);

        return response()->json(['success' => true, 'cart' => $cart, 'total' => $total]);
    }
}
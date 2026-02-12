<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Fournisseurs;
use App\Models\Produit;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Produit::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $fournisseurs = Fournisseurs::select('id', 'nom')->get();
        return view('admin.products.create', compact('categories', 'fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'reference' => 'required|max:255|min:10|string',
            'nom' => 'required|max:50|string',
            'prix_achat' => 'required|numeric|min:0',
            'prix_vente' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:category,id',
            'fournisseurs_id' => 'required|exists:fournisseurs,id'
        ]);

        Produit::create($validatedData);
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Produit::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Produit::findOrFail($id);

        $categories = Category::select('id', 'name')->get();
        $fournisseurs = Fournisseurs::select('id', 'nom')->get();
        return view('admin.products.edit', compact('product','categories','fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $product) {
        $validatedData = $request->validate([
            'reference' => 'required|max:255|min:10|string',
            'nom' => 'required|max:50|string',
            'prix_achat' => 'required|numeric|min:0',
            'prix_vente' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:category,id',
            'fournisseurs_id' => 'required|exists:fournisseurs,id'
        ]);
        
        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Produit::findOrFail($id)->delete();
            return redirect()->route('products.index')->with('success', 'Product removed successfully!');
        } catch(Exception $e) {
            return redirect()->route('products.index')->with('error', 'Error removing product: ' . $e->getMessage());
        }
    }
}

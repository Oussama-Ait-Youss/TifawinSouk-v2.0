<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Produit;


class HomeController extends Controller
{
     public function index()
    {
        $categories = Category::all();
        $products = Produit::select('nom','prix_vente','stock','id')->get();

        return view('home', compact('categories', 'products'));
    }
}

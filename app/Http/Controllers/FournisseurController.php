<?php

namespace App\Http\Controllers;

use App\Models\Fournisseurs; // Utilisation du singulier par convention
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        $fournisseurs = Fournisseurs::all();
        return view('admin.fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('admin.fournisseurs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email',
            'ville' => 'required|string|max:255',
            'telephone' => 'required|string|max:15'
        ]);

        Fournisseurs::create($validated);
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté avec succès !');
    }

    public function edit(Fournisseurs $fournisseur)
{
    // Vérifiez que le nom de la variable passée est bien 'fournisseur'
    return view('admin.fournisseurs.edit', compact('fournisseur'));
}

    public function update(Request $request, Fournisseurs $fournisseur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:fournisseurs,email,' . $fournisseur->id, // Ignore l'ID actuel pour l'unicité
            'ville' => 'required|string|max:255',
            'telephone' => 'required|string|max:15'
        ]);

        $fournisseur->update($validated);
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour !');
    }

    public function destroy(Fournisseurs $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé !');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fournisseurs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fetsh all the fournisseurs
        $fournisseurs = Fournisseurs::all();
        // dd($fournisseurs);
        return view('admin.fournisseur.index',compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.fournisseur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nom'=> 'required|string|max:255',
            'email'=>'required|string|max:255',
            'ville'=>'required|string|max:255',
            'telephone'=>'required|string|max:15'

        ]);
        Fournisseurs::create($validate);
        return redirect()->route('fournisseur.index')->with('success','Fournisseur ajouter!'); 
    }


    /**
     * Display the specified resource.
     */
    public function show(Fournisseurs $fournisseur)
    {
        


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseurs $fournisseur)
    {
        //
        return view('Fournisseur.edit',compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseurs $fournisseur)
    {
        //
         $request->validate([
            'nom'=> 'required|string|max:255',
            'email'=>'required|string|max:255',
            'ville'=>'required|string|max:255',
            'telephone'=>'required|string|max:15'

        ]);
        $fournisseur->update($request->all());
        $fournisseur=Fournisseurs::all();
        return view('Founisseur.index',compact('fournisseur'));

    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Fournisseurs $fournisseur)
    {

        $fournisseur->delete();
        $fournisseur=Fournisseurs::all();
        return view('Fournisseur.index',compact('fournisseur'));
    }
}

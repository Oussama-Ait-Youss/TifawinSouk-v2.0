@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Vue d'ensemble</h2>
    <p class="text-gray-600">Bienvenue dans votre gestionnaire TifawinSouk.</p>
</div>

<div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
    <div class="p-6 bg-white border-b-4 border-blue-500 shadow-sm rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-gray-500 uppercase">Produits</p>
                <p class="text-3xl font-black text-gray-800">{{ \App\Models\Produit::count() }}</p>
            </div>
            <div class="p-3 text-blue-600 bg-blue-100 rounded-full">
                <i class="fas fa-box fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white border-b-4 border-purple-500 shadow-sm rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-gray-500 uppercase">Catégories</p>
                <p class="text-3xl font-black text-gray-800">{{ \App\Models\Category::count() }}</p>
            </div>
            <div class="p-3 text-purple-600 bg-purple-100 rounded-full">
                <i class="fas fa-tags fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="p-6 bg-white border-b-4 border-orange-500 shadow-sm rounded-xl">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-bold text-gray-500 uppercase">Fournisseurs</p>
                <p class="text-3xl font-black text-gray-800">{{ \App\Models\Fournisseurs::count() }}</p>
            </div>
            <div class="p-3 text-orange-600 bg-orange-100 rounded-full">
                <i class="fas fa-truck fa-2x"></i>
            </div>
        </div>
    </div>
</div>

<div class="p-6 bg-white shadow-sm rounded-xl">
    <h3 class="mb-4 text-lg font-bold text-gray-700">Actions Rapides</h3>
    <div class="flex flex-wrap gap-4">

        <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">+ Nouveau Produit</a>
        <a href="{{ route('fournisseurs.create') }}" class="bg-slate-700 text-white px-4 py-2 rounded shadow hover:bg-slate-800 transition">+ Nouveau Fournisseur</a>
        <a href="{{ route('category.create') }}" class="bg-slate-700 text-white px-4 py-2 rounded shadow hover:bg-slate-800 transition">+ Nouveau Category</a>

    </div>
</div>
@endsection
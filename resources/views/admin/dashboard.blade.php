@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h2 class="text-2xl font-bold text-gray-800">Vue d'ensemble</h2>
    <p class="text-gray-600">Bienvenue dans votre gestionnaire TifawinSouk.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase font-bold">Produits</p>
                <p class="text-3xl font-black text-gray-800">{{ \App\Models\Produit::count() }}</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                <i class="fas fa-box fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase font-bold">Catégories</p>
                <p class="text-3xl font-black text-gray-800">{{ \App\Models\Category::count() }}</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                <i class="fas fa-tags fa-2x"></i>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border-b-4 border-orange-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 uppercase font-bold">Fournisseurs</p>
                <p class="text-3xl font-black text-gray-800">{{ \App\Models\Fournisseurs::count() }}</p>
            </div>
            <div class="bg-orange-100 p-3 rounded-full text-orange-600">
                <i class="fas fa-truck fa-2x"></i>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm p-6">
    <h3 class="font-bold text-gray-700 mb-4 text-lg">Actions Rapides</h3>
    <div class="flex flex-wrap gap-4">
        <a href="#" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700 transition">+ Nouveau Produit</a>
        <a href="{{ route('fournisseurs.create') }}" class="bg-slate-700 text-white px-4 py-2 rounded shadow hover:bg-slate-800 transition">+ Nouveau Fournisseur</a>
        <a href="{{ route('category.create') }}" class="bg-slate-700 text-white px-4 py-2 rounded shadow hover:bg-slate-800 transition">+ Nouveau Category</a>
        
    </div>
</div>
@endsection
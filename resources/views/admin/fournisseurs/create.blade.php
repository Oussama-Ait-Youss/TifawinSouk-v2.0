@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-sm rounded-xl p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Ajouter un nouveau fournisseur</h2>
            <p class="text-gray-600">Remplissez les informations pour enregistrer un nouveau partenaire local.</p>
        </div>

        <form action="{{ route('fournisseurs.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Nom complet</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                    @error('nom') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Email professionnel</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Ville</label>
                    <input type="text" name="ville" value="{{ old('ville') }}" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                    @error('ville') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                    @error('telephone') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('fournisseurs.index') }}" class="text-gray-600 hover:text-gray-800">Annuler</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md">
                    Enregistrer le fournisseur
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
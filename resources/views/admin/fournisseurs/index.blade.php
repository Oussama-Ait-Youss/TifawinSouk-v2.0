@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Liste des Fournisseurs</h2>
        <a href="{{ route('admin.fournisseurs.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">
            + Ajouter un Fournisseur
        </a>
    </div>

    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-600 uppercase text-sm">
            <tr>
                <th class="px-6 py-4 font-medium">Nom</th>
                <th class="px-6 py-4 font-medium">Email</th>
                <th class="px-6 py-4 font-medium">Ville</th>
                <th class="px-6 py-4 font-medium text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-gray-700">
            @foreach($fournisseurs as $f)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium">{{ $f->nom }}</td>
                <td class="px-6 py-4">{{ $f->email }}</td>
                <td class="px-6 py-4">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">{{ $f->ville }}</span>
                </td>
                <td class="px-6 py-4 text-right space-x-3">
                    <a href="{{ route('admin.fournisseurs.edit', $f) }}" class="text-indigo-600 hover:underline">Modifier</a>
                    <form action="{{ route('admin.fournisseurs.destroy', $f) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer ce fournisseur ?')" class="text-red-500 hover:underline">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.admin')

@section('content')
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-xl font-semibold text-gray-800">Liste des Category</h2>
        <a href="{{ route('category.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition">
            + Ajouter une category
        </a>
    </div>
           

        <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-gray-600 uppercase text-sm">
            <tr>
                <th class="px-6 py-4 font-medium">Category Name</th>
                <th class="px-6 py-4 font-medium">Slug</th>
                <th class="px-6 py-4 font-medium text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-gray-700">
            @foreach($category as $cat)
            <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4 font-medium">{{ $cat->name }}</td>
                <td class="px-6 py-4">{{ $cat->slug }}</td>
    
                <td class="px-6 py-4 text-right space-x-3">
                    <a href="{{ route('category.edit', $cat) }}" class="text-indigo-600 hover:underline">Modifier</a>
                    <form action="{{ route('category.destroy', $cat) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette category ?')" class="text-red-500 hover:underline">
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

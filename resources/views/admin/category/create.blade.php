@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-sm rounded-xl p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Ajouter une nouveau Category</h2>
            <p class="text-gray-600">Remplissez les informations pour enregistrer une nouveau Category.</p>
        </div>

        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" name="slug" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('admin.category.index') }}" class="text-gray-600 hover:text-gray-800">Annuler</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md">
                    Enregistrer Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
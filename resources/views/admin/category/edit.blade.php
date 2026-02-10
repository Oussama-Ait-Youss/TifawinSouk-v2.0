@extends('layouts.admin')

@section('content')
<!-- <body>

    <div class="min-h-screen bg-gray-900 flex items-center justify-center p-6">

        <div class="w-full max-w-lg bg-gray-800 rounded-lg shadow p-6">

            <h1 class="text-2xl font-bold text-gray-100 mb-6"> Edit Category </h1>

            <form action="{{ route('category.update', $category) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1"> Name </label>
                    <input type="text" name="name" value="{{ $category->name }}" class="w-full border border-gray-600 rounded px-3 py-2 bg-gray-700 text-gray-100" placeholder="Category name">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1"> Slug </label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="w-full border border-gray-600 rounded px-3 py-2 bg-gray-700 text-gray-100" placeholder="Category slug">
                </div>

                <div class="flex justify-end gap-3 pt-4">
                    <a href="{{ route('category.index') }}" class="px-4 py-2 border border-gray-500 rounded text-gray-300">Cancel</a>
                    <button type="submit" class="bg-green-700 text-white px-6 py-2 rounded">Update Category</button>
                </div>

            </form>

        </div>
    </div>

</body> -->


<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow-sm rounded-xl p-8">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Modifier le fournisseur : {{ $category->name }}</h2>
            <p class="text-gray-600">Mettez à jour les informations de Categori.</p>
        </div>

        
        <form action="{{ route('category.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>

                <div class="flex flex-col">
                    <label class="font-medium text-gray-700 mb-2">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
            </div>

            <div class="mt-8 flex items-center justify-end space-x-4">
                <a href="{{ route('category.index') }}" class="text-gray-600 hover:text-gray-800">Annuler</a>
                <button type="submit" class="bg-indigo-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-md">
                    Mettre à jour la category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
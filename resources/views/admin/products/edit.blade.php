<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Create Product</title>
</head>
<body class="min-h-screen bg-gray-50">
    <div class="max-w-2xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Edit Product</h1>
            <p class="mt-2 text-gray-600">Edit an existing product in your inventory</p>
        </div>

        <!-- Form -->
        <form class="p-6 bg-white rounded-lg shadow-lg" method="POST" action="{{ route('admin.products.update', $product->id) }}">
            @csrf
            @method('PUT')
            
            <!-- Reference -->
            <div class="mb-6">
                <label for="reference" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-barcode"></i>Reference
                </label>
                <input type="text" 
                       id="reference" 
                       name="reference" 
                       required
                       value="{{ $product->reference}}"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Enter product reference">
            </div>

            <!-- Product Name -->
            <div class="mb-6">
                <label for="nom" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-box"></i>Product Name
                </label>
                <input type="text" 
                       id="nom" 
                       name="nom" 
                       value="{{ $product->nom }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="Enter product name">
            </div>

            <!-- Purchase Price -->
            <div class="mb-6">
                <label for="prix_achat" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-money-bill-wave"></i>Purchase Price (DH)
                </label>
                <input type="number" 
                       id="prix_achat" 
                       name="prix_achat" 
                       step="0.01"
                       value="{{ $product->prix_achat }}"
                       min="0"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="0.00">
            </div>

            <!-- Sale Price -->
            <div class="mb-6">
                <label for="prix_vente" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-tag"></i>Sale Price (DH)
                </label>
                <input type="number" 
                       id="prix_vente" 
                       name="prix_vente" 
                       value="{{ $product->prix_vente }}"
                       step="0.01"
                       min="0"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="0.00">
            </div>

            <!-- Stock -->
            <div class="mb-6">
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-warehouse"></i>Stock Quantity
                </label>
                <input type="number" 
                       id="stock" 
                       name="stock" 
                       min="0"
                       value="{{ $product->stock }}"
                       required
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                       placeholder="0">
            </div>

            <!-- Category -->
            <div class="mb-6">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-folder"></i>Category
                </label>
                <select id="category_id" 
                        name="category_id" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                    @if(isset($categories))
                        @foreach($categories as $categ)
                            <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Supplier -->
            <div class="mb-6">
                <label for="fournisseurs_id" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="mr-2 fas fa-truck"></i>Supplier
                </label>
                <select id="fournisseurs_id" 
                        name="fournisseurs_id" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="{{ $product->fournisseur->id }}">{{ $product->fournisseur->nom }}</option>
                    @if(isset($fournisseurs))
                        @foreach($fournisseurs as $fourn)
                            @if($fourn->id != $product->fournisseur->id)
                                <option value="{{ $fourn->id }}">{{ $fourn->nom }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" 
                   class="px-6 py-2 text-gray-700 transition-colors border border-gray-300 rounded-lg hover:bg-gray-50">
                    <i class="mr-2 fas fa-times"></i>Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                    <i class="mr-2 fas fa-save"></i>Update Product
                </button>
            </div>
        </form>
    </div>
</body>
</html>
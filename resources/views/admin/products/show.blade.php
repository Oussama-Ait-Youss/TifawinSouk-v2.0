<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Product Details - {{ $product->nom }}</title>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.5s ease-out; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="h-full">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 shadow-sm">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <i class="mr-3 text-2xl text-blue-600 fas fa-box"></i>
                    <h1 class="text-2xl font-bold text-gray-900">Product Details</h1>
                </div>
                <nav class="flex space-x-4">
                    <a href="{{ route('admin.products.index') }}" class="px-3 py-2 text-sm font-medium text-gray-500 transition-colors rounded-md hover:text-gray-700">
                        <i class="mr-2 fas fa-arrow-left"></i>Back to Products
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <main class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Product Header Card -->
        <div class="p-8 mb-8 text-white shadow-xl bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl fade-in">
            <div class="flex flex-col items-center md:flex-row md:items-center md:justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="flex items-center justify-center w-20 h-20 bg-white/20 rounded-2xl backdrop-blur-sm">
                        <i class="text-3xl fas fa-box"></i>
                    </div>
                    <div class="ml-6">
                        <h2 class="text-3xl font-bold">{{ $product->nom }}</h2>
                        <p class="mt-1 text-blue-100">Reference: {{ $product->reference }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Main Information -->
            <div class="space-y-6 lg:col-span-2">
                <!-- Basic Information Card -->
                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
                    <div class="flex items-center mb-6">
                        <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-lg">
                            <i class="text-blue-600 fas fa-info-circle"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Basic Information</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-500">Product Name</label>
                            <div class="p-3 rounded-lg bg-gray-50">
                                <p class="font-medium text-gray-900">{{ $product->nom }}</p>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-500">Reference</label>
                            <div class="p-3 rounded-lg bg-gray-50">
                                <p class="font-mono text-gray-900">{{ $product->reference }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Financial Information Card -->
                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
                    <div class="flex items-center mb-6">
                        <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-lg">
                            <i class="text-green-600 fas fa-dollar-sign"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Financial Information</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">                        
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-500">Sale Price</label>
                            <div class="p-3 rounded-lg bg-gray-50">
                                <p class="text-2xl font-bold text-green-600">{{ number_format($product->prix_vente, 2) }} <span class="text-sm font-normal text-gray-500">DH</span></p>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-500">Profit Margin</label>
                            <div class="p-3 rounded-lg bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <p class="text-lg font-semibold text-blue-600">
                                        {{ number_format((($product->prix_vente - $product->prix_achat) / $product->prix_achat) * 100, 1) }}%
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        {{ number_format($product->prix_vente - $product->prix_achat, 2) }} DH per unit
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stock Information Card -->
                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
                    <div class="flex items-center mb-6">
                        <div class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-lg">
                            <i class="text-purple-600 fas fa-warehouse"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Stock Information</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-500">Current Stock</label>
                            <div class="p-3 rounded-lg bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <p class="text-2xl font-bold text-gray-900">{{ $product->stock }}</p>
                                    @if($product->stock > 10)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="mr-1 fas fa-check-circle"></i> In Stock
                                        </span>
                                    @elseif($product->stock > 5)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="mr-1 fas fa-exclamation-circle"></i> Low Stock
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <i class="mr-1 fas fa-times-circle"></i> Critical
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-500">Stock Value</label>
                            <div class="p-3 rounded-lg bg-gray-50">
                                <p class="text-2xl font-bold text-gray-900">{{ number_format($product->stock * $product->prix_achat, 2) }} <span class="text-sm font-normal text-gray-500">DH</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Information -->
            <div class="space-y-6">
                <!-- Category Card -->
                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 bg-orange-100 rounded-lg">
                            <i class="text-orange-600 fas fa-tags"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Category</h3>
                    </div>
                    
                    <div class="p-4 rounded-lg bg-orange-50">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 bg-orange-200 rounded-full">
                                <i class="text-sm text-orange-600 fas fa-tag"></i>
                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">{{ $product->category->name }}</p>
                                <p class="text-sm text-gray-500">ID: {{ $product->category_id }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Supplier Card -->
                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 bg-indigo-100 rounded-lg">
                            <i class="text-indigo-600 fas fa-truck"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Supplier</h3>
                    </div>
                    
                    <div class="p-4 rounded-lg bg-indigo-50">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 bg-indigo-200 rounded-full">
                                <i class="text-sm text-indigo-600 fas fa-building"></i>
                            </div>
                            <div class="ml-3">
                                <p class="font-medium text-gray-900">{{ $product->fournisseur->nom }}</p>
                                <p class="text-sm text-gray-500">ID: {{ $product->fournisseurs_id }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
                    <div class="flex items-center mb-4">
                        <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg">
                            <i class="text-gray-600 fas fa-bolt"></i>
                        </div>
                        <h3 class="ml-3 text-lg font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    
                    <div class="space-y-3">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="flex items-center justify-center w-full px-4 py-2 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
                            <i class="mr-2 fas fa-edit"></i>
                            Edit Product
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="flex items-center justify-center w-full px-4 py-2 text-gray-700 transition-colors bg-gray-100 rounded-lg hover:bg-gray-200">
                            <i class="mr-2 fas fa-arrow-left"></i>
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
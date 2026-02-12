<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Products Management</title>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>

<body class="h-full">
    <div class="flex h-full">
        <!-- Sidebar -->
        <aside class="flex-shrink-0 w-64 text-white shadow-xl bg-slate-900">
            <div class="p-6">
                <h1 class="text-xl font-bold tracking-widest text-indigo-400 uppercase">TifawinSouk</h1>
                <p class="text-xs text-gray-400">Gestion Boutique</p>
            </div>

            <nav class="px-4 mt-4">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-home"></i>
                        <span>Tableau de bord</span>
                    </a>

                    <div class="pt-4 pb-2">
                        <p class="px-3 text-xs font-semibold text-gray-500 uppercase">Inventaire</p>
                    </div>

                    <a href="{{ route('products.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('products.*') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-box"></i>
                        <span>Produits</span>
                    </a>

                    <a href="{{ route('category.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('category.*') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-tags"></i>
                        <span>Catégories</span>
                    </a>

                    <a href="{{ route('fournisseurs.index') }}" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-slate-800 transition {{ request()->routeIs('fournisseurs.*') ? 'bg-indigo-600' : '' }}">
                        <i class="w-5 fas fa-truck"></i>
                        <span>Fournisseurs</span>
                    </a>
                </div>
            </nav>

            <div class="p-6 text-white shadow-lg bg-gradient-to-r from-green-500 to-green-600 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-green-100">In Stock</p>
                        <p class="mt-2 text-3xl font-bold">{{ $products->where('stock', '>', 0)->count() }}</p>
                    </div>
                    <div class="p-3 rounded-lg bg-white/20">
                        <i class="text-2xl fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
            <div class="p-6 text-white shadow-lg bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-yellow-100">Low Stock</p>
                        <p class="mt-2 text-3xl font-bold">{{ $products->where('stock', '<=', 5)->count() }}</p>
                    </div>
                    <div class="p-3 rounded-lg bg-white/20">
                        <i class="text-2xl fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
            <div class="p-6 text-white shadow-lg bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-purple-100">Categories</p>
                        <p class="mt-2 text-3xl font-bold">{{ $products->pluck('category_id')->unique()->count() }}</p>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Header -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center">
                            <i class="mr-3 text-2xl text-blue-600 fas fa-box"></i>
                            <h1 class="text-2xl font-bold text-gray-900">Products Management</h1>
                        </div>
                        <nav class="flex space-x-4">
                            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 text-sm font-medium text-gray-500 transition-colors rounded-md hover:text-gray-700">
                                <i class="mr-2 fas fa-chart-bar"></i>Dashboard
                            </a>
                        </nav>
                    <i class="absolute text-gray-400 fas fa-search left-3 top-3"></i>
                </div>
                <div class="flex gap-3">

                    <a href="{{ route('products.create') }}" class="flex items-center gap-2 px-4 py-2 text-white transition-colors bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                        <i class="fas fa-plus"></i>
                        <span>Add Product</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="overflow-hidden bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900">Products List</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-gray-200 bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Product</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Reference</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Purchase Price</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Sale Price</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Stock Status</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Category</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Supplier</th>
                            <th class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $product)
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-10 h-10">
                                        <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                            <i class="text-blue-600 fas fa-box"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $product->nom }}</div>
                                        <div class="text-sm text-gray-500">SKU: {{ $product->reference }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-mono text-sm text-gray-900 whitespace-nowrap">{{ $product->reference }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <span class="font-semibold">{{ number_format($product->prix_achat, 2) }} DH</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <span class="font-semibold text-green-600">{{ number_format($product->prix_vent, 2) }} DH</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($product->stock > 10)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="mr-1 fas fa-check-circle"></i> In Stock ({{ $product->stock }})
                                </span>
                                @elseif($product->stock > 5)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    <i class="mr-1 fas fa-exclamation-circle"></i> Low Stock ({{ $product->stock }})
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="mr-1 fas fa-times-circle"></i> Critical ({{ $product->stock }})
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="px-2 py-1 text-xs font-medium text-blue-700 rounded-md bg-blue-50">
                                        {{ $product->category->name }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex items-center justify-center w-6 h-6 mr-2 bg-gray-200 rounded-full">
                                        <i class="text-xs text-gray-600 fas fa-truck"></i>
                                    </div>
                                    {{ $product->fournisseur->nom }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('product.show', $product->id) }}"
                                        class="p-2 text-blue-600 transition-colors rounded-lg hover:text-blue-900 hover:bg-blue-50"
                                        title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('products.edit',$product->id) }}"
                                        class="p-2 text-green-600 transition-colors rounded-lg hover:text-green-900 hover:bg-green-50"
                                        title="Edit Product">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 text-red-600 transition-colors rounded-lg hover:text-red-900 hover:bg-red-50"
                                            title="Delete Product"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-center">
                    <div class="flex gap-2">
                      {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Floating Action Button for Mobile -->
    <div class="fixed bottom-6 right-6 sm:hidden">
        <a href=""
            class="p-4 text-white transition-colors bg-blue-600 rounded-full shadow-lg hover:bg-blue-700">
            <i class="text-xl fas fa-plus"></i>
        </a>
    </div>
</body>

</html>
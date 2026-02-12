<div>
    <!-- Top Section: Stats Cards and Search Bar -->
<div class="mb-8">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-4 fade-in">
        <div class="p-6 text-white shadow-lg bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-100">Total Products</p>
                    <p class="mt-2 text-3xl font-bold">{{ $stats['total'] }}</p>
                </div>
                <div class="p-3 rounded-lg bg-white/20">
                    <i class="text-2xl fas fa-box"></i>
                </div>
            </div>
        </div>

        <div class="p-6 text-white shadow-lg bg-gradient-to-r from-green-500 to-green-600 rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-100">In Stock</p>
                    <p class="mt-2 text-3xl font-bold">{{ $stats['inStock'] }}</p>
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
                    <p class="mt-2 text-3xl font-bold">{{ $stats['lowStock'] }}</p>
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
                    <p class="mt-2 text-3xl font-bold">{{ $stats['categories'] }}</p>
                </div>
                <div class="p-3 rounded-lg bg-white/20">
                    <i class="text-2xl fas fa-tags"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Actions Bar -->
    <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl fade-in">
        <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">
            <div class="relative flex-1 w-full">
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search products by name, reference, category, or supplier..."
                    class="w-full p-2 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="text-gray-400 fas fa-search"></i>
                </div>
            </div>

            <div class="flex gap-3">
                <select wire:model.live="perPage" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                </select>
                
                <a href="{{ route('products.create') }}" class="flex items-center gap-2 px-4 py-2 text-white transition-colors bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700">
                    <i class="fas fa-plus"></i>
                    <span>Add Product</span>
                </a>
            </div>
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
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer hover:bg-gray-100" wire:click="sortBy('nom')">
                        <div class="flex items-center">
                            Product
                            @if($sortField === 'nom')
                                <i class="ml-1 fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="ml-1 fas fa-sort"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer hover:bg-gray-100" wire:click="sortBy('reference')">
                        <div class="flex items-center">
                            Reference
                            @if($sortField === 'reference')
                                <i class="ml-1 fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="ml-1 fas fa-sort"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer hover:bg-gray-100" wire:click="sortBy('prix_achat')">
                        <div class="flex items-center">
                            Purchase Price
                            @if($sortField === 'prix_achat')
                                <i class="ml-1 fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="ml-1 fas fa-sort"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer hover:bg-gray-100" wire:click="sortBy('prix_vente')">
                        <div class="flex items-center">
                            Sale Price
                            @if($sortField === 'prix_vente')
                                <i class="ml-1 fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="ml-1 fas fa-sort"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase cursor-pointer hover:bg-gray-100" wire:click="sortBy('stock')">
                        <div class="flex items-center">
                            Stock Status
                            @if($sortField === 'stock')
                                <i class="ml-1 fas fa-sort-{{ $sortDirection === 'asc' ? 'up' : 'down' }}"></i>
                            @else
                                <i class="ml-1 fas fa-sort"></i>
                            @endif
                        </div>
                    </th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Category</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Supplier</th>
                    <th class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($products as $product)
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
                                {{ $product->category->name ?? 'N/A' }}
                            </span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-6 h-6 mr-2 bg-gray-200 rounded-full">
                                <i class="text-xs text-gray-600 fas fa-truck"></i>
                            </div>
                            {{ $product->fournisseur->nom ?? 'N/A' }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('product.show', $product->id) }}" class="p-2 text-blue-600 transition-colors rounded-lg hover:text-blue-900 hover:bg-blue-50" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('products.edit',$product->id) }}" class="p-2 text-green-600 transition-colors rounded-lg hover:text-green-900 hover:bg-green-50" title="Edit Product">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 transition-colors rounded-lg hover:text-red-900 hover:bg-red-50" title="Delete Product" onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-gray-500">
                        <div class="flex flex-col items-center">
                            <i class="mb-4 text-4xl text-gray-300 fas fa-search"></i>
                            <p class="text-lg font-medium">No products found</p>
                            <p class="text-sm">Try adjusting your search criteria or add a new product.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $products->links() }}
    </div>
</div>
</div>

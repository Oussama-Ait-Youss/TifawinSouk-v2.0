<div class="relative">
    <!-- Search Input -->
    <div class="relative">
        <input 
            type="text" 
            wire:model.live.debounce.300ms="search"
            placeholder="Rechercher un produit..."
            class="w-64 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600"
        >
        <button class="absolute right-2 top-2.5 text-gray-400 hover:text-purple-600">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <!-- Search Results Dropdown -->
    @if(strlen($search) > 1)
        <div class="absolute top-full left-0 right-0 mt-2 w-full bg-white border border-gray-200 rounded-lg shadow-lg z-50 max-h-96 overflow-y-auto">
            
            <div wire:loading class="p-4 text-center text-gray-500">
                <i class="fas fa-spinner fa-spin mr-2"></i>
                Recherche en cours...
            </div>

            <div wire:loading.remove>
                @if($searchResults->count() > 0)
                    <div class="py-2">
                        @foreach($searchResults as $product)
                            <a href="#" class="block px-4 py-3 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0 w-12 h-12 bg-gray-200 rounded-lg overflow-hidden">
                                        <img src="https://picsum.photos/seed/product-{{ $product->id }}/50/50.jpg" 
                                             alt="{{ $product->nom }}" 
                                             class="w-full h-full object-cover"
                                             onerror="this.src='https://via.placeholder.com/50x50?text=P'">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 truncate">{{ $product->nom }}</h4>
                                        <p class="text-sm text-gray-500">
                                            @if($product->category)
                                                {{ $product->category->name }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-bold text-purple-600">{{ $product->prix_vente }} DH</p>
                                        <p class="text-xs text-gray-500">Stock: {{ $product->stock }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    @if($searchResults->count() >= 10)
                        <div class="px-4 py-3 border-t border-gray-200 text-center">
                            <button class="text-sm text-purple-600 hover:text-purple-800 font-medium">
                                Voir tous les résultats ({{ $searchResults->count() }})
                            </button>
                        </div>
                    @endif
                @else
                    <div class="p-4 text-center text-gray-500">
                        <i class="fas fa-search mb-2 text-2xl text-gray-300"></i>
                        <p class="text-sm">Aucun produit trouvé pour "{{ $search }}"</p>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Produit;
use App\Models\Category;
use App\Models\Fournisseurs;

class ProductIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function render()
    {
        $products = Produit::with(['category', 'fournisseur'])
            ->when($this->search, function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                    ->orWhere('reference', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('fournisseur', function ($query) {
                        $query->where('nom', 'like', '%' . $this->search . '%');
                    });
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        // Get statistics for the cards
        $allProducts = Produit::all();
        $stats = [
            'total' => $allProducts->count(),
            'inStock' => $allProducts->where('stock', '>', 0)->count(),
            'lowStock' => $allProducts->where('stock', '<=', 5)->count(),
            'categories' => $allProducts->pluck('category_id')->unique()->count(),
        ];

        return view('livewire.product-index', [
            'products' => $products,
            'stats' => $stats
        ]);
    }
}

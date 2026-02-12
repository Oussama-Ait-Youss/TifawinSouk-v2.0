<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;
use Illuminate\Support\Facades\Log;

class SearchComponent extends Component
{
    public $search = '';
    public $searchResults = [];

    public function mount()
    {
        $this->searchResults = collect();
    }

    public function updatedSearch()
    {
        try {
            if (strlen($this->search) > 1) {
                $this->searchResults = Produit::with(['category', 'fournisseur'])
                    ->where('nom', 'like', '%' . $this->search . '%')
                    ->orWhere('reference', 'like', '%' . $this->search . '%')
                    ->orWhereHas('category', function($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('fournisseur', function($query) {
                        $query->where('nom', 'like', '%' . $this->search . '%');
                    })
                    ->limit(10)
                    ->get();
            } else {
                $this->searchResults = collect();
            }
        } catch (\Exception $e) {
            $this->searchResults = collect();
            // Log the error if needed
            \Log::error('Search error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}

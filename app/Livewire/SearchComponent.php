<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;

class SearchComponent extends Component
{
    public $search = '';
    public $searchResults = [];

    public function mount()
    {
        $this->searchResults = Produit::with(['category', 'fournisseur'])->get();
    }

    public function updatedSearch()
    {
        if (strlen($this->search) > 0) {
            $this->searchResults = Produit::with(['category', 'fournisseur'])
                ->where('nom', 'like', '%' . $this->search . '%')
                ->orWhere('reference', 'like', '%' . $this->search . '%')
                ->orWhereHas('category', function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('fournisseur', function($query) {
                    $query->where('nom', 'like', '%' . $this->search . '%');
                })
                ->get();
        } else {
            $this->searchResults = Produit::with(['category', 'fournisseur'])->get();
        }
    }

    public function render()
    {
        return view('livewire.search-component');
    }
}

<?php

use App\Models\Produit;
use Livewire\Component;
use Livewire\Attributes\Url; 

new class extends Component
{
    #[Url(as: 'q', history: true)]
    public $search = '';
    public function render()
    {
        $results = Produit::query()
            ->where('nom', 'like', '%' . $this->search . '%')
            ->take(10)
            ->get();

        return view('livewire.search-component', compact('results'));
    }
};
?>

<?php

namespace App\Filament\Components;

use Filament\Widgets\Widget;

class CustomCard extends Widget
{
    protected static string $view = 'filament.components.custom-card';
    
    public array $data = [];
    
    public function mount(array $data = []): void
    {
        $this->data = $data;
    }
}

<?php

namespace App\Filament\Resources\Fournisseurs\Pages;

use App\Filament\Resources\Fournisseurs\FournisseursResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFournisseurs extends ListRecords
{
    protected static string $resource = FournisseursResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

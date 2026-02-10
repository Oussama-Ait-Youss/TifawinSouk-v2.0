<?php

namespace App\Filament\Resources\Fournisseurs\Pages;

use App\Filament\Resources\Fournisseurs\FournisseursResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewFournisseurs extends ViewRecord
{
    protected static string $resource = FournisseursResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

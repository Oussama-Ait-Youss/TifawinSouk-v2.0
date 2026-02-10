<?php

namespace App\Filament\Resources\Fournisseurs\Pages;

use App\Filament\Resources\Fournisseurs\FournisseursResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditFournisseurs extends EditRecord
{
    protected static string $resource = FournisseursResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
